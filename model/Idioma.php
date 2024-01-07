<?php

class Idioma
{
    private $codi;
    private $nombre;
    private $isPorDefecto;

    public function __construct($codi,  $nombre,  $isPorDefecto){
        $this->codi = $codi;
        $this->nombre = $nombre;
        $this->isPorDefecto = $isPorDefecto;
    }
    public function getCodi(){
        return $this->codi;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getIsPorDefecto(){
        return $this->isPorDefecto;
    }
}
