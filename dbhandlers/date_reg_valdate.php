<?php 
	require('./dbcon.inc');

	$consulta = "select * from no_service where fecha = '".$_GET['fecha']."'";

	$resultado = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	$num = mysqli_num_rows($resultado);
	if (mysqli_num_rows($resultado) > 0){
		echo 'Lo sentimos, pero no atendemos citas en esta fecha.';
	} else {
		echo '';
	}

	mysqli_free_result($resultado);
	mysqli_close($db);
?>
