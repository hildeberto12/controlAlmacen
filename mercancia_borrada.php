<?php
require "conexion.php";
require "authuser.php";


$datos = filter_input_array(INPUT_POST);

$sql = "DELETE FROM registros WHERE id = '".$datos['id']."';";

mysqli_query($conection,$sql) 
or die(mysqli_error($conection));

header("Location: mercancias.php");

exit();