
    <?php
         echo "
         <h1> {$entrada->getTitulo()} </h1>";

         if(isset($_SESSION["usuario"])){
          echo "<a href='index.php?accion=private'id=home><button>{$controlador->traducir('Home')}</button></a>";
         }else{
            echo "<a href='index.php?accion=inicio' id=home><button>Home</button></a>";
         }
         echo "
         <div class='post'>
         <div class='descripcionPost'> {$entrada->getDescripcion()}</div>
         <p>Autor: {$entrada->getAutor()}</p>
         ";
         echo   "<h3> Comentarios: </h3>";
         if(isset($_SESSION["usuario"])){
            echo "
            <form action='index.php?accion=addComent&idPost={$entrada->getId()}' method='post'>
            <input type='text' placeholder='añadir un comentario' name='comentario' >
            <input type='submit' value='añadir'></form>";
         }
         
         foreach($comentarios as $comentario){
            echo "
            <div class='comentario'>
            <div> {$comentario->getDescripcion()}</div>
            <span>{$comentario->getUsuario()}</span>";
            if(isset($_SESSION["usuario"]) && $comentario->getUsuario() == $usuarioActual->getUsername()){
               echo "<form action='index.php?accion=deleteComment&idComment={$comentario->getId()}&idPost={$entrada->getId()}' method='POST'>
               <input type='submit' id='borrar' value='Borrar'></form>";
            }
           echo" </div> ";
         }
    ?>
