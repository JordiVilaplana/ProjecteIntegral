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

if (isset($_POST['alta'])) {
	@ $db = mysqli_connect('localhost', 'root', 'root');
	CompruebaErrorConexionMySQL('Error conectando con la bd');
	mysqli_select_db($db, 'project');
	CompruebaErrorMySQL('Error seleccionando la BD', $db);

	mysqli_query($db,"insert into users (login,password,email,nombre,apellidos,nacimiento) values ('".$_POST['login']."','".$_POST['password']."','".$_POST['email']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['bday']."')");
	CompruebaErrorMySQL('Error realizando el alta', $db);

	if (isset($_POST['address'])) {
		mysqli_query($db,"UPDATE users SET direccion = '".$_POST['address']."' WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."'");
		CompruebaErrorMySQL('Error realizando el alta', $db);
	}

	if (isset($_POST['phone'])) {
		mysqli_query($db,"UPDATE users SET telefono = '".$_POST['phone']."' WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."'");
		CompruebaErrorMySQL('Error realizando el alta', $db);
	}

	if (is_uploaded_file ($_FILES['photo']['tmp_name'])) {
		$namephoto = $_FILES['photo']['name'];
		$timeid = time();
		$photo = $timeid . '-' . $namephoto;
		mysqli_query($db,"UPDATE users SET photo = '".$photo."' WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."'");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo)) {
			echo '<html><body><h1>ERROR: ../images/'.$photo.'</h1></body></html>';}
	}

	mysqli_close($db);

	$URL="./profile.php?id=".$_POST['login']; 
	header ("Location: $URL"); 
} else {
	require('../scripts/libreria.inc');
	drawHead('Nuevo usuario');

?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<p>Nombre de usuario: <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12" required>*</p>
	<p>Contraseña: <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="24" required>*</p>
	<p>Correo Electrónico: <INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="32" required>*</p>
	<p>Nombre: <INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="16" required>*</p>
	<p>Apellidos: <INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="24" required>*</p>
	<p>Fecha de nacimiento: <INPUT TYPE="date" NAME="bday" required>*</p>
	<p>Dirección: <br>
		<textarea name="address" rows="3" cols="50"></textarea>
	</p>
	<p>Teléfono (fijo/móvil): <INPUT TYPE="text" NAME="phone" SIZE="20" MAXLENGTH="9"></p>
	<p>Foto: 
		<INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="102400">
		<INPUT TYPE="file" name="photo" accept="image/*"></p>
	<p><INPUT TYPE="submit" NAME="alta" VALUE="Alta"><p>
	<p>Todos los campor marcados con * son obligatorios.</p>
</form>
<?php
	drawFoot();
}?>
