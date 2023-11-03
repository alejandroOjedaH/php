<?php
use GestorMascotas\GestorMascotas;
use GestorLog\GestorLog;
include_once "GestorMascotas.php";
include_once "GestorLog.php";
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$gestorMascotas;
$gestorLog;

if (!isset($_SESSION["username"])){
    header("Location: ../index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Mascotas</title>
    <link href="../Listado%20Mascotas_files/bootstrap.min_002.css" rel="stylesheet">
    <link href="../Listado%20Mascotas_files/bootstrap.min.css" rel="stylesheet">
    <style>
    .container {
        /* Si quieres que el contenedor ocupe todo el ancho disponible, puedes eliminar max-width */
        max-width: 800px;
        margin: auto;
        padding: 20px;
        display: flex;           /* Añade flex para que las tarjetas se muestren en línea */
        flex-wrap: wrap;         /* Permite que las tarjetas se ajusten y pasen a la siguiente línea si no hay espacio */
        justify-content: space-between; /* Espacio entre tarjetas. Puedes ajustar según prefieras */
    }
    .card {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        /* Ancho de las tarjetas. Puedes ajustar según prefieras */
        width: calc(33% - 10px); /* Esto asume que quieres 3 tarjetas por fila y resta 20px por el espacio entre tarjetas */
        box-sizing: border-box; /* Asegura que el padding y el borde se incluyan en el ancho total de la tarjeta */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Listado de Mascotas</h1>
         <!-- Fragmento para mostrar mensajes -->
        <div>
            Ordenar por:
            <a href="?orden=1" class="btn btn-success mt-2">Nombre ASC</a> |
            <a href="?orden=2" class="btn btn-warning">Nombre DES</a> |
            <a href="?orden=3" class="btn btn-success mt-2">Tipo ASC</a> |
            <a href="?orden=4" class="btn btn-warning">Tipo DES</a>
        </div>
        <?php
            try {
                $con = new PDO("mysql:host=$servername;dbname=gestormascotas", $username, $password);
                // set the PDO error mode to exception
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $gestorMascotas = new GestorMascotas($con);
                $gestorLog= new GestorLog($con);
            
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            if(isset($_GET["orden"])){
                if($_REQUEST["orden"] == 1){
                    $result =$gestorMascotas->mascAsc();
                    $gestorLog -> insert(["Filtro mascota ascendente",new DateTime()]);
                    array_push($_SESSION["logs"],["Filtro mascota ascendente",new DateTime()]);
                }else if($_REQUEST["orden"] == 2){
                    $result =$gestorMascotas->mascDes();
                    $gestorLog -> insert(["Filtro mascota descendente",new DateTime()]);
                    array_push($_SESSION["logs"],["Filtro mascota descendente",new DateTime()]);
                }else if($_REQUEST["orden"] == 3){
                    $result =$gestorMascotas->tipoAsc();
                    $gestorLog -> insert(["Filtro tipo ascendente",new DateTime()]);
                    array_push($_SESSION["logs"],["Filtro tipo ascendente",new DateTime()]);
                }else if($_REQUEST["orden"] == 4){
                    $result =$gestorMascotas->tipoDes();
                    $gestorLog -> insert(["Filtro tipo descendente",new DateTime()]);
                    array_push($_SESSION["logs"],["Filtro tipo descendente",new DateTime()]);
                }else if($_REQUEST["orden"] == 5){
                    session_destroy();

                    header("Location: ../index.php");
                    die;
                }
            }else{
                $result =$gestorMascotas->table();
                $gestorLog -> insert(array("Sin filtro",new DateTime()));
                array_push($_SESSION["logs"],["Sin filtro",new DateTime()]);
            }

            foreach ($result as $row) {
                echo "<div class=\"card\">";
                echo "<div class=\"card-content\">";
                echo "<img src=\"".$row["foto_url"]."\" alt=\"Foto de Bernabe\" class=\"img-fluid\" style=\"max-width: 200px;\">";
                echo "<div class=\"card-text\">";
                echo "<strong>Responsable:</strong>".$row["nombrepersona"]." ".$row["apellido"]."<br>";
                echo "<strong>Nombre:</strong>".$row["nombremascota"]."<br>";
                echo "<strong>Tipo:</strong>".$row["tipo"]."<br>";
                echo "<strong>Fecha de Nacimiento:</strong>".$row["fecha_nacimiento"];
                echo "</div></div></div>";
            }
        ?>
        </div>    
    </div>
    <div class="text-center mt-3">
    <h1>Listados Efectuados (LOGs PERSISTENTES)</h1>
    <table style="margin-left: auto; margin-right: auto;">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = $gestorLog -> table();
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>".$row["accion"]."</td>";
                    echo "<td>".$row["fecha"]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <h1>Navegación Web (LOGs de SESIÓN)</h1>
    <table style="margin-left: auto; margin-right: auto;">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($_SESSION["logs"]); $i++) { 
                    if(isset($_SESSION["logs"][$i][1])){
                        echo "<tr>";
                        echo "<td>".$_SESSION["logs"][$i][0]."</td>";
                        echo "<td>".$_SESSION["logs"][$i][1]->format('Y-m-d H:i:s')."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>

    <div class="text-center mt-3">
            <a href="#" class="btn btn-success mt-2">Registrar Mascota</a> | 
            <a href="?orden=5" class="btn btn-secondary mt-2">Cerrar Sesión</a>
    </div>
    <script src="Listado%20Mascotas_files/bootstrap.min.js"></script>


</body></html>