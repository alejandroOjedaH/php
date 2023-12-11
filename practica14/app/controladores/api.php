<?php
use \Firebase\JWT\JWT;

class api extends Controlador{
    private $categoriasmodelo;
    public function __construct(){
        $this->categoriasmodelo = $this->modelo('categoriasmodelo');
    }

    public function index(){
        $this->login();
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $jsonDatos =file_get_contents("php://input");
            $json=json_decode($jsonDatos,true);

            if($json===null|| !isset($json["usuario"]) || !isset($json["password"])){
                echo "Error en el Json";
            }else{
                try{
                    $passwd=JWTKEY;
                    $usuario=$json["usuario"];

                    $tiempoExpiracion =3600;
                    $payload = array(
                        "iss" => "Alejandro Ojeda",
                        "aud" => "Mi audiencia",
                        "iat" => time(),
                        "exp" => time() + $tiempoExpiracion,
                        "sub" => $usuario,
                    );

                    $token =JWT::encode($payload, $passwd,'HS256');

                    echo json_encode("Bearer:".$token."");
                }catch(Exception $e){
                    echo "Error al generar el token";
                }
            }
        }
    }
    public function categorias(){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $datos = $this->categoriasmodelo->categorias();
            $json=[];
            foreach ($datos as $categoria) {
                array_push($json,$categoria["nombre"]);
            }
            echo json_encode($json);
        }
    }

    public function productos($cat=null){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            if($cat !== null){
                $datos = $this->categoriasmodelo->productos($cat);
                $json=[];
                foreach ($datos['productos'] as $producto) {
                    array_push($json,$producto["nombre"]);
                }
                echo json_encode($json);
            }
        }
    }

    public function pedidos($res){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            if($res !== null){
                $datos = $this->categoriasmodelo->devolverPedidosPorRestaurante($res);
                echo json_encode($datos);
            }
        }
    }
}