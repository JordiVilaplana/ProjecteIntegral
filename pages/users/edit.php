<?php 
require("./pages/body.inc");
drawHead($tusers_tedit.$obj->nombre.' '.$obj->apellidos);
?>
<script src="./scripts/validation/user_edit.js"></script>
<script>
$(function() {
	$( "#panels" ).accordion({
		heightStyle: "content"
	});
});
$(function() {
	$( "#bday" ).datepicker();
});
</script>

<div id="panels">
<h2 class="titulo"><?php echo $tusers_tedit.$obj->nombre.' '.$obj->apellidos; ?></h2>
<form id="edit_data" name="edit_data" action="./dbhandlers/user_edit.php" onSubmit="return val_datos();" method="post">
	<INPUT TYPE="hidden" NAME="login" value="<?php echo $obj->login; ?>">
	<p><?php echo $tfields_user_email; ?>: <INPUT TYPE="email" NAME="email" SIZE="20" MAXLENGTH="32" value="
<?php echo $obj->email; ?>" required><span id="email_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_name; ?>: <INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="16" value="
<?php echo $obj->nombre; ?>" required><span id="nombre_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_surname; ?>: <INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="24" value="<?php echo $obj->apellidos; ?>" required><span id="apellidos_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_birthdate; ?>: <INPUT TYPE="text" id="bday" NAME="bday" value="
<?php echo $obj->nacimiento; ?>" required><span id="bday_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_address; ?>: <br><textarea name="address" rows="3" cols="50">
<?php echo $obj->direccion; ?></textarea></p>

	<p><?php echo $tfields_user_phone; ?>: <INPUT TYPE="text" NAME="phone" SIZE="20" MAXLENGTH="9" value="
<?php echo $obj->telefono; ?>"><span id="phone_erlog" class="errorlog"></span></p>

	<p><?php echo $tfields_user_photo; ?>: <INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="102400"><INPUT TYPE="file" name="photo" accept="image/*" value="../images/<?php echo $obj->photo; ?>"></p>
	<p><INPUT TYPE="submit" NAME="modifica" VALUE="<?php echo $tusers_cedit; ?>"></p>
</form>

<h2 class="titulo"><?php echo $tusers_tedit_pass; ?></h2>
<form id="edit_pass" name="edit_pass" action="./dbhandlers/user_edit_pass.php" onSubmit="return val_pass();" method="post">
	<INPUT TYPE="hidden" NAME="login" value="<?php echo $obj->login; ?>">
	<p><?php echo $tfields_user_oldpass; ?>: <INPUT TYPE="password" NAME="oldPass" SIZE="20" MAXLENGTH="24" required><span id="oldPass_erlog" class="errorlog"></span></p>
	<p><?php echo $tfields_user_newpass; ?>: <INPUT TYPE="password" NAME="newPass" SIZE="20" MAXLENGTH="24" required><span id="newPass_erlog" class="errorlog"></span></p>
	<p><?php echo $tfields_user_newrepeat; ?>: <INPUT TYPE="password" NAME="repeat" SIZE="20" MAXLENGTH="24" required><span id="repeat_erlog" class="errorlog"></span></p>
	<p><INPUT TYPE="submit" NAME="cambia" VALUE="<?php echo $tusers_cedit; ?>"></p>
</form>

<h2 class="titulo"><?php echo $tusers_delete; ?></h2>
<form id="del_user" name="del_user" action="./dbhandlers/user_remove.php" onSubmit="return val_del();" method="post">
	<INPUT TYPE="hidden" NAME="login" value="<?php echo $obj->login; ?>">
	<p><?php echo $tusers_del_q1.$obj->nombre.' '.$obj->apellidos.$tusers_del_q2; ?></p>
	<p><?php echo $tfields_user_password; ?>: <INPUT TYPE="password" NAME="pass" SIZE="20" MAXLENGTH="24" required> <INPUT TYPE="submit" NAME="delete" VALUE="Eliminar"> <span id="pass_erlog" class="errorlog"></span></p>
</form>

<?php if ($_SESSION['userType'] === 'admin') { ?>
<h2 class="titulo">Cambiar autorizacion</h2>
<form id="userType" name="userType" action="./dbhandlers/user_edit_type.php" method="post">
	<INPUT TYPE="hidden" NAME="login" value="<?php echo $obj->login; ?>">
	<p>Cambie el tipo de autorización: 
	<select name="userType">
		<option value="client" <?php if ($obj->userType == 'client') echo 'selected'; ?>>Cliente</option>
		<option value="worker" <?php if ($obj->userType == 'worker') echo 'selected'; ?>>Empleado</option>
		<option value="admin" <?php if ($obj->userType == 'admin') echo 'selected'; ?>>Administrador</option>
	</select> 
<INPUT TYPE="submit" NAME="change" VALUE="Cambiar"></p>
</form>
<?php } ?>
</div>
<?php
drawFoot();
?>
