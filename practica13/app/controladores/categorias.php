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

           $this->vista('paginas/categoriasvista', []);
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