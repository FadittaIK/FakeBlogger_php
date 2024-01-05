<?php
require("./service/connect.php");
require("./model/Entrada.php");
require("./model/Comentario.php");
class EntradaService
{
    private $db;

    private $entradaPublicas;
    private $entradasPrivadas;

    public function __construct(){
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
    public function infoEntrada($id){
        $entradas = $this->entradas();
        $entradaInfo = array_filter($entradas,function($entrada) use ($id){
            return  $entrada->getId() == $id;
        });
        return  reset($entradaInfo);//devolver el primer elemento --> que es un Object
    }
    public function comentarioDeUnEntrada($id){
        $comentarios = [];
        $sql = "select * from comentari where entrada_id=".$id;
        $result = $this->db->getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comentario = new Comentario($row["idcomentari"],  $row["descripcio"],  $row["entrada_id"],  $row["usuari_username"]);
                $comentarios[] = $comentario;
            }
        }
        return $comentarios;
    }
}
