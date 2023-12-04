<?php

    class login extends Controlador{
        private $loginmodelo;
        public function __construct(){
            $this->loginmodelo = $this->modelo('loginmodelo');
        }

        public function index(){
            $datos = [
                //'titulo' => NOMBRESITIO
            ];

            $this->vista('paginas/loginvista', $datos);    
        }

        public function process(){
            $correcto = $this->loginmodelo->validarlogin();

            if($correcto){
               header("Location: ../categorias");
                die;
            }else{
                header("Location: ../");
                die;
            }
        }
    }