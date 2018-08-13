<?php
/*Funciones auxiliares*/

function cabecera($titulo="Almacen",$metas=[]){
	echo '<!DOCTYPE html>
			<html lang="es">
			<head>
				<meta charset="UTF-8">
				<link href="https://file.myfontastic.com/YkvRruhw4K6cVhm9Z6RdGC/icons.css" rel="stylesheet">';
	foreach ($metas as $meta) {
		echo $meta."\n";
	}

	echo	'<title>'.$titulo.'</title>
			</head>
			<body background = "images/biblio.jpg">';
}

function pie($scripts=[]){

	
	foreach ($scripts as $script) {
		echo $script."\n";
	}
	}	