<?php 
	function LimpiaResultados(&$fila){
		foreach ($fila as $campo => $valor)
			if(is_string($valor) === true)
			$fila[$campo] = stripslashes($fila[$campo]);
	}

	function CompruebaErrorConexionMySQL($mensaje){
		if (mysqli_connect_errno() != 0){
			echo $mensaje.' :'.mysqli_connect_error();
			exit();
		}
	}

	function CompruebaErrorMySQL($mensaje, $conexion){
		if (mysqli_errno($conexion) != 0){
			echo $mensaje.' :'.mysqli_error($conexion);
			mysqli_close($conexion);
			exit();
		}
	}

	require('../scripts/libreria.inc');
	drawHead('Usuarios');

	echo '<h2 class="titulo">Lista de tiempos y tarifas de nuestros servicios:</h2>';

	@ $db = mysqli_connect('localhost', 'root', 'root');
	CompruebaErrorConexionMySQL('Error conectando con la bd');
	mysqli_select_db($db, 'project');
	CompruebaErrorMySQL('Error seleccionando la BD', $db);

	$consulta = "select nombre, tiempo, precio from services";
	$resultado = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	if (mysqli_num_rows($resultado) > 0){
		echo '<table>';
		echo '<tr><th>Servicio:</th><th>Tiempo:</th><th>Precio:</th></tr>';
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '<tr><td>'.$fila['nombre'].'</td><td>'.$fila['tiempo'].'</td><td>'.
					$fila['precio'].'€</td></tr>';
		}
		echo '</table>';
		echo '<br/><p>Los precios incluyen el 21% IVA</p>';
	}

	mysqli_free_result($resultado);
	mysqli_close($db);
	drawFoot();
?>
