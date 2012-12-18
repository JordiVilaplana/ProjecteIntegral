<?php 
if (isset($_POST['alta'])) {
	require('./dbcon.inc');

	mysqli_query($db,"insert into users (login,password,email,nombre,apellidos,nacimiento) values ('".$_POST['login']."','".$_POST['pass']."','".$_POST['email']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['bday']."')");
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

	header ("Location: ../?page=users&action=profile&user=".$_POST['login']); 
} else {
	header("Location: ../?page=home");
}
?>
