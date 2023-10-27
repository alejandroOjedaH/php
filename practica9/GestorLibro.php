<?php namespace GestorLibro;

use DateTime;
use Exception;
use ICrudDB\ICrudDB;
use PDO;
use RecursiveArrayIterator;
include "ICrudDB.php";

class GestorLibro implements ICrudDB{
    
    private $db;
    
    function table(){
        $result= null;
        try{
            $sql = "select nombre, pag_num, fecha_publicacion, leido from libro";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
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
        if($data->getFechaPublicacion()==null){
            $data->setFechaPublicacion(new DateTime("0-0-0"));
        }
        try{
            $sql = "Update libro set nombre='".$data -> getNombre()."', pag_num='".$data -> getNumPaginas()."', fecha_publicacion ='".$data -> getFechaPublicacion()-> format('Y-m-d')."',leido ='".$data -> getLeido()."' where id =".$where;

            
            $this -> db ->exec($sql);

            return true;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function delete($data){
        try{
            $sql = "Delete from libro where id=".$data->getId();
            
            $this -> db ->exec($sql);

            return true;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    public function __construct(PDO $db) {
        $this->db = $db;
    }
}

