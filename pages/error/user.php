<?php 
require('./pages/body.inc');
drawHead($tusers_tprofile.$obj->nombre.' '.$obj->apellidos);
?>
<div style="text-align: center;">
	<span class="errorlog">
		<p>ERROR: <?php echo $terror_user; ?></p>
	</span>
	<p><a href="./"><?php echo $tlogin_back; ?></a></p>
</div>
<?php
drawFoot();
?>
