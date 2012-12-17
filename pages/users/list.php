<?php 
require('./pages/body.inc');

drawHead($tusers_ptitle);
?>
<h2 class="titulo"><?php echo $tusers_title?></h2>
<script type="text/javascript" src="./libs/jquery.dataTables.js"></script>
<script type="text/javascript" src="./scripts/user_list.js"></script>
<style type="text/css">
	@import "./css/datatables.css";
</style>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="userslist">
<thead><tr>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Email</th>
	<th>F. Nacimiento</th>
	<th>Dirección</th>
	<th>Teléfono</th>
</tr><thead>
<tbody><tr>
	<td colspan="6" class="dataTables_empty">Carregant dades del servidor</td>
</tr><tbody>
<tfoot><tr>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Email</th>
	<th>F. Nacimiento</th>
	<th>Dirección</th>
	<th>Teléfono</th>
</tr><tfoot></table>
<?php 
drawFoot();
?>
