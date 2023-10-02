<?php
use Libro\Libro;
include 'clases\Libro.php';
use Ayuda\Ayuda;
include 'clases\Ayuda.php';
const ACTIVIDADES = 3;
/*B) Instancia tres objetos de dicha clase en un script individual 
referenciando bien con el namespace.*/
$array_global = [];
$libro1 = new Libro("El lazarillo de tormes","Picaresca");
$libro2 = new Libro("La isla del tesoro", "aventura");
$libro3 = new Libro("La llamada de Chtulu", "Horror cosmico");

/*C) Crea una superclase abstracta denominada Hobby de la que herede tu entidad y que implemente la interfaz Acciones. 

C.1) Hobby definirá los métodos setNombre(string $nombre), getNombre(): string

C.2) La interfaz contendrá los métodos iniciar(), detener(), actualizar(array $a)

C.3) Implementa los métodos de la interfaz en la subclase, mostrando mensajes de texto descriptivos. 
Ej:  "Iniciando lectura del libro $titulo de $n páginas...", etc,*/

/*D) Recupera la práctica 2 y crea una clase de ayuda que te devuelva los valores aleatorios adecuados 
para cada tipo de dato que componen los atributos de tu clase/entidad. Usa namespaces 
siguiendo las buenas prácticas esperadas.*/

echo Ayuda::generar_cadena()."<br/>";
echo Ayuda::generar_entero();

/*E) Genera N actividades distintas de tu hobby instanciando N objetos de tu clase de forma 
aleatoria en un programa principal, usando la clase creada en D), 
donde N es una constante PHP definida en el script principal.*/
for ($i=0; $i < ACTIVIDADES; $i++) { 
    $aux = new Libro(Ayuda::generar_cadena(), Ayuda::generar_entero());
    $array_global[$aux -> getNombre()] = "";
}

/*F) Incluye un autoload que dinamice la carga de clases de tu proyecto.*/
//En php 8 esta deprecated

/*G) Genera un array global en el programa principal que almacene una ampliación de los atributos 
de tu hobby (solamente claves). Después, agrega "mágicamente" dichos nuevos atributos, 
modificando lo realizado en E, de modo que pueda verificarse que se generan al vuelo/en 
memoria los nuevos atributos de tu hobby.*/

foreach ($array_global as $clave => $valor) {
    $array_global[$clave] = Ayuda::generar_entero();
}

/*H) Crea el constructor y destructor de tu hobby e implementa el método mágico __toString()*/
echo $libro1 -> __toString();

/*J) Genera una constante en tu clase (con sentido) y un atributo estático de tipo int. Comprueba que
 es estático con dos referencias que manipulen y muestren el valor de dicha variable estática 
 (referencia desde clase y/o desde un método estático)*/
 Libro::$libros_leidos=0;
 echo "Modificacion 1: ".Libro::$libros_leidos."<br/>";

 Libro::$libros_leidos+=1;
 echo "Modificacion 2: ".Libro::$libros_leidos."<br/>";

 /*L) Resulta que tienes un segundo hobby. Créala, heredará de la clase abstracta. Necesitas contabilizar 
 el tiempo dedicado a cada uno de ellos con métodos que te permitan establecer un tiempo máximo y mínimo.
Emplea alguna estructura que te permita modularizarlo e implementarlo.*/
