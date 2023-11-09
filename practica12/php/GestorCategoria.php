<?php namespace GestorCategoria;

use Exception;
use PDO;
use PDOException;


class GestorCategoria{
    
    private $db;
    
    function getCategoria($categoria){
        $result= null;
        try{
            $sql = "select * from tienda.categoria c where c.codCat = ".$categoria.";";
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