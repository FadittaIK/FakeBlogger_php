<?php
    class View{
        function mostrarEntradasPublicas($entradas){
            include 'entradasView.php';
        }
        function mostrarInfoEntrada($entrada,$comentarios){
           include 'entradaInfor.php';
        }
        function mostrarLogin(){
            include 'login.php';
        }
    }
?>