<?php
use Libro\Libro;
include 'clases/Libro.php';

/*B) Instancia tres objetos de dicha clase en un script individual 
referenciando bien con el namespace.*/

$libro1 = new Libro("El lazarillo de tormes","Picaresca");
$libro2 = new Libro("La isla del tesoro", "aventura");
$libro3 = new Libro("La llamada de Chtulu", "Horror cosmico");

/*C) Crea una superclase abstracta denominada Hobby de la que herede tu entidad y que implemente la interfaz Acciones. 

C.1) Hobby definirá los métodos setNombre(string $nombre), getNombre(): string

C.2) La interfaz contendrá los métodos iniciar(), detener(), actualizar(array $a)

C.3) Implementa los métodos de la interfaz en la subclase, mostrando mensajes de texto descriptivos. 
Ej:  "Iniciando lectura del libro $titulo de $n páginas...", etc,*/
