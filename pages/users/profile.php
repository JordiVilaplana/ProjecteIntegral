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

<?php
drawFoot();
?>
