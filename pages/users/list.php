<?php 
require('./pages/body.inc');

drawHead($tusers_ptitle);
?>
<h2 class="titulo"><?php echo $tusers_title?></h2>
<form action="" method="post">
<p><?php echo $tusers_text ?>: <INPUT TYPE="text" id="text" NAME="text" SIZE="20" MAXLENGTH="12"> 
<?php echo $tusers_field ?> <select id="field" name="field">
<option value="nombre" selected><?php echo $tfields_user_name ?></option>
<option value="apellidos"><?php echo $tfields_user_surname ?></option></select> 
<?php //echo $tusers_field ?>Tipo de usuario: <select id="userType" name="userType">
<option value="" selected>Todos<?php //echo $tfields_user_name ?></option>
<option value="client">Clientes<?php //echo $tfields_user_surname ?></option>
<option value="worker">Peluqueros<?php //echo $tfields_user_surname ?></option>
<option value="admin">Administradores<?php //echo $tfields_user_surname ?></option></select>
</p></form><hr />
<script type="text/javascript" src="./libs/jquery.dataTables.js"></script>
<script type="text/javascript" src="./scripts/user_list.js"></script>
<style type="text/css">
	@import "./css/datatables.css";
</style>
<table id="userslist">
<thead><tr>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Email</th>
	<th>F. Nacimiento</th>
	<th>Dirección</th>
	<th>Teléfono</th>
</tr><thead>
</table>
<p id="responseList"></p>
<?php 
drawFoot();
?>