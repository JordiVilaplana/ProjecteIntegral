<?php 
	require('./dbcon.inc');

	$consulta = "select * from users inner join agenda on users.login = agenda.worker 
		where userType = 'worker' and login not in 
		(select a.worker from agenda a inner join services s on a.service = s.id 
		where a.date = '".$_GET['fecha']."' and 
			(a.time between '".$_GET['time']."' and '".$_GET['timend']."' 
			or ADDTIME(a.time, s.tiempo) between '".$_GET['time']."' and '".$_GET['timend']."'))";

	$resultado = mysqli_query($db, $consulta);
	CompruebaErrorMySQL('Error realizando la consulta', $db);
	assert($resultado !== false);
	$num = mysqli_num_rows($resultado);
	if (mysqli_num_rows($resultado) < 1){
		echo 'Lo sentimos, pero no tenemos profesionales disponibles para esta hora.';
	} else {
		echo '';
	}

	mysqli_free_result($resultado);
	mysqli_close($db);
?>
