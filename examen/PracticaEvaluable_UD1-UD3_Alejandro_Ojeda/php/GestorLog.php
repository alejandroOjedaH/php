<?php namespace GestorLog;
use Exception;
use PDO;


class GestorLog{
    private $db;
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    function insert($data){
        try{
            $sql = "INSERT INTO logs (accion, fecha) VALUES ('".$data[0]."','".$data[1] ->format('Y-m-d H:i:s')."')";
            
            $this -> db ->exec($sql);

            return true;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function table(){
        $result= null;
        try{
            $sql = "select accion,fecha from logs;";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
}
