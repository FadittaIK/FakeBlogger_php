<?php
require "google-translate-php/vendor/autoload.php";
use Stichoza\GoogleTranslate\GoogleTranslate;
class Traducir{
    
   
    private $tr;
    function __construct(){
        $this->tr = new GoogleTranslate(); 

    }
    function traducirTexto($idioma,$texto){
        $this->tr->setSource('es');
        $this->tr->setTarget($idioma);
        return $this->tr->translate($texto);
    }
    }