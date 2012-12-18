<?php 
if (isset($_POST['modifica'])) {
	require('./dbcon.inc');

	mysqli_query($db,"update users set email='".$_POST['email']."', nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', nacimiento='".$_POST['bday']."', direccion='".$_POST['address']."', telefono='".$_POST['phone']."' where login='".$_POST['login']."'");
	CompruebaErrorMySQL('Error realizando la consulta!', $db);
	mysqli_close($db);

	session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['nombre'] = $_POST['nombre'];
	$_SESSION['apellidos'] = $_POST['apellidos'];
	$_SESSION['userType'] = $_SESSION['userType'];

	header ("Location: ../?page=users&action=profile&user=".$_POST['login']); 
} else {
	header ("Location: ../?page=home"); 
}
?>
