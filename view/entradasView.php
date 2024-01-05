    <?php
    if(isset($_SESSION["usuario"])){
      echo "  <h1>Entradas </h1> 
      <div class='login'>
      <a href='index.php?accion=logout'><button>Logout</button>
      </div>";
      }else{
          echo "  <h1>Entradas Públicas</h1> 
          <div class='login'>
          <a href='index.php?accion=login'><button>Login</button>
          </div>";
      }
   echo "<main>";
    foreach ($entradas as $entrada) {
        echo "<a href='index.php?accion=post&id={$entrada->getId()}'>
            <div class='entrada'>
            <h2> {$entrada->getTitulo()} </h2>
            <p>Autor: {$entrada->getAutor()}</p>
            </div></a>
             ";
    }
