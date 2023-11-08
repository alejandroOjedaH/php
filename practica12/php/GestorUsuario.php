<?php namespace GestorUsuario;

use Exception;
use PDO;


class GestorUsuario{
    
    private $db;
    
    function getUsuario($usuario,$pass){
        $result= null;
        try{
            $sql = "select correo, clave from restaurante where correo ='".$usuario."' and clave = '".$pass."'";
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

