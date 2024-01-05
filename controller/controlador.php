<?php
    include("./service/entradaService.php");
    include("./view/View.php");
    class Controlador{
        private $instanceEntradaService;
        private $instanceView;
        function __construct(){
            $this->instanceEntradaService  = new EntradaService();
            $this->instanceView = new View();
        }

        function controlarPaginas($accion){
            switch($accion){
                case 'inicio':
                    $this->instanceView->mostrarEntradasPublicas($this->instanceEntradaService->entradasPublicas());
                    break;
                case 'post':
                  $id = $_GET['id'];
                  $this->instanceView->mostrarInfoEntrada($this->instanceEntradaService->infoEntrada($id),$this->instanceEntradaService->comentarioDeUnEntrada($id));
                break;
                case 'login':
                    break;
            }
        }
    }
?>