<?php 
require('./dbcon.inc');

/*function dateInsert($service) {
	$text = "insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".$_POST['time_h'].":".$_POST['time_m'].":00','".$_POST['user']."','".$_POST['pro_'.$service]."','".$service."')";
	print_r($text.' ');
	mysqli_query($db,$text);
	CompruebaErrorMySQL('Error realizando el alta', $db);
}

function minuteers() {
	while ($minOffset >= 60) {
		$minOffset -= 60;
		$hourOffset += 1;
	}
}*/

$hourOffset = 0;
$minOffset = 0;

if (isset($_POST['citar'])) {
	if (isset($_POST['serv_0'])) {
		//dateInsert(0);
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_0']."','0')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('0'.$_POST['serv_0'].' ');
		$hourOffset += 1;
		$minOffset += 0;
		//minuteers();
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_1'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_1']."','1')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('1'.$_POST['serv_1'].' ');
		$hourOffset += 1;
		$minOffset += 30;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_2'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_2']."','2')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('2'.$_POST['serv_2'].' ');
		$hourOffset += 1;
		$minOffset += 15;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_3'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_3']."','3')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('3'.$_POST['serv_3'].' ');
		$hourOffset += 1;
		$minOffset += 15;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_4'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_4']."','4')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('4'.$_POST['serv_4'].' ');
		$hourOffset += 1;
		$minOffset += 0;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_5'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_5']."','5')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('5'.$_POST['serv_5'].' ');
		$hourOffset += 0;
		$minOffset += 30;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_6'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_6']."','6')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('6'.$_POST['serv_6'].' ');
		$hourOffset += 0;
		$minOffset += 45;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_7'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_7']."','7')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('7'.$_POST['serv_7'].' ');
		$hourOffset += 1;
		$minOffset += 30;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_8'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_8']."','8')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('8'.$_POST['serv_8'].' ');
		$hourOffset += 1;
		$minOffset += 0;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
	if (isset($_POST['serv_9'])) {
		mysqli_query($db,"insert into agenda (cod,date,time,client,worker,service) values (NULL,'".$_POST['date']."','".($_POST['time_h']+$hourOffset).":".($_POST['time_m']+$minOffset).":00','".$_POST['user']."','".$_POST['pro_9']."','9')");
		CompruebaErrorMySQL('Error realizando el alta', $db);
		print_r('9'.$_POST['serv_9'].' ');
		$hourOffset += 1;
		$minOffset += 0;
		while ($minOffset >= 60) {
			$minOffset -= 60;
			$hourOffset += 1;
		}
	}
}

mysqli_close($db);
header("Location: ../?page=home");
?>
