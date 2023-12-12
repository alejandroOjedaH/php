<?php

class loginmodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();
    }

    public function validarlogin(){
        if(isset($_REQUEST["usuario"]) && isset($_REQUEST["contrasenna"])){
            $this->bd->query("select correo, clave from restaurante where correo ='".$_REQUEST["usuario"]."' and clave = '".$_REQUEST["contrasenna"]."'");
            foreach($this->bd->registros() as $row){
                if(isset($row["correo"]) && isset($row["clave"])){
                    session_start();
                    $_SESSION["username"] = $row["correo"];
                    $_SESSION["clave"] = $row["clave"];
                    $_SESSION["logeado"] = true;
                    $_SESSION["carrito"] = [];
                    $_SESSION["token"] = $this->conseguirToken($_SESSION["username"],$_SESSION["clave"]);
                    return true;
                }
            }
        }
        return false;
    }
    private function conseguirToken($usuario,$clave){
        $json=[
            "usuario" => $usuario,
            "password" => $clave
        ];

        $json =json_encode($json);

        $options = [
            'http' => [
                'header'  => "Content-type: application/json",
                'method'  => 'POST',
                'content' => $json
            ]
        ];
        
        
        $context = stream_context_create($options);

        $response = file_get_contents("http://localhost/php/practica14/api", false, $context);

        if ($response === FALSE) {
            die('Error al enviar la solicitud.');
        }
        
        $result = json_decode($response, true);

        $result= explode(":",$result)[1];

        return $result;
    }
}
