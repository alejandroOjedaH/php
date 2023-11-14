<?php namespace GestorUsuario;

use DateTime;
use Exception;
use PDO;
use PDOException;


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
    function getCodigo($usuario){
        $result= null;
        try{
            $sql = "select codRes from restaurante where correo ='".$usuario."'";
            $result = $this->db->query($sql);
            
            return $result;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }

    function agregarPedido($codRes){
        try{
            $date= new DateTime();
            $date = $date->format('Y-m-d');
            $codPed = null;
            $sql = "insert into tienda.pedido (fecha,enviado,codRes) values('".$date."', '".false."', '".$codRes."')";
            
            $this -> db ->exec($sql);
            
            $sql = "select p.codPed from tienda.pedido p order by p.codPed;";
            $result = $this->db->query($sql);

            foreach($result as $row){
                $codPed = $row["codPed"];
            }

            return $codPed;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    function agregarPedidoProducto($codPed,$codPro){
        try{
            $sql = "insert into tienda.pedido_producto (codPed, codPro) values('".$codPed."', '".$codPro."')";
            
            $this -> db ->exec($sql);

            return true;
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

