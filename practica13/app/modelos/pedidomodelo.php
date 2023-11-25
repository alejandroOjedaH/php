<?php

class pedidomodelo{ 
    private $db;
    private $mailer;
    
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
            if ($_SESSION["logeado"]!=true){
                header("Location: ".RUTA_URL);
                die;
            }
        }
        $this->db = new Db();
        $this->mailer = new Mailer();
    }

    public function productos(){
        if(count($_SESSION['carrito'])!=0){
            try{
                
                
                $codRes =$this->recuperarCodRes();
                $codPed = $this->aniadirPedido($codRes);
                
                for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
                    $clave = array_keys($_SESSION["carrito"])[$i];
                    $this->agregarPedidoProducto($codPed,$clave);
                }
                $this->mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "El pedido se ha hecho con exito");
            }catch(Exception $e){
                $this->mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "No se ha podido realizar el pedido");
            }
        }
    }
    private function recuperarCodRes(){
        $this->db->query("select codRes from restaurante where correo ='".$_SESSION["username"]."'");
        foreach ($this->db->registros() as $row) {
            return $row["codRes"];
        }
    }
    
    private function aniadirPedido($codRes){
        try{
            $date= new DateTime();
            $date = $date->format('Y-m-d');
            $codPed = null;
            $this->db->query("insert into tienda.pedido (fecha,enviado,codRes) values('".$date."', '".false."', '".$codRes."')");
            $this -> db ->execute();
            
            $this->db->query("select p.codPed from tienda.pedido p order by p.codPed;");
            $result = $this->db->registros();

            foreach($result as $row){
                $codPed = $row["codPed"];
            }

            return $codPed;
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }
    private function agregarPedidoProducto($codPed,$codPro){
        $this->db->query("insert into tienda.pedido_producto (codPed, codPro) values('".$codPed."', '".$codPro."')");
        $this->db->execute();
    }
}
