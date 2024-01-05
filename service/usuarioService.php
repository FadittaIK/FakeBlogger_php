<?php
include './model/Usuario.php';
    class UsuarioService{
        private $db;
        private $usuarioActual;
        function __construct(){
            $this->db = new Database();
        }

        function usuarioExiste($email,$pass){
            $sql = "SELECT * FROM `usuari` WHERE email ='$email' and password='$pass'";
            $result = $this->db->getConnection()->query($sql);
          
            return $result->num_rows > 0;
        }
        function usuarioActual($email,$pass){
            $sql = "SELECT * FROM `usuari` WHERE email ='$email' and password='$pass'";
            $result = $this->db->getConnection()->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->usuarioActual = new Usuario($row["username"],$row["email"],$row["password"]);
            }
            return $this->usuarioActual;
        }
    }
?>