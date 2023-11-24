<?php

class pedidomodelo{ 
    
    public function __construct()
    {
        session_start();
        if ($_SESSION["logeado"]!=true){
            header("Location: ".RUTA_URL);
            die;
        }
        
    }

    public function desLogear(){
        require_once 'Mailer.php';
        try{
            
            $mailer = new Mailer();
            $gestorUsuario = new GestorUsuario();
    
            $codPed = $gestorUsuario -> agregarPedido(recuperarCodRes());
            
            for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
                $clave = array_keys($_SESSION["carrito"])[$i];
                $gestorUsuario -> agregarPedidoProducto($codPed,$clave);
            }
            $mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "El pedido se ha hecho con exito");
        }catch(Exception $e){
            $mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "No se ha podido realizar el pedido");
        }
    }
}
