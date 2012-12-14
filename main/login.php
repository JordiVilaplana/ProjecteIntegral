<?php 
	require('../scripts/libreria.inc');
	drawHead('LogIn');

	function LimpiaResultados($objeto){
		foreach ($objeto as $atributo => $valor)
			if(is_string($objeto->$atributo) === true)
				$objeto->$atributo = stripslashes($objeto->$atributo);
	}

	class ExcepcionEnTransaccion extends Exception{
		public function __construct(){}
	}
?>

<?php
	 if (isset($_GET['valida']) === true){
		$login=$_GET['login'];
		$password=$_GET['password'];
		try{
			@ $db = new mysqli('localhost', 'root', 'root');
			if (mysqli_connect_errno() != 0)
				throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
			
			$db->select_db('project');
			if ($db->errno != 0)
				throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
				
			$consulta = "select login, password from users where login='".$login."' and password='".$password."'";
			$resultado = $db->query($consulta);
			if ($db->errno != 0)
				throw new Exception('Error realizando consulta:'.$db->error, $db->errno);
			assert($resultado !== false);
			
			if ($resultado->num_rows > 0){
					while ($obj = $resultado->fetch_object()){
						LimpiaResultados($obj);
						echo 'Bienvenido, '.$login;
					}
				}
			else 
				echo '<p>Login y password incorrectos</p>';
				
			$resultado->free(); 
			$db->close(); 
		}catch (Exception $e){
			echo $e->getMessage();
			if (mysqli_connect_errno() == 0)
				$db->close();
			exit();
		}
	}
	else{
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
	<TABLE>
		<TR>
			<TD>Login:</TD>
			<TD><INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="30"></TD>
		</TR>
		<TR>
			<TD>Password:</TD>
			<TD><INPUT TYPE="text" NAME="password" SIZE="20" MAXLENGTH="30"></TD>
		</TR>
	</TABLE>
	<INPUT TYPE="submit" NAME="valida" VALUE="Valida">
</FORM>
<?php
}
drawFoot();
?>