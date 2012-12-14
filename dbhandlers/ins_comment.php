<?php 
if (isset($_POST['comenta'])) {
	require('./dbcon.inc');

	mysqli_query($db,"insert into comments (id,login,fecha,comment) values (null,'".$_POST['login']."', CURDATE(),'".$_POST['comment']."')");

	CompruebaErrorMySQL('Error realizando el alta', $db);

	mysqli_close($db);
}

header("Location: ../?page=home");
?>
