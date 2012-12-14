<?php 
if (isset($_POST['cambia'])) {
	require('./dbcon.inc');

	mysqli_query($db,"update users set password='".$_POST['newPass']."' where login='".$_POST['login']."' and password='".$_POST['oldPass']."'");
	CompruebaErrorMySQL('Error realizando la consulta!', $db);
	mysqli_close($db);

	header ("Location: ../?page=users&action=profile&user=".$_POST['login']); 
} else {
	header ("Location: ../?page=home"); 
}
?>
