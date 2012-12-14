<?php
require('./dbcon.inc');

if ($_POST['delete']) {
	$user = mysqli_query($db, "select * from users where login='".$_POST['login']."' and password='".$_POST['pass']."'");
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($user !== false);

	if (mysqli_num_rows($user) === 1){
		mysqli_query($db,"delete from users where login='".$_POST['login']."' and password='".$_POST['pass']."'");
		CompruebaErrorMySQL('Error realizando la consulta1', $db);
		mysqli_close($db);

		session_start();
		if ($_SESSION['login'] === $_POST['login'])
			session_destroy();

		mysqli_free_result($user);
		mysqli_close($db);

		header ("Location: ../?page=home");
	} else {
		mysqli_free_result($user);
		mysqli_close($db);

		header ("Location: ../?page=users&action=profile&user=".$_POST['login']);
	}
} else {
	mysqli_close($db);

	header ("Location: ../?page=users&action=profile&user=".$_POST['login']);
}
?>
