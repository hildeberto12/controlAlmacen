<?php
require "conexion.php";

$datos = filter_input_array(INPUT_POST);

$sql = "insert into users (usuario,passwd,nombre,email,rol) values 
		('".$datos['usuario']."','".$datos['passwd']."',"
		.($datos['nombre']!=""?"'".$datos['nombre']."'":"null").",'".$datos['email']."','".$datos['rol']."')";

mysqli_query($conection,$sql) 
or die(mysqli_error($conection));

header("Location: index.php");

exit();
