<?php 
	require('../scripts/libreria.inc');
	drawHead('Perfil de...');

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

if (isset($_GET['id'])) {
	$resultado = mysqli_query($db, "select * from users where login='".$_GET['id']."'");
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	if (mysqli_num_rows($resultado) > 0){
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '<script>var title = document.getElementsByTagName("title")[0];title.innerHTML = "Perfil de '.$fila['nombre'].' '.$fila['apellidos'].' - Stile Peluqueros, S.L."</script>';
			echo '<img src="../images/'.$fila['photo'].'" alt="Foto de '.$fila['nombre'].' '.$fila['apellidos'].'" />';
			echo '<h2 class="titulo">'.$fila['nombre'].' '.$fila['apellidos'].'</h2>';
			echo '<p>Correo electronico: '.$fila['email'].'</p>';
			echo '<p>Fecha de nacimiento: '.$fila['nacimiento'].'</p>';
			echo '<p>Direccion: '.$fila['direccion'].'</p>';
			echo '<p>Telefono: '.$fila['telefono'].'</p>';
			echo '<p><a href="edit.php?id='.$fila['login'].'">Editar datos del usuario</a></p>';
			echo '<div class="clear"></div>';
		}
	} else {
		$URL="./users.php"; 
		header ("Location: $URL"); 
	}

	mysqli_free_result($resultado);
	mysqli_close($db);
} else {
	$URL="./users.php"; 
	header ("Location: $URL"); 
}
	drawFoot();
?>
