<?php
/* Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
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
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="add.html">Alta</a></li>
			</ul>
			<h2>Proyectos en Desarrollo</h2>
			<table border="1">
				<thead>
					<tr>
						<th>Nombre Proyecto</th>
						<th>Descripción</th>
						<th>Fecha Inicio</th>
						<th>Fecha Fin</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					<?php
					/* Se realiza una consulta de selección a la tabla 'proyectos' ordenados por fecha de inicio 
y almacena todos los registros en una estructura especial llamada $resultado.
Cada fila y cada columna de la tabla se corresponde con un registro y campo de la tabla 'proyectos'.
*/

					$resultado = $mysqli->query("SELECT * FROM proyectos ORDER BY fecha_inicio");

					// Cierra la conexión de la BD
					$mysqli->close();

					/* A continuación indicamos distintas maneras de leer cada fila de la tabla anterior: 
mysqli_fetch_array() - Almacena una fila de la tabla anterior, $resultado, en un array asociativo, numérico o ambos
mysqli_fetch_assoc() - Almacena una fila de la tabla anterior, $resultado, SOLO en un array asociativo
mysqli_fetch_row() - Almacena una fila de la tabla anterior, $resultado, en un array numérico
*/

					// Comprobamos si el número de filas/registros es mayor que 0
					if ($resultado->num_rows > 0) {

						/* A través de la estructura repetitiva "while" se recorre la "tabla" $resultado almacenando cada línea/registro en el array asociativo $fila. 
	El bucle finaliza cuando se llega a la última línea (o registro) de la tabla $resultado. 
	A medida que avanza se va construyendo cada fila de la tabla HTML con todos los campos del proyecto, hasta completar todos los registros. */

						while ($fila = $resultado->fetch_array()) {
							echo "<tr>\n";
							echo "<td>" . $fila['nombre_proyecto'] . "</td>\n";  // Muestra el nombre del proyecto
							echo "<td>" . $fila['descripcion'] . "</td>\n";  // Muestra la descripción del proyecto
							echo "<td>" . $fila['fecha_inicio'] . "</td>\n";  // Muestra la fecha de inicio
							echo "<td>" . $fila['fecha_fin'] . "</td>\n";  // Muestra la fecha de fin
							echo "<td>" . $fila['estado'] . "</td>\n";  // Muestra el estado del proyecto
							echo "<td>";  // Abre la celda para los enlaces de acción

							// Enlaces para editar o eliminar el proyecto
							echo "<a href=\"edit.php?proyecto_id=$fila[proyectos_id]\">Editar</a>\n";
							echo "<a href=\"delete.php?proyecto_id=$fila[proyectos_id]\" onClick=\"return confirm('¿Está seguro de que desea eliminar este proyecto?')\">Eliminar</a></td>\n";

							echo "</tr>\n";  // Cierra la fila de la tabla
						} // fin while
					} // fin if
					?>
				</tbody>
			</table>
		</main>
		<footer>
			Created by Ana Deb &copy; 2025
		</footer>
	</div>
</body>

</html>