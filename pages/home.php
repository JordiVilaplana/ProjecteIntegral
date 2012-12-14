<?php 
require('./pages/body.inc');
drawHead($tindex_ptitle);
?>

<h2 class="titulo"><?php echo $tindex_title;?></h2>

<div id="map">
<iframe width="400" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=209995606480606778619.0004d0ac401f253c709b6&amp;ie=UTF8&amp;ll=38.823805,-0.60295&amp;spn=0,0&amp;t=h&amp;output=embed"></iframe><br /><small>Ver <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=209995606480606778619.0004d0ac401f253c709b6&amp;ie=UTF8&amp;ll=38.823805,-0.60295&amp;spn=0,0&amp;t=h&amp;source=embed" style="color:#0000FF;text-align:left">stile Peluqueros, S.L.</a> en un mapa más grande</small>
</div>
<div class="clear"></div>
<!-- AddThis Button BEGIN -->
<h3>Comparte en:</h3>
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ca1c8b6884e5d5"></script>
<!-- AddThis Button END -->
<hr />
<div id="comments"> 
	<h3>Comentarios</h3>
<?php
if (isset($_SESSION['nombre'])) {
?>
	<p>Escribe un comentario:</p>
	<form name="ins_comment" id="ins_comment" action="./dbhandlers/ins_comment.php" method="post">
	<p>Conectado como <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos']; ?></p>
	<INPUT TYPE="hidden" NAME="login" value="<?php echo $_SESSION['login']; ?>">
	<script type="text/javascript" src="./libs/nicEdit.js"></script>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script>
	<p><textarea name="comment" rows="5" cols="65"></textarea></p>
	<p><INPUT TYPE="submit" NAME="comenta" VALUE="Envía"></p>
	</form><br />
<?php
} else {
?>
	<p class="errorlog">Debes estar registrado para enviar comentarios.</p><br />
<?php
}

if ($comments->num_rows > 0){
	while ($fila = $comments->fetch_object()){
		LimpiaResultados($fila);
		echo '<div class="comment"><p class="author">'.$fila->nombre.' '.$fila->apellidos.' escribió el '.$fila->fecha.'</p>';
		echo '<p>'.$fila->comment.'</p></div><br />';
	}
} else echo '<span class="errorlog">Nadie ha enviado aún un comentario.</span>';?>
</div>
<?php
drawFoot();
?>