<?php
$fila = null;

if (isset($_GET['id'])) {
	require('./dbhandlers/dbcon.inc');

	$consulta = "select * from users where login='".$_GET['id']."'";

	$user = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($user !== false);

	if (mysqli_num_rows($user) === 1){
		$fila = mysqli_fetch_assoc($user);
		LimpiaResultados($fila);
	} else {
		mysqli_free_result($user);
		mysqli_close($db);

		$URL="./users.php"; 
		header ("Location: $URL"); 
	}
} else {
	$URL="./users.php"; 
	header ("Location: $URL"); 
}
?>
