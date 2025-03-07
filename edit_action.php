<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INGEDEB</title>
</head>

<body>
	<div>
		<header>
			<h1>INGEDEB</h1>
		</header>
		<main>

			<?php
			/* Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
   Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
   Los datos del formulario se acceden por el método: POST
*/

			if (isset($_POST['modifica'])) {
				/* Se obtienen los datos del proyecto (proyectos_id, nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) a partir del formulario de edición 
   (proyectos_id, nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado) por el método POST. 
   Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
*/

				$proyectos_id = $mysqli->real_escape_string($_POST['proyectos_id']);
				$nombre_proyecto = $mysqli->real_escape_string($_POST['nombre_proyecto']);
				$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
				$fecha_inicio = $mysqli->real_escape_string($_POST['fecha_inicio']);
				$fecha_fin = $mysqli->real_escape_string($_POST['fecha_fin']);
				$estado = $mysqli->real_escape_string($_POST['estado']);

				/* Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
   Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
   Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
   Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
   Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/

				// Se comprueba si existen campos del formulario vacíos
				if (empty($nombre_proyecto) || empty($descripcion) || empty($fecha_inicio) || empty($estado)) {
					if (empty($nombre_proyecto)) {
						echo "<font color='red'>Campo nombre del proyecto vacío.</font><br/>";
					}

					if (empty($descripcion)) {
						echo "<font color='red'>Campo descripción vacío.</font><br/>";
					}

					if (empty($fecha_inicio)) {
						echo "<font color='red'>Campo fecha de inicio vacío.</font><br/>";
					}

					if (empty($estado)) {
						echo "<font color='red'>Campo estado vacío.</font><br/>";
					}
				} //fin si
				else //Se realiza la modificación de un registro de la BD. 
				{
					// Se actualiza el registro a modificar: update
					$mysqli->query("UPDATE proyectos SET nombre_proyecto = '$nombre_proyecto', descripcion = '$descripcion', fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin', estado = '$estado' WHERE proyectos_id = $proyectos_id");

					// Se cierra la conexión de base de datos
					$mysqli->close();

					// Mensaje de éxito
					echo "<div>Proyecto editado correctamente...</div>";
					echo "<a href='index.php'>Ver resultado</a>";
					// Se redirige a la página principal: index.php
					// header("Location: index.php");
				} // fin sino
			} // fin si
			?>

		</main>
	</div>
</body>

</html>