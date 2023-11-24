<?php

    class pedido extends Controlador{
        private $pedidomodelo;
        public function __construct(){
            $this->pedidomodelo = $this->modelo('pedidomodelo');
        }

        public function index(){
            $datos = $this->pedidomodelo->productos();
            $this->vista('paginas/carritovista', $datos);
            return;  
        }
    }