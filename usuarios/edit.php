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

if (isset($_POST['modifica'])) {
	mysqli_query($db,"update users set password='".$_POST['password']."', email='".$_POST['email']."', nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', nacimiento='".$_POST['bday']."', direccion='".$_POST['address']."', telefono='".$_POST['phone']."' where login='".$_POST['login']."'");
	CompruebaErrorMySQL('Error realizando la consulta!', $db);
	mysqli_close($db);

	$URL="./profile.php?id=".$_POST['login']; 
	header ("Location: $URL"); 
} else { 
	require('../scripts/libreria.inc');
	drawHead('Eliminar usuario');

	$resultado = mysqli_query($db, "select * from users where login='".$_GET['id']."'");
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	if (mysqli_num_rows($resultado) > 0){
		while ($fila = mysqli_fetch_assoc($resultado)){
			LimpiaResultados($fila);
			echo '<script>var title = document.getElementsByTagName("title")[0];
					title.innerHTML = "Modificar datos de '.$fila['nombre'].' '.$fila['apellidos'].
					' - Stile Peluqueros, S.L."</script>';

			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
			echo '<p>Nombre de usuario: <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12" 
					value="'.$fila['login'].'" readonly></p>';
			echo '<p>Contraseña: <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="24" 
					required></p>';
			echo '<p>Correo Electrónico: <INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="32" 
					value="'.$fila['email'].'" required></p>';
			echo '<p>Nombre: <INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="16" 
					value="'.$fila['nombre'].'" required></p>';
			echo '<p>Apellidos: <INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="24" 
					value="'.$fila['apellidos'].'" required></p>';
			echo '<p>Fecha de nacimiento: <INPUT TYPE="date" NAME="bday" 
					value="'.$fila['nacimiento'].'" required></p>';
			echo '<p>Dirección: <br><textarea name="address" rows="3" cols="50">'
					.$fila['direccion'].'</textarea></p>';
			echo '<p>Teléfono (fijo/móvil): <INPUT TYPE="text" NAME="phone" SIZE="20" MAXLENGTH="9" 
					value="'.$fila['telefono'].'"></p>';
			echo '<p>Foto: <INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="102400">
				<INPUT TYPE="file" name="photo" accept="image/*" value="../images/'.$fila['photo'].'">
			</p>';
			echo '<p><INPUT TYPE="submit" NAME="modifica" VALUE="Modifica"></p></form>';
			echo '<p><a href="remove.php?id='.$fila['login'].'">Eliminar usuario</a></p>';
		}

	mysqli_free_result($resultado);
	mysqli_close($db);
	} else {
		$URL="./users.php"; 
		header ("Location: $URL"); 
	}

	drawFoot();
}?>
