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
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="add.html">Alta</a></li>
			</ul>
			<h2>Modificación de Proyecto</h2>

			<?php

			/* Obtiene el id del registro del proyecto a modificar, proyectos_id, a partir de su URL. Este tipo de datos se accede utilizando el método: GET */

			//Recoge el id del proyecto a modificar a través de la clave proyectos_id del array asociativo $_GET y lo almacena en la variable proyectos_id
			$proyectos_id = $_GET['proyectos_id'];

			// Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
			$proyectos_id = $mysqli->real_escape_string($proyectos_id);

			// Se selecciona el registro a modificar: select
			$resultado = $mysqli->query("SELECT nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado FROM proyectos WHERE proyectos_id = $proyectos_id");

			// Se extrae el registro y lo guarda en el array $fila
			$fila = $resultado->fetch_array();
			$nombre_proyecto = $fila['nombre_proyecto'];
			$descripcion = $fila['descripcion'];
			$fecha_inicio = $fila['fecha_inicio'];
			$fecha_fin = $fila['fecha_fin'];
			$estado = $fila['estado'];

			// Se cierra la conexión de base de datos
			$mysqli->close();
			?>

			<!-- FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php -->

			<form action="edit_action.php" method="post">
				<div>
					<label for="nombre_proyecto">Nombre Proyecto</label>
					<input type="text" name="nombre_proyecto" id="nombre_proyecto" value="<?php echo $nombre_proyecto; ?>" required>
				</div>

				<div>
					<label for="descripcion">Descripción</label>
					<textarea name="descripcion" id="descripcion" required><?php echo $descripcion; ?></textarea>
				</div>

				<div>
					<label for="fecha_inicio">Fecha Inicio</label>
					<input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
				</div>

				<div>
					<label for="fecha_fin">Fecha Fin</label>
					<input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $fecha_fin; ?>">
				</div>

				<div>
					<label for="estado">Estado</label>
					<select name="estado" id="estado">
						<option value="En progreso" <?php echo ($estado == "En progreso" ? "selected" : ""); ?>>En progreso</option>
						<option value="Completado" <?php echo ($estado == "Completado" ? "selected" : ""); ?>>Completado</option>
						<option value="En espera" <?php echo ($estado == "En espera" ? "selected" : ""); ?>>En espera</option>
					</select>
				</div>

				<div>
					<input type="hidden" name="proyectos_id" value="<?php echo $proyectos_id; ?>">
					<input type="submit" name="modifica" value="Guardar">
					<input type="button" value="Cancelar" onclick="location.href='index.php'">
				</div>
			</form>

		</main>
		<footer>
			Created by the IES Miguel Herrero team &copy; 2024
		</footer>
	</div>
</body>

</html>