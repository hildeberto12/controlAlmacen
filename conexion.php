<?php 

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "controlalmacen";

$conection = mysqli_connect($host,$usuario,$password,$bd);

	if (!$conection) {
		echo "Error en la conexión";
	}

?>

