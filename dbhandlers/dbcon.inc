<?php
$result = null;

function LimpiaResultados(&$fila){
	foreach ($fila as $campo => $valor)
		if(is_string($valor) === true)
		$fila[$campo] = stripslashes($fila[$campo]);
}

function CompruebaErrorConexionMySQL($mensaje){
	if (mysqli_connect_errno() != 0){
		print_r($mensaje.': '.mysqli_connect_error());
		exit();
	}
}

function CompruebaErrorMySQL($mensaje, $conexion){
	if (mysqli_errno($conexion) != 0){
		print_r($mensaje.': '.mysqli_error($conexion));
		mysqli_close($conexion);
		exit();
	}
}

function consulta($query) {
	$result = mysqli_query($db, $query);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($result !== false);
}

@ $db = mysqli_connect('localhost', 'root', 'root');
CompruebaErrorConexionMySQL('Error conectando con la bd');
mysqli_select_db($db, 'project');
CompruebaErrorMySQL('Error seleccionando la BD', $db);
?>
