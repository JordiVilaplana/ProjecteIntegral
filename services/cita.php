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

	@ $db = mysqli_connect('localhost', 'root', 'root');
	CompruebaErrorConexionMySQL('Error conectando con la bd');
	mysqli_select_db($db, 'project');
	CompruebaErrorMySQL('Error seleccionando la BD', $db);

	require('../scripts/libreria.inc');
	drawHead('Concertar cita');

	echo '<h2 class="titulo">Concertar cita</h2>';
	echo '<form action="" method="post">';
	echo '<p>Buscar: <INPUT TYPE="text" NAME="text" SIZE="20" MAXLENGTH="12">';
	echo ' en <select name="field">';
	echo '<option value="nombre" selected>Nombre</option>';
	echo '<option value="apellidos">Apellidos</option></select>';
	echo ' Ordena por: <select name="order">';
	echo '<option value="nombre" selected>Nombre</option>';
	echo '<option value="apellidos">Apellidos</option></select> ';
	echo 'Orden inverso <INPUT TYPE="checkbox" NAME="reverse"> ';
	echo '<INPUT TYPE="submit" NAME="buscar" VALUE="Buscar"></p></form>';

	$consulta = "select login, nombre, apellidos, userType from users ";
if (isset($_GET['buscar'])) {
	$consulta = $consulta."where ".$_GET['field']." like '%".$_GET['text']."%' order by ".$_GET['order'];
}
if (isset($_GET['reverse'])) {
	$consulta = $consulta." desc";
}
	$resultado = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	if (mysqli_num_rows($resultado) > 0){
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '<p><a href="profile.php?id='.$fila['login'].'">'.
					$fila['nombre'].' '.$fila['apellidos'].'</a></p>';
		}
	}

	mysqli_free_result($resultado);
	mysqli_close($db);

	drawFoot();
?>
