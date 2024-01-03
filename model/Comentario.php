<?php
class Comentario{
    private $id;
    private $descripcion;
    private $entrada;
    private $usuario;
    public function __construct($id,  $descripcion,  $entrada,  $usuario){
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->entrada = $entrada;
        $this->usuario = $usuario;
    }
    public function getId(){
        return $this->id;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getEntrada(){
        return $this->entrada;
    }

    public function getUsuario(){
        return $this->usuario;
    }
}
