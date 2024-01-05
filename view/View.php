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
            include 'logout.php';
        }
    }
?>