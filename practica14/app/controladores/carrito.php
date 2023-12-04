<?php

    class carrito extends Controlador{
        private $carritomodelo;
        public function __construct(){
            $this->carritomodelo = $this->modelo('carritomodelo');
        }

        public function index(){
            $datos = $this->carritomodelo->productos();
            $this->vista('paginas/carritovista', $datos);
            return;  
        }

        public function actualizar(){
            $this->carritomodelo->actualizar();
            header("Location: ".RUTA_URL."carrito");
            die;
        }
    }