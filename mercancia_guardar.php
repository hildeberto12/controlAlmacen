<?php
require "conexion.php";

$datos = filter_input_array(INPUT_POST);

$sql = "insert into registros (id,cliente,mercancia,cantidad,numero_folio,tipo_transporte,presentacion_mercancia,numero_contenedor,numero_sello,fecha_entrada,fecha_salida) values 
		('".$datos['id']."','".$datos['cliente']."','".$datos['mercancia']."','".$datos['cantidad']."','".$datos['numero_folio']."','".$datos['tipo_transporte']."','".$datos['presentacion_mercancia']."','".$datos['numero_contenedor']."','".$datos['numero_sello']."','".$datos['fecha_entrada']."','".$datos['fecha_salida']."')";

mysqli_query($conection,$sql) 
or die(mysqli_error($conection));

header("Location: index.php");

exit();
