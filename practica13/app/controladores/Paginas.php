<?php

    class Paginas extends Controlador{

        public function __construct(){
        }

        public function index(){

            $datos = [
                'titulo' => NOMBRESITIO
            ];

            $this->vista('paginas/inicio', $datos);    
        }

        public function login(){

            $datos = [
                'titulo' => 'Login'
            ];

            $this->vista('paginas/login', $datos);    
        }
        
    }