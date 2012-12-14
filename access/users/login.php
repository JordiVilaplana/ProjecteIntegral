<?php 
session_start();
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}

class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}

if (isset($_POST['login']) && isset($_POST['password'])) {
	try{
		$db = new mysqli('localhost', 'root', 'root');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db('project');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
		$consulta = "select * from users where login='".$_POST['login']."' and password='".$_POST['password']."'";
		$resultado = $db->query($consulta);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
		assert($resultado !== false);
			
		if ($resultado->num_rows == 1){
			while ($obj = $resultado->fetch_object()){
				LimpiaResultados($obj);
				$_SESSION['login'] = $obj->login;
				$_SESSION['nombre'] = $obj->nombre;
				$_SESSION['apellidos'] = $obj->apellidos;
				$_SESSION['userType'] = $obj->userType;
				require("./pages/users/login_ok.php");
			}
		} else 
			require("./pages/error/login.php");
				
		$resultado->free(); 
		$db->close(); 
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		header("Location: ./");
		exit();
	}
} else require("./pages/users/login.php");
?>
