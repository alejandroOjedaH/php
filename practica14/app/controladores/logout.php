<?php

    class logout extends Controlador{
        private $logoutmodelo;
        public function __construct(){
            $this->logoutmodelo = $this->modelo('logoutmodelo');
        }

        public function index(){
            $datos = $this->logoutmodelo->desLogear();
            $this->vista('paginas/logoutvista', $datos);    
        }
    }