<?php

class categoriasmodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();
    }

    public function validarSesion(){
        if(!isset($_SESSION)){
            session_start();
            if ($_SESSION["logeado"]!=true){
                header("Location: ".RUTA_URL);
                die;
            }
        }
    }

    public function categorias(){
        if(!isset($_SESSION)){
            session_start();
        }
        $token=$_SESSION['token'];
        $options = [
            'http' => [
                'header' => [
                    'Content-type: application/json',
                    'Authorization: Bearer ' . $token,
                ],
                'method' => 'GET'
            ]
        ];
        
        $context = stream_context_create($options);

        $response = file_get_contents("http://localhost/php/practica14/api/categorias", false, $context);

        if ($response === FALSE) {
            die('Error al enviar la solicitud.');
        }
        
        $result = json_decode($response, true);

        return $result;
    }
    
    public function productos($id){
        if(!isset($_SESSION)){
            session_start();
        }
        $token=$_SESSION['token'];
        $_SESSION['paginaactual'] =$id;
        $datos = ["categoria"];
        
        $this->bd->query("select * from tienda.categoria c where c.codCat = ".$id.";");
        foreach($this->bd->registros() as $category){
           $datos['categoria'] = $category["nombre"];
        }
        
        $options = [
            'http' => [
                'header' => [
                    'Content-type: application/json',
                    'Authorization: Bearer ' . $token,
                ],
                'method' => 'GET'
            ]
        ];
        
        
        $context = stream_context_create($options);

        $response = file_get_contents("http://localhost/php/practica14/api/productos/".$id, false, $context);

        if ($response === FALSE) {
            die('Error al enviar la solicitud.');
        }
        
        $result = json_decode($response, true);

        $datos['productos'] = $result;

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

    public function devolverPedidosPorRestaurante($id){
        $guardarPedidos =[];
        $this->bd->query("select * from tienda.pedido p where p.codRes = ".$id.";");
        $pedidos = $this->bd->registros();

        foreach($pedidos as $pedi){
            $guardarProductos = [];
            $this->bd->query("select * from tienda.pedido_producto ped inner join tienda.producto pro on pro.codPro = ped.codPro where ped.codPed = ".$pedi["codPed"].";");
            $productos = $this->bd->registros();

            foreach($productos as $prod){
                array_push($guardarProductos, $prod['nombre']);
            }
            $guardarPedidos[$pedi["codPed"]] = $guardarProductos;
        }
        return $guardarPedidos;
    }
}
