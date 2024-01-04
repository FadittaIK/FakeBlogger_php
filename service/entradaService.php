<?php
require("./service/connect.php");
require("./model/Entrada.php");
class EntradaService
{
    private $db;

    private $entradaPublicas;
    private $entradasPrivadas;

    public function __construct()
    {
        $this->db = new Database();
        
        $this->entradaPublicas = [];
        $this->entradasPrivadas = [];
    
    }
    public function entradas(){
        $sql = "SELECT * FROM entrada";
        $result = $this->db->getConnection()->query($sql);

        $entradas= [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tituloDescripcion = "SELECT titol,descripcio from entrada_has_idioma where entrada_has_idioma.entrada_id = " . $row["id"];
                $resultTituloDescripcio =   $this->db->getConnection()->query($tituloDescripcion);
                    $rowTituloDescripcio = $resultTituloDescripcio->fetch_assoc();
                    $entrada = new Entrada($row["id"], $rowTituloDescripcio["titol"], $rowTituloDescripcio["descripcio"], $row["data"], $row["autor"], $row["publica"]);
                    $entradas[] = $entrada;
            }
        }
        return $entradas;
    } 
    public function entradasPublicas(){
        $entradas = $this->entradas();
       return $this->entradaPublicas = array_filter($entradas,function($entrada){
          return  $entrada->getPublica() == 1;
        });
        
    }
}
