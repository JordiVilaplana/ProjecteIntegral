<?php 
	require('./pages/body.inc');
	drawHead('LogIn');
?>
<div style="text-align: center;">
	<span class="errorlog">
		<p>ERROR: <?php echo $terror_login; ?></p>
	</span>
	<form action="./?page=users&action=login" method="post">
		<p><?php echo $tlogin_user; ?>: <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12" value="<?php echo $_POST['login']; ?>"></p>
		<p><?php echo $tlogin_pass; ?>: <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="24"></p>
		<INPUT TYPE="submit" NAME="valida" VALUE="<?php echo $tlogin_login; ?>">
	</form>
</div>
<?php
drawFoot();
?>
