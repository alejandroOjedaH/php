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
            $sql = "select nombre, pag_num, fecha_publicacion, leido, id from libro";
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
            $sql = "Delete from libro where id=".$data;
            
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
    private function altaSimultanea($insert){
        try {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db->beginTransaction();

        for ($i=0; $i < count($insert); $i++) { 
            $libro = $insert[$i];
            $this->db->exec($libro);
        }
        
        $this->db->commit();
        echo "New records created successfully";
        }catch(Exception $e){
            $this->db->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
    public function agregarInserts(){
        $libros =[];
        array_push($libros,"INSERT INTO libro (nombre, pag_num, fecha_publicacion, leido) VALUES ('Hola', '2', '2000-01-01','0')");
        array_push($libros,"INSERT INTO libro (nombre, pag_num, fecha_publicacion, leido) VALUES ('Hola', '3', '2000-01-01','1')");

        $this ->altaSimultanea($libros);
    }
}

