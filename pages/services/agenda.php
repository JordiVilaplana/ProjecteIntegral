<?php 
require('./pages/body.inc');
drawHead($tusers_tprofile.$obj->nombre.' '.$obj->apellidos);
?>

<h2 class="titulo">Registro de citas:</h2>
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
		echo '<table id="futureDates"><thead><th>Fecha</th><th>Cliente</th><th>Servicio</th><th>Precio</th></thead>';
		while ($date = $futureDates->fetch_object()){
			LimpiaResultados($date);
			echo '<tr><td>'.$date->date.' '.$date->time.'</td>';
			echo '<td>'.$date->nombre.' '.$date->apellidos.'</td>';
			echo '<td>'.getServNames($date->service).'</td>';
			echo '<td>'.$date->precio.' Eur.</td></tr>';
		}
		echo '</table>';
	} else echo '<p>No tiene ninguna cita pendiente.</p>';
?>
	</div>
	<div id="dates-2">
<?php
	if ($pastDates->num_rows >= 1){
		echo '<table id="futureDates"><thead><th>Fecha</th><th>Cliente</th><th>Servicio</th><th>Precio</th></thead>';
		while ($date = $pastDates->fetch_object()){
			LimpiaResultados($date);
			echo '<tr><td>'.$date->date.' '.$date->time.'</td>';
			echo '<td>'.$date->nombre.' '.$date->apellidos.'</td>';
			echo '<td>'.getServNames($date->service).'</td>';
			echo '<td>'.$date->precio.' Eur.</td></tr>';
		}
		echo '</table>';
	} else echo '<p>Aún no ha atendido a ningún cliente.</p>';
?>
	</div>
</div>

<?php
drawFoot();
?>
