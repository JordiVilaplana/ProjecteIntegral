<?php 
function LimpiaResultados($objeto){
	foreach ($objeto as $atributo => $valor)
		if(is_string($objeto->$atributo) === true)
			$objeto->$atributo = stripslashes($objeto->$atributo);
}

class ExcepcionEnTransaccion extends Exception{
	public function __construct(){}
}

if (isset($_GET['user'])) {
	try{
		$db = new mysqli('localhost', 'root', 'root');
		if (mysqli_connect_errno() != 0)
			throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
		$db->select_db('project');
		if ($db->errno != 0)
			throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
		$consulta = "select * from users where login='".$_GET['user']."'";
		$resultado = $db->query($consulta);
		if ($db->errno != 0)
			throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
		assert($resultado !== false);
			
		if ($resultado->num_rows == 1){
			while ($obj = $resultado->fetch_object()){
				LimpiaResultados($obj);
				require("./pages/users/edit.php");
			}
		} else 
			require("./pages/error/user.php");
				
		$resultado->free(); 
		$db->close(); 
	}catch (Exception $e){
		echo $e->getMessage();
		if (mysqli_connect_errno() == 0)
			$db->close();
		header("Location: ./");
		exit();
	}
} else header("Location: ./?page=home");
?>
