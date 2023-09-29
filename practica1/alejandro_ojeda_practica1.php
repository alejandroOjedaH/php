<?php
/*1) Define tu mayor hobby (Ej: escribir libros)

Uno de mis mayores hobbies aunque ya no tengo mucho tiempo de realizarlo, es
es jugar a las cartas de magic en este hay cartas que conforman mazos.
Estos mazos se utilizan para enfrentarte a otras personas con sus propios mazos.*/

/*2) Estructura una entidad que represente tu hobby con al menos 4 tipos de 
datos distintos (Ej: titulo, nº paginas, vendible, fecha_publicación)

En esta practica voy a guardar cartas en mi colección, una carta suele tener estas 
caracteristicas: nombre, coste de mana, tipo de carta, subtipo y edición.
La calve primaria seria el nombre de la carta*/

/*3) Crea una estructura basada únicamente con datos compuestos 
tipo array y datos primitivos PHP como los vistos en clase que 
permita realizar lo siguiente (sin usar bucles en ningún momento):

3.1) Crea 5 entidades independientes de tu hobby*/

$carta1 = ["name" => "Goblin guide", "manaCost" => 1, "type" => "Creature", "subType" => "Goblin", "edition" => "Battle of zendikar"];
$carta2 = ["name"=>"Lilina of the veil", "manaCost" => 3, "type" => "Planeswalker", "subType" => "Liliana", "edition" => "Innistrad"];
$carta3 = ["name"=>"Sol ring", "manaCost" => 1, "type" => "Artifact", "subType" => "", "edition" => "Commander masters"];
$carta4 = ["name"=>"Counterspell", "manaCost" => 2, "type" => "Instant", "subType" => "", "edition" => "alpha"];
$carta5 = ["name"=>"God's wrath", "manaCost" => 4, "type" => "sorcery", "subType" => "", "edition" => "Theros"];

/*3.2) Genera un catálogo con las entidades asignando un ID 
numérico a cada una de ellas*/
$collection =[
    1 => $carta1,
    2 => $carta2,
    3 => $carta3,
    4 => $carta4,
    5 => $carta5
];

/*  3.3) Obtén los IDS del catálogo*/
echo "Claves: <br/>";
var_dump(array_keys($collection));
echo "<br/><br/>";

/* 3.4) Obtén las entidades del catálogo */
echo "Valores: <br/>";
var_dump(array_values($collection));
echo "<br/><br/>";

/* 3.5) Modifica los valores de al menos dos entidades del catálogo */
$collection[1]["manaCost"] = 3;
$collection[3]["type"] = "enchantment";

/*  3.6) Genera un nuevo catálogo de dos entidades con IDs distintos 
y obtén un tercer catálogo que una los dos anteriores (emplear array_merge) */

$carta6 = ["name"=>"Elf of llanowar", "manaCost" => 1, "type" => "Creature", "subType" => "Elf", "edition" => "alpha"];
$carta7 = ["name"=>"Path to exile", "manaCost" => 1, "type" => "instant", "subType" => "", "edition" => "Theros"];

$cambio=[
    13 => $carta6,
    17 => $carta7
];

$cartas = array_merge($collection, $cambio);