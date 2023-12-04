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
        $datos = $this->categoriasmodelo->categorias();
        return json_encode($datos);

    }
}