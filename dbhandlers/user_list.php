<?php 
	require('./dbcon.inc');

	$consulta = "select * from users";

	$resultado = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	$num = mysqli_num_rows($resultado);
	if (mysqli_num_rows($resultado) > 0){
		$count = 0;
		echo '{ "aaData": [';
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '["'.$fila['nombre'].'","'.$fila['apellidos'].'","'.$fila['email'].'","'.$fila['nacimiento'].'","'.$fila['direccion'].'","'.$fila['telefono'].'"]';
			$count++;
			if ($count <= $num-1)
				echo ",";
		}
		echo '] }';
	} else {
		require('../lang/'.$_GET['lang'].'.inc');
		echo $tusers_nofound;
	}

	mysqli_free_result($resultado);
	mysqli_close($db);
?>
