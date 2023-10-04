<?php namespace Libro;
      use Hobby\Hobby;
      use IAcciones\IAcciones;

/*A) Genera una clase que represente la entidad de tu hobby favorito incluyendo 
todos los atributos, con sus getters y setters. Asígnale un espacio de nombre.*/
include 'IAcciones.php';
include 'Hobby.php';
class Libro extends Hobby implements IAcciones
{
    Const LECTURA_DIARIA = 3;
    public static int $libros_leidos;
    private $nombre;
    private $genero;
    private $numero_paginas;

    public function __construct($nombre, $genero)
    {
        $this->setNombre($nombre);
        $this->setGenero($genero);
    }

    public function __destruct(){
        //echo "Destruyendo ".__CLASS__."<br/>";
    }
    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * Get the value of numero_paginas
     */
    public function getNumeroPaginas()
    {
        return $this->numero_paginas;
    }

    /**
     * Set the value of numero_paginas
     */
    public function setNumeroPaginas($numero_paginas): self
    {
        $this->numero_paginas = $numero_paginas;
        return $this;
    }
    public function iniciar()
    {
        echo "Iniciando la lectura del libro: " . $this->getNombre();
    }
    public function detener()
    {
        echo "Deteniendo la lectura del libro: " . $this->getNombre();
    }
    public function actualizar(array $a)
    {
        echo "Actualizado libro: " . $this->getNombre();
    }
    public function __toString(){
        return "<br/>"."Nombre del libro: ".$this->getNombre()." y su genero es ".$this->getGenero()."<br/>";
    }
    /*J) Genera una constante en tu clase (con sentido) y un atributo estático de tipo int. 
    Comprueba que es estático con dos referencias que manipulen y muestren el valor 
    de dicha variable estática (referencia desde clase y/o desde un método estático)*/
    public function libro_completo($numero){
        $leido = $this -> regla_tres($numero, $this ->getNumeroPaginas());
        $porcentaje = $this -> formatear_porcentaje($leido);
        echo "Has leido un "+$porcentaje+" del libro";
    }
    private function regla_tres($numero,$total){
        $aux = $total/100;
        $aux = $aux*$numero;
        return $aux;
    }
    protected function formatear_porcentaje($numero){
        return $numero+"%";
    }
}