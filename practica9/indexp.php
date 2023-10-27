<?php
use GestorLibro\GestorLibro;
use Libro\Libro;
include "Libro.php";
include "GestorLibro.php";
/*1) Crea una Base de Datos que contenga una tabla que represente a tu 
entidad hobby en MySQL:

     1.1)  Tendrá tantas columnas como atributos tenga tu Hobby. 

     1.2) Define una PK autoincremental y define como UNIQUE el/los 
     atributos que definan a tu Hobby. 

     1.3) Procura que haya al menos un representante de cada tipo de dato 
     primitivo: integer, boolean, string y un campo DATE que almacenará la 
     fecha de alta de un registro.
     
     CREATE TABLE `libro` (
          CREATE TABLE `libro` (
          `pag_num` int(11) DEFAULT NULL,
          `fecha_publicacion` date DEFAULT NULL,
          `leido` tinyint(1) DEFAULT NULL,
          `nombre` varchar(100) DEFAULT NULL,
          `id` int(11) NOT NULL AUTO_INCREMENT,
          PRIMARY KEY (`id`),
          UNIQUE KEY `libro_un` (`nombre`)
     )
2) Genera una clase denominada Conexión que obtenga mediante un 
     método estático  la conexión a BD mediante PDO. 
3) Genera una clase denominada Gestor<MiHobby> (sustituye MiHobby por 
     el tuyo desarrollado en prácticas previas) que implemente una interfaz 
     denominada AccionesBD que contenga métodos para gestionar un CRUD. 
     Por tanto implementarás dichos métodos en tu clase, teniendo en cuenta 
     que, respectivamente, harán:

       3.1) Dar de alta un hobby tuyo. En la firma deberás pasar los valores 
       correspondientes, nulos o no, mediante un array asociativo. Gestiona 
       posibles errores, bien de conexión, bien de SQL,  lanzando una excepción 
       adecuada. 

       3.2) Eliminar un hobby. En la firma deberás pasar una PK. Gestiona los 
       errores, como en 3.1)

       3.3) Actualiza un hobby. En la firma deberás pasar una PK y el conjunto 
       de valores actualizar mediante un array asociativo.

       3.4) Recuperar todos los hobbies. Devolverá un array de objetos del tipo 
       de tu clase-hobby. Para ellos crearás un objeto por cada registro obtenido en la consulta.

4) Genera un script llamado tabla_<mihobby>.php que genere una tabla HTML mostrando todos los 
registros dados de alta en tu tabla/entidad en la primera columna. En la segunda columna, debe 
tener un enlace para borrar el registro y en la tercera columna un enlace para editar el registro.
 Para ello apóyate en una instancia de Gestor<MiHobvby>

5) Agrega un método private denominado AltaSimultanea, que recibirá como parámetro un 
array de consultas en formato cadena/string que almacenen sentencias INSERT. Gestiona 
con transacciones si, en efecto, pueden darse de alta simultáneamente mediante una 
iteración. Para ello, compruébalo con invocando el método donde los INSERT tengan la misma 
PK y con test donde todas las PK sean distintas.*/

$servername = "localhost";
$username = "root";
$password = "";
$gestorLibro;

$libro = new Libro("El nombre del viento", 220, new DateTime('2000-01-01'), true);
$libroBorrar = new Libro();
$libroBorrar->setId(12);
$libroModificar = new Libro("El capitan vs Sunflower",200,new DateTime(),false);
$libroModificar->setId(13);

try {
     $con = new PDO("mysql:host=$servername;dbname=phpmyadmin", $username, $password);
     // set the PDO error mode to exception
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully";
     $gestorLibro = new GestorLibro($con);
     
     //echo $gestorLibro -> insert($libro);
     //echo $gestorLibro -> delete($libroBorrar);
     //echo $gestorLibro -> update($libroModificar, $libroModificar -> getId());
     mostrarSelect($gestorLibro-> table());
} catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}

function mostrarSelect($result){
     foreach ($result as $row) {
          print $row['nombre'] . "\t";
          print $row['pag_num'] . "\t";
          print $row['fecha_publicacion'] . "\t";
          print $row['leido'] . "<br>";
      }
}