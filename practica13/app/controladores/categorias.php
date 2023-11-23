<?php

    class categorias extends Controlador{
        private $categoriasmodelo;
        public function __construct(){
            $this->categoriasmodelo = $this->modelo('categoriasmodelo');
        }

        public function index(){
            $datos = [
                //'titulo' => NOMBRESITIO
            ];

           $this->vista('paginas/categoriasvista', $datos);    
        }
    }