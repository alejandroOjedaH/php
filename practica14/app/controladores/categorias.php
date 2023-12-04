<?php

    class categorias extends Controlador{
        private $categoriasmodelo;
        public function __construct(){
            $this->categoriasmodelo = $this->modelo('categoriasmodelo');
        }

        public function index($cat = null){
            if($cat!==null){
                $datos = $this->categoriasmodelo->productos($cat);
                $this->vista('paginas/productosvista', $datos); 
            return;
            }
            $datos = $this->categoriasmodelo->categorias();
            $this->vista('paginas/categoriasvista', $datos);
            return;  
        }

        public function agregar(){
            $this->categoriasmodelo->aniadir();

            if(isset($_SESSION['paginaactual'])){
                header("Location: ./".$_SESSION['paginaactual']);
                die;
            }
            header("Location: ./categorias");
            die;
        }
    }