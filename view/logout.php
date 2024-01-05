<?php

 if (isset($_SESSION["usuario"])) {
     session_unset();
     session_destroy();
 }
 

 header("Location:index.php?accion=inicio");
 exit();
?>