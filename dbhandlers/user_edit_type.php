<?php 
if (isset($_POST['change'])) {
	require('./dbcon.inc');

	mysqli_query($db,"update users set userType='".$_POST['userType']."' where login='".$_POST['login']."'");
	CompruebaErrorMySQL('Error realizando la consulta!', $db);
	mysqli_close($db);

	header ("Location: ../?page=users&action=profile&user=".$_POST['login']); 
} else {
	header ("Location: ../?page=home"); 
}
?>
