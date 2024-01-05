<?php
    class View{
        
        function mostrarEntradas($entradas){
            include 'entradasView.php';
        }
        function mostrarInfoEntrada($entrada,$comentarios,$usuarioActual){
           include 'entradaInfor.php';
        }
        function mostrarLogin(){
            include 'login.php';
        }
        function logout(){
            if (isset($_SESSION["usuario"])) {
                session_unset();
                session_destroy();
            }
        }
    }
?>