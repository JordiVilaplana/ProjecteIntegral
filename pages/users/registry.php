<?php 
require('./pages/body.inc');
drawHead($tusers_new);
?>
<script src="./scripts/validation/user_registry.js"></script>
<script>
$(function() {
	$( "#bday" ).datepicker();
});
</script>

<form id="userreg" name="userreg" enctype="multipart/form-data" action="./dbhandlers/user_reg.php" onSubmit="return valida();" method="post">
	<p><?php echo $tfields_user_login; ?>: <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12" required>*
	<span id="login_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_password; ?>: <INPUT TYPE="password" NAME="pass" SIZE="20" MAXLENGTH="24" required>*
	<span id="pass_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_password; ?>: <INPUT TYPE="password" NAME="repeat" SIZE="20" MAXLENGTH="24" required>*
	<span id="repeat_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_email; ?>: <INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="32" required>*
	<span id="email_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_name; ?>: <INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="16" required>*
	<span id="nombre_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_surname; ?>: <INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="24" required>*
	<span id="apellidos_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_birthdate; ?>: <INPUT TYPE="text" id="bday" NAME="bday" placeholder="yyyy-mm-dd" required>*
	<span id="bday_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_address; ?>: <br>
		<textarea name="address" rows="3" cols="50"></textarea>
	</p>

	<p><?php echo $tfields_user_phone; ?>: <INPUT TYPE="text" NAME="phone" SIZE="20" MAXLENGTH="9">
	<span id="phone_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_photo; ?>: 
		<INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="1024000">
		<INPUT TYPE="file" name="photo" accept="image/*"></p>

	<p><INPUT TYPE="submit" NAME="alta" VALUE="Alta"><p>
	<p><?php echo $tusers_new_req; ?></p>
</form>

<?php 
drawFoot();
?>
