<?php namespace GestorUsuario;

use Exception;
use PDO;


class GestorUsuario{
    
    private $db;
    
    function getUsuario($usuario){
        $result= null;
        try{
            $sql = "select username, password from usuarios where username ='".$usuario."'";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function __construct(PDO $db) {
        $this->db = $db;
    }
}

