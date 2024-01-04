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
        function mostrarEntradasPublicas(){
             $this->instanceView->mostrarEntradasPublicas($this->instanceEntradaService->entradasPublicas());
        }
    }
?>