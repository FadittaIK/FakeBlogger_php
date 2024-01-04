<?php
class Usuario
{
    private $username;
    private $email;
    private $pass;
    private $nombre;
    private $apellidos;
    public function __construct($username,  $email,  $pass,  $nombre,  $apellidos){
        $this->username = $username;
        $this->email = $email;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
}
