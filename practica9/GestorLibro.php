<?php namespace GestorLibro;

use Exception;
use ICrudDB\ICrudDB;
use PDO;
include "ICrudDB.php";

class GestorLibro implements ICrudDB{
    
    private $db;
    
    function table(){

    }
    function insert($data){
        try{
            $sql = "INSERT INTO libro (nombre, pag_num, fecha_publicacion, leido) VALUES ('".$data -> getNombre()."', '".$data -> getNumPaginas()."', '".$data -> getFechaPublicacion() -> format('Y-m-d')."','".$data -> getLeido()."')";
            
            $this -> db ->exec($sql);

            return true;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function update($data, $where){

    }
    function delete($data){

    }
    public function __construct(PDO $db) {
        $this->db = $db;
    }
}

