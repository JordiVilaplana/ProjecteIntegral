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

$usuario;
$pastDates;
$futureDates;

if (isset($_GET['user'])) {
	$usuario = getDBObjects("select * from users where login='".$_GET['user']."'");
	$pastDates = getDBObjects("select * from agenda inner join services inner join users on agenda.worker = users.login and agenda.service = services.id where agenda.client='".$_GET['user']."' and agenda.date < CURRENT_DATE() order by agenda.cod desc");
	$futureDates = getDBObjects("select * from agenda inner join services inner join users on agenda.worker = users.login and agenda.service = services.id where agenda.client='".$_GET['user']."' and agenda.date >= CURRENT_DATE() order by agenda.cod asc");

	if ($usuario->num_rows == 1){
		while ($obj = $usuario->fetch_object()){
			LimpiaResultados($obj);
			require("./pages/users/profile.php");
		}
	} else require("./pages/error/user.php");
} else header("Location: ./?page=home");

$resultado->free();
$usuario->free();
$pastDates->free();
$futureDates->free();
?>
