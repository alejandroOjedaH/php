<?php

/*Carlos se ha propuesto que en todas las páginas de un sitio Web, 
a efectos de impresión y demás, aparezca la fecha y la hora actual 
en castellano. Piensa que con ello mejorará mucho la presentación de las mismas.

Crea el código necesario para que cada vez que  abramos o actualicemos 
una página Web nos aparezca la fecha y la hora actual en castellano.*/

$formato2 = new IntlDateFormatter(
    'es-ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Berlin',
    IntlDateFormatter::GREGORIAN,
    "eeee d 'de' LLLL 'de' yyyy"
);


$ahora=new DateTime();
echo "Fecha: ".date_format($ahora, "l-F-Y");
