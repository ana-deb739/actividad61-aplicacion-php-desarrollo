<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta Proyecto</title>
</head>

<body>
	<div>
		<header>
			<h1>INGEDEB</h1>
		</header>
		<main>

			<?php
			/* Se comprueba si se ha llegado a esta página PHP a través del formulario de altas.
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón Agregar.
Los datos del formulario se acceden por el método: POST
*/

			if (isset($_POST['inserta'])) {
				/* Se obtienen los datos del proyecto (descripcion, fecha_inicio, fecha_fin y estado) 
	a partir del formulario de alta (descripcion, fecha_inicio, fecha_fin y estado) por el método POST. 
	Se envía a través del cuerpo del HTTP Request. No aparecen en la URL como en el caso del método GET. */

				$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
				$fecha_inicio = $mysqli->real_escape_string($_POST['fecha_inicio']);
				$fecha_fin = $mysqli->real_escape_string($_POST['fecha_fin']);
				$estado = $mysqli->real_escape_string($_POST['estado']);

				/* Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL. 
	Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL.
	Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z. */

				// Se comprueba si existen campos del formulario vacíos
				if (empty($descripcion) || empty($fecha_inicio) || empty($fecha_fin) || empty($estado)) {
					if (empty($descripcion)) {
						echo "<div>Campo descripción vacío.</div>";
					}

					if (empty($fecha_inicio)) {
						echo "<div>Campo fecha de inicio vacío.</div>";
					}

					if (empty($fecha_fin)) {
						echo "<div>Campo fecha de fin vacío.</div>";
					}

					if (empty($estado)) {
						echo "<div>Campo estado vacío.</div>";
					}

					// Enlace a la página anterior
					$mysqli->close();
					echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
				} else // Si no existen campos de formulario vacíos se procede al alta del nuevo registro
				{
					// Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
					$result = $mysqli->query("INSERT INTO proyectos (descripcion, fecha_inicio, fecha_fin, estado) 
			VALUES ('$descripcion', '$fecha_inicio', '$fecha_fin', '$estado')");

					// Se cierra la conexión
					$mysqli->close();
					echo "<div>Proyecto añadido correctamente...</div>";
					echo "<a href='index.php'>Ver resultado</a>";
					// Se redirige a la página principal: index.php
					// header("Location:index.php");
				}
			}
			?>

			<!--<div>Registro añadido correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
		</main>
	</div>
</body>

</html>