<?php
class Entrada
{
    private $id;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $autor;
    public function __construct($id,  $titulo,  $descripcion,  $fecha,  $autor){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->autor = $autor;
    }
    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getAutor(){
        return $this->autor;
    }
}
