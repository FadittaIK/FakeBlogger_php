    <?php
    if(isset($_SESSION["usuario"])){
      echo "  <h1> {$traducir('Entradas')} </h1> 
      <div class='login'>
      <a href='index.php?accion=logout'><button>{$traducir('Logout')}</button>
      </div>";
      }else{
          echo "  <h1> {$traducir('Entradas Públicas')}</h1> 
          <div class='login'>
          <a href='index.php?accion=login'><button>{$traducir('Login')}</button>
          </div>";
      }
   echo "<main>";
    foreach ($entradas as $entrada) {
        echo "<a href='index.php?accion=post&id={$entrada->getId()}'>
            <div class='entrada'>
            <h2> {$traducir($entrada->getTitulo())}</h2>
            <p>Autor: {$entrada->getAutor()}</p>
            </div></a>
        ";
    }
