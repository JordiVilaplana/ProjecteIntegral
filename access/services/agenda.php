<?php 
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}

class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}

$resultado;

function getDBObjects($consulta){
	try{
		$db = new mysqli('localhost', 'root', 'root');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db('project');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
		$resultado = $db->query($consulta);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
		assert($resultado !== false);
		
		return $resultado;
				
		$db->close(); 
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		header("Location: ./");
		exit();
	}
}

$pastDates;
$futureDates;

if (isset($_SESSION['login'])) {
	$pastDates = getDBObjects("select * from agenda inner join services inner join users on agenda.client = users.login and agenda.service = services.id where agenda.worker='".$_SESSION['login']."' order by agenda.cod desc");
	$futureDates = getDBObjects("select * from agenda inner join services inner join users on agenda.client = users.login and agenda.service = services.id where agenda.worker='".$_SESSION['login']."' order by agenda.cod asc");

	require("./pages/services/agenda.php");
} else header("Location: ./?page=home");

$resultado->free();
$pastDates->free();
$futureDates->free();
?>
