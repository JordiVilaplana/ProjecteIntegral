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

if ($_POST['yes']) {
	@ $db = mysqli_connect('localhost', 'root', 'root');
	CompruebaErrorConexionMySQL('Error conectando con la bd');
	mysqli_select_db($db, 'project');
	CompruebaErrorMySQL('Error seleccionando la BD', $db);

	mysqli_query($db,"delete from users where login='".$_POST['login']."'");
	CompruebaErrorMySQL('Error realizando la consulta1', $db);
	mysqli_close($db);

	$URL="./users.php"; 
	header ("Location: $URL");
} else if ($_POST['no']) {
	$URL="profile.php?id=".$_POST['login']; 
	header ("Location: $URL");
} else {
	require('../scripts/libreria.inc');
	drawHead('Eliminar usuario');

	@ $db = mysqli_connect('localhost', 'root', 'root');
	CompruebaErrorConexionMySQL('Error conectando con la bd');
	mysqli_select_db($db, 'project');
	CompruebaErrorMySQL('Error seleccionando la BD', $db);

	$resultado = mysqli_query($db, "select login, nombre, apellidos from users where login='".
			$_GET['id']."'");
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	if (mysqli_num_rows($resultado) > 0){
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '<script>var title = document.getElementsByTagName("title")[0];
					title.innerHTML = "Eliminar '.$fila['nombre'].' '.$fila['apellidos'].
					' - Stile Peluqueros, S.L."</script>';

			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
			echo '<INPUT TYPE="hidden" NAME="login" value="'.$fila['login'].'">';
			echo '<p>¿Está seguro de que desea eliminar a '.$fila['nombre'].' '.
					$fila['apellidos'].' de la base de datos?</p>';
			echo '<p><INPUT TYPE="submit" NAME="yes" VALUE="Sí"> 
					<INPUT TYPE="submit" NAME="no" VALUE="No"></p></form>';
		}
	}

	mysqli_free_result($resultado);
	mysqli_close($db);

	drawFoot();
}
?>
