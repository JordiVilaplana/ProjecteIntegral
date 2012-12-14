<?php 
	require('./pages/body.inc');
	drawHead('LogIn');
?>
<div style="text-align: center;">
	<p><?php echo $tlogin_welcome_m.", ".$obj->nombre; ?>.</p>
	<p><a href="./"><?php echo $tlogin_back; ?></a></p>
</div>
<?php
drawFoot();
?>
