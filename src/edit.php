<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Electroshop S.L.</title>
</head>
<body>
<div>
	<header>
		<h1>ELECTROSHOP S.L.</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación empleado/a</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$idempleado = $_GET['idempleado'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idempleado = $mysqli->real_escape_string($idempleado);


//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT apellido, nombre, edad, puesto FROM empleados WHERE id = $idempleado");

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$surname = $fila['apellido'];
$name = $fila['nombre'];
$age = $fila['edad'];
$job = $fila['puesto'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php
-->

	<form action="edit_action.php" method="post">
		<div>
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $name;?>" required>
		</div>

		<div>
			<label for="surname">Apellido</label>
			<input type="text" name="surname" id="surname" value="<?php echo $surname;?>" required>
		</div>

		<div>
			<label for="age">Edad</label>
			<input type="number" name="age" id="age" value="<?php echo $age;?>" required>
		</div>

		<div>
			<label for="job">Puesto</label>
			<select name="job" id="job" placeholder="puesto">
				<option value="<?php echo $job;?>" selected><?php echo $job;?></option>
				<option value="Administrativo">Administrativo</option>
				<option value="Contable">Contable</option>
				<option value="Dependiente">Dependiente</option>
				<option value="Gerente">Gerente</option>
				<option value="Repartidor">Repartidor</option>
			</select>	
		</div>

		<div >
			<input type="hidden" name="idempleado" value=<?php echo $idempleado;?>>
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

