<?php 
require('./pages/body.inc');
drawHead($tusers_tprofile.$obj->nombre.' '.$obj->apellidos);
?>

<img src="./images/<?php echo $obj->photo; ?>" alt="Foto de <?php echo $obj->nombre.' '.$obj->apellidos; ?>" />
<h2 class="titulo"><?php echo $obj->nombre.' '.$obj->apellidos; ?></h2>
<p><?php echo $tfields_user_email; ?>: <?php echo $obj->email; ?></p>
<p><?php echo $tfields_user_birthdate; ?>: <?php echo $obj->nacimiento; ?></p>
<p><?php echo $tfields_user_address; ?>: <?php echo $obj->direccion; ?></p>
<p><?php echo $tfields_user_phone; ?>: <?php echo $obj->telefono; ?></p><br/>
<p><a href="./?page=users&action=edit&user=<?php echo $_GET['user']; ?>"><?php echo $tusers_edit; ?></a></p>
<div class="clear"></div>
<hr />
<h3 class="titulo">Registro de citas:</h3>
<script>
	$(function() {
		$( "#dates" ).tabs();
	});
</script>
<div id="dates">
	<ul>
		<li><a href="#dates-1">Citas futuras</a></li>
		<li><a href="#dates-2">Citas pasadas</a></li>
	</ul>
	<div id="dates-1">
<?php
	if ($futureDates->num_rows >= 1){
		echo '<table id="futureDates"><thead><th>Fecha</th><th>Servicio</th><th>Precio</th><th>Atendido por</th></thead>';
		while ($date = $futureDates->fetch_object()){
			LimpiaResultados($date);
			echo '<tr><td>'.$date->date.' '.$date->time.'</td>';
			echo '<td>'.getServNames($date->service).'</td>';
			echo '<td>'.$date->precio.' Eur.</td>';
			echo '<td>'.$date->nombre.' '.$date->apellidos.'</td></tr>';
		}
		echo '</table>';
	} else echo '<p>No tiene ninguna cita pendiente.<br />
	Aproveche para <a href="./?page=services&action=datereg">pedir una cita</a>.</p>';
?>
	</div>
	<div id="dates-2">
<?php
	if ($pastDates->num_rows >= 1){
		echo '<table id="futureDates"><thead><th>Fecha</th><th>Servicio</th><th>Precio</th><th>Atendido por</th></thead>';
		while ($date = $pastDates->fetch_object()){
			LimpiaResultados($date);
			echo '<tr><td>'.$date->date.' '.$date->time.'</td>';
			echo '<td>'.getServNames($date->service).'</td>';
			echo '<td>'.$date->precio.' Eur.</td>';
			echo '<td>'.$date->nombre.' '.$date->apellidos.'</td></tr>';
		}
		echo '</table>';
	} else echo '<p>Aún no le hemos atendido en nuestra peluquería.<br />
	Aproveche para <a href="./?page=services&action=datereg">pedir una cita</a>.</p>';
?>
	</div>
</div>

<?php
drawFoot();
?>
