<?php 
	require('./pages/body.inc');
	drawHead($tservices);

	echo '<h2 class="titulo">'.$tservices_tlist.'</h2>';
	echo '<table>';
	echo '<tr><th>'.$tfields_services_name.'</th><th>'.$tfields_services_time.
			'</th><th>'.$tfields_services_price.'</th></tr>';
while ($obj = $resultado->fetch_object()){
	LimpiaResultados($obj);
	echo '<tr><td>'.getServNames($obj->id).'</td><td>'.$obj->tiempo.'</td><td>'.$obj->precio.'€</td></tr>';
}
	echo '</table>';
	echo '<br/><p>'.$tservices_iva.'</p>';

	drawFoot();
?>
