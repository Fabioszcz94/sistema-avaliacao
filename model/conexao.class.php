<?php
abstract class Conexao{
    private $servidor = 'localhost';
    private $user = 'fabio';
    private $pass = 'NDkzYzc5N2M5MTQxMDdhZGQ3N2EwZDI0';
    private $banco = 'site_fabio';
    protected $conn;
            
    protected function conexao(){
        $this->conn = new PDO('mysql:host=' . $this->servidor . ';dbname=' . $this->banco, $this->user, $this->pass);
    }
}
?>