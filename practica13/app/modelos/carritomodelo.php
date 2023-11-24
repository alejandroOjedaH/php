<?php

class carritomodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->validarSesion();
        $this->bd = new Db();
    }

    private function validarSesion(){
        session_start();
        if ($_SESSION["logeado"]!=true){
            header("Location: ".RUTA_URL);
            die;
        }
    }

    public function productos(){
        $datos = [];      
        $productos=[];
        $claves = array_keys($_SESSION["carrito"]);
        foreach ($claves as $clave) {
            $aux=null;
            $this->bd->query("select * from tienda.producto p where p.codPro = ".$clave.";");
            $aux = $this->bd->registro();
            $productos[]=$aux;
        }
        $valores= array_values($_SESSION["carrito"]);

        $datos['productos']=[$productos,$valores];
        return $datos;
    }

    public function actualizar(){
        if(isset($_REQUEST["id"])){
            $idPro=$_REQUEST["id"];
        }
        if(isset($_REQUEST["cantidad"])){
            $_SESSION["carrito"][$idPro]= $_SESSION["carrito"][$idPro]-intval($_REQUEST["cantidad"],$base = 10);
            if($_SESSION["carrito"][$idPro]<=0){
                unset($_SESSION["carrito"][$idPro]);
            }
        }
    }
}
