<?php 
require('./pages/body.inc');
drawHead($tdate);
?>

<script src="./scripts/validation/date_registry.js"></script>
<script>
$(function() {
	$( "#date" ).datepicker();
});
</script>

<h2 class="titulo"><?php echo $tdate; ?></h2>
<form name="datereg" id="datereg" action="./dbhandlers/date_reg.php" onSubmit="return chkDate();" method="post">
<p>Conectado como <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos']; ?></p>
<INPUT TYPE="hidden" NAME="user" value="<?php echo $_SESSION['login']; ?>">
<?php /*echo $tlogin_user; ?>:
<?php
if ($clientes->num_rows > 0){
	echo '<select name="user">';
	while ($fila = $clientes->fetch_object()){
		LimpiaResultados($fila);
		echo '<option value="'.$fila->login.'">'.$fila->nombre.' '.$fila->apellidos.'</option>';
	}
	echo '</select>';
} else echo '<span class="errorlog">No hay usuarios en la base de datos.</span>';*/?>

<p><?php echo $tdate_day; ?>: <input id="date" name="date" type="text"> 
<?php echo $tdate_hour ?>: <select name="time_h">
<option value="10" selected>10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select><select name="time_m">
<option value="00" selected>00</option>
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select>
<span id="date_erlog" class="errorlog"></span></p><hr />

<?php if ($servicios->num_rows > 0){
	while ($fila = $servicios->fetch_object()){
		LimpiaResultados($fila);
		echo '<p><input type="checkbox" name="serv_'.$fila->id.'">'.getServNames($fila->id).' ';

		$peluqueros = getDBObjects("select * from users where userType = 'worker'");
		if ($peluqueros->num_rows > 0){
			echo '<select name="pro_'.$fila->id.'">';
			while ($obj = $peluqueros->fetch_object()){
				LimpiaResultados($obj);
				echo '<option value="'.$obj->login.'">'.$obj->nombre.
						' '.$obj->apellidos.'</option>';
			}
			echo '</select>';
		} else echo '<span class="errorlog">No hay trabajadores disponibles.</span>';

		echo '</p>';
		$peluqueros->free();
	}
} else echo '<span class="errorlog">No hay ningún servicio disponible.</span>'; ?>

<p><INPUT TYPE="submit" NAME="citar" VALUE="<?php echo $tdate_date; ?>"></p></form>
<?php
drawFoot();
?>
