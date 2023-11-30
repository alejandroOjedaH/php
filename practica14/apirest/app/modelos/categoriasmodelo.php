<?php

class categoriasmodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->validarSesion();
        $this->bd = new Db();
    }

    private function validarSesion(){
        if(!isset($_SESSION)){
            session_start();
            if ($_SESSION["logeado"]!=true){
                header("Location: ".RUTA_URL);
                die;
            }
        }
    }

    public function categorias(){
        $this->bd->query("select * from tienda.categoria c;");
        return $this->bd->registros();
    }
    
    public function productos($id){
        $_SESSION['paginaactual'] =$id;
        $datos = ["categoria"];
        
        $this->bd->query("select * from tienda.categoria c where c.codCat = ".$id.";");
        foreach($this->bd->registros() as $category){
           $datos['categoria'] = $category["nombre"];
        }
        
        $this->bd->query("select * from tienda.producto p where p.codCat = ".$id.";");
        $datos['productos'] = $this->bd->registros();

        return $datos;
    }

    public function aniadir(){
        $idPro = null;
        if ($_SESSION["logeado"]!=true){
            header("Location: ../index.php");
            die;
        }
        if(isset($_REQUEST["id"])){
            $idPro=$_REQUEST["id"];
        }
        if(isset($_REQUEST["cantidad"])){
            if(isset($_SESSION["carrito"][$idPro])){
                $_SESSION["carrito"][$idPro]= $_SESSION["carrito"][$idPro]+intval($_REQUEST["cantidad"],$base = 10);
            }else{
                $_SESSION["carrito"][$idPro]= intval($_REQUEST["cantidad"],$base = 10);
            }
        }
    }
}
