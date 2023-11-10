<?php namespace GestorProducto;

use Exception;
use PDO;
use PDOException;


class GestorProducto{
    
    private $db;
    function getProducto($producto){
        $result= null;
        try{
            $sql = "select * from tienda.producto p where p.codPro = ".$producto.";";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function getProductos($categoria){
        $result= null;
        try{
            $sql = "select * from tienda.producto p where p.codCat = ".$categoria.";";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $con = new PDO("mysql:host=$servername;dbname=tienda", $username, $password);
            // set the PDO error mode to exception
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $con;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}