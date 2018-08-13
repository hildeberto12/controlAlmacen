<?php
require "conexion.php";
require "authuser.php";


$datos = filter_input_array(INPUT_POST);

$sql = "DELETE FROM users WHERE id = '".$datos['id']."';";

mysqli_query($conection,$sql) 
or die(mysqli_error($conection));

header("Location: ver_usuarios.php");

exit();