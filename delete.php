<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja Proyecto</title>
</head>

<body>
    <div>
        <header>
            <h1>INGEDEB</h1>
        </header>
        <main>

            <?php
            /* Obtiene el id del registro del proyecto a eliminar, proyectos_id, a partir de su URL. 
   Se recibe el dato utilizando el método: GET 
   Recuerda que existen dos métodos con los que el navegador puede enviar información al servidor:
   1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request)
   2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request.
   PHP proporciona el array asociativo $_GET para acceder a la información enviada.
*/

            $proyectos_id = $_GET['proyectos_id'];

            //Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
            $proyectos_id = $mysqli->real_escape_string($proyectos_id);

            // Se realiza el borrado del registro: DELETE
            $result = $mysqli->query("DELETE FROM proyectos WHERE proyectos_id = $proyectos_id");

            // Se cierra la conexión de base de datos previamente abierta
            $mysqli->close();
            echo "<div>Proyecto borrado correctamente...</div>";
            echo "<a href='index.php'>Ver resultado</a>";
            //Se redirige a la página principal: index.php
            //header("Location:index.php");
            ?>

        </main>
    </div>
</body>

</html>