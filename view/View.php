<?php
    class View{
       
        
        function mostrarEntradas($entradas,$traducir){
            include 'entradasView.php';
        }
        function mostrarInfoEntrada($entrada,$comentarios,$usuarioActual,$traducir){
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