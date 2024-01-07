<?php
class Usuario
{
    private $username;
    private $email;
    private $pass;
    public function __construct($username,  $email,  $pass){
        $this->username = $username;
        $this->email = $email;
        $this->pass = $pass;
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
}
