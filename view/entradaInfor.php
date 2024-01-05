
    <?php
         echo "
         <h1> {$entrada->getTitulo()} </h1>";
         echo "
         <a href='index.php' id=home><button>Home</button></a>
         <div class='post'>
         <div class='descripcionPost'> {$entrada->getDescripcion()}</div>
         <p>Autor: {$entrada->getAutor()}</p>
         ";
         echo   "<h3> Comentarios: </h3>";
         foreach($comentarios as $comentario){
            echo "
            <div class='comentario'>
               <div> {$comentario->getDescripcion()}</div>
                <span>{$comentario->getUsuario()}</span>
            </div>   ";
         }
    ?>
