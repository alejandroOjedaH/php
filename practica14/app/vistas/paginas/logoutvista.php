<?php
if($datos['deslogeado']){
    echo "La sesion se cerro con exito";
}else{
    echo "No se puedo cerrar la sesion";
}

echo "<br><a href=\"".RUTA_URL."\">Volver al login</a>";