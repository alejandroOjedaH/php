<?php

    class pedido extends Controlador{
        private $pedidomodelo;
        private $carritomodelo;
        public function __construct(){
            $this->pedidomodelo = $this->modelo('pedidomodelo');
            $this->carritomodelo = $this->modelo('carritomodelo');
        }

        public function index(){
            $this->pedidomodelo->productos();
            $datos = $this->carritomodelo->productos();
            $this->vista('paginas/carritovista', $datos);
            return;  
        }
    }