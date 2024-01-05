<?php
    include("./service/entradaService.php");
    include("./service/usuarioService.php");
    include("./view/View.php");
    class Controlador{
        private $instanceEntradaService;
        private $instanceView;
        private $instanceUsuarioService;
        function __construct(){
            $this->instanceEntradaService  = new EntradaService();
            $this->instanceView = new View();
            $this->instanceUsuarioService = new UsuarioService();
        }
        function mostrarInfoPrivate($id,$email,$pass){
            $this->instanceView->mostrarInfoEntrada($this->instanceEntradaService->infoEntrada($id),$this->instanceEntradaService->comentarioDeUnEntrada($id),$this->instanceUsuarioService->usuarioActual($email,$pass));
        }

        function controlarPaginas($accion){
            switch($accion){
                case 'inicio':
                    $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradasPublicas());
                    break;
                case 'post':
                  $id = $_GET['id'];
                  if(isset($_SESSION["usuario"])){
                    $email = $_SESSION["usuario"];
                    $pass = $_SESSION["pass"] ;
                   $this->mostrarInfoPrivate($id,$email,$pass);
                  }else{
                    $this->mostrarInfoPrivate($id,null,null);
                  }
                break;
                case 'login':
                    $this->instanceView->mostrarLogin();
                    break;
                case 'private':
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $email = $_POST["email"];
                        $pass = $_POST["password"];
                        if($this->instanceUsuarioService->usuarioExiste($email,$pass)){
                            if(!isset($_SESSION["usuario"])){
                                $_SESSION["usuario"] = $email;
                                $_SESSION["pass"] = $pass;
                                $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradas());
                            }
                        }else{
                            $this->instanceView->mostrarLogin();
                        }
                    }else if($_SERVER["REQUEST_METHOD"] == "GET"){
                        $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradas());
                    }
                    else{
                        $this->instanceView->mostrarLogin();
                    }
                    break;
                case 'logout':
                    $this->instanceView->logout();
                    $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradasPublicas());
                    break;
                case 'addComent':
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $comentario = $_POST["comentario"];
                        $idPost = $_GET["idPost"];
                        $email = $_SESSION["usuario"];
                        $pass = $_SESSION["pass"] ;
                        $username = $this->instanceUsuarioService->usuarioActual($email,$pass);
                        $usuarioActual = $username->getUsername();
                        $this->instanceEntradaService->addComment($comentario,$idPost,$usuarioActual);
                        $this->mostrarInfoPrivate($idPost,$email,$pass); 
                    }else{
                        $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradas());
                    }
                    break;
                case 'deleteComment':
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $idComment = $_GET["idComment"];
                        $email = $_SESSION["usuario"];
                        $pass = $_SESSION["pass"] ;
                        $this->instanceEntradaService->deleteComment($idComment);
                        $idPost = $_GET["idPost"];
                        $this->mostrarInfoPrivate($idPost,$email,$pass); 
                    }else{
                        $this->instanceView->mostrarEntradas($this->instanceEntradaService->entradas());
                    }
                    break;
            }
        }
    }
?>