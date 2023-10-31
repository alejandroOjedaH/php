<?php
/*1. Debes crear un fichero que contenga el alfabeto separado por un espacio en blanco. Inicialmente, 
dicho alfabeto estará almacenado en un array y el fichero no existirá.

     1.1 Recorre el array e inserta carácter a carácter cada letra.

     1.2 Cada 5 letras se generará una línea y un salto de línea.

2. Recupera el fichero anterior y lee línea a línea con fscanf:

     2.1 Para cada letra leída 'letra', crearás un archivo llamado 'letra.txt' que contendrá esa 
     letra, si no existe previamente, en el directorio relativo 'letras'

     2.2. Al finalizar todas las lecturas y escrituras reinicia el puntero al comienzo y vuelve a 
     recorrer el archivo, detectando si existe el archivo de cada letra y copiándolo a otro directorio llamado 'copiasletras'*/

$alfabeto = range('A', 'Z');
$archivoAb = fopen("abecedario.txt","w");
$cadena ="";

for ($i=0; $i < count($alfabeto); $i++) { 
     if($i%5== 0){
          $cadena.="\n";
     }
     $cadena.= $alfabeto[$i];
}
fwrite($archivoAb, $cadena);
fclose($archivoAb);

$archivoAb = fopen("abecedario.txt","r");

while(!feof($archivoAb)){
     $letra = fread($archivoAb,1);
     if($letra){
          if(!file_exists("abecedario")){
               mkdir("abecedario");
          }
          $carpetaLetra= "abecedario/".$letra.".txt";
          if(!file_exists($carpetaLetra) && $letra!= "\n"){
               $archivoLetra=fopen($carpetaLetra,"w");
               fwrite($archivoLetra, $letra);
               fclose($archivoLetra);
          }
     }
}

rewind($archivoAb);
while(!feof($archivoAb)){
     $letra = fread($archivoAb,1);
     if($letra){
          if(!file_exists("copiasletras")){
               mkdir("copiasletras");
          }
          $carpetaLetra= "copiasletras/".$letra.".txt";
          if(!file_exists($carpetaLetra) && $letra!= "\n"){
               $archivoLetra=fopen($carpetaLetra,"w");
               fwrite($archivoLetra, $letra);
               fclose($archivoLetra);
          }
     }
}
