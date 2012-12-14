<?php
	function drawHead($title){
		echo '<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/main.css" />
	<link rel="stylesheet" type="text/css" href="../css/color.css" />
	<title>'.$title.' - stile Peluqueros, S.L.</title>
</head>
<body>
<div id="page">
	<div id="header">
		<h1><a href="../">stile Peluqueros <span class="little">S.L.</span></a></h1>
		<div id="login">
			<h4>LogIn</h4>
			<div id="user_menu">
				<form action="../main/login.php" method="get">
					<p>Usuario: <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12"></p>
					<p>Contraseña: <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="24"></p>
					<p><input TYPE="submit" NAME="valida" VALUE="Entrar"></p>
				</form>
				<hr />
				<form action="../usuarios/register.php" method="post">
					<p>¿No tienes tu cuenta aún? 
					<input TYPE="submit" NAME="register" VALUE="Registrarse"></p>
				</form>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div id="menu">
		<ul>
			<li>Servicios
				<ul>
					<li>Básicos</li>
					<li>Avanzados</li>
					<li>Especiales</li>
					<li><a href="../services/tarifas.php">Tiempos y tarifas</a></li>
				</ul>
			</li>
			<li>Nuestros profesionales
				<ul>
					<li>Elena</li>
					<li>Mighelo</li>
					<li>Estefanía</li>
				</ul>
			</li>
			<li><a href="../services/cita.php">Concertar cita</a></li>
			<li><a href="../usuarios/users.php">Ver usuarios</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<hr />
	<div id="contents">';
	}
	function drawFoot(){
		echo '</div>
	<div id="footer">
		<h5>©2012-2013 Jordi Vilaplana - Optimizado para Google Chome/Chromium</h5>
	</div>
</div>
</body>
</html>';
	}
	/*function EscribeParrafo($texto, $estilo='texto_normal') {
		echo '<div class='.$estilo.'>'.$texto.'</div>';
	}
	function DibujaMenuBotones($menu_botones_enlace, $estilo='menu_botones_enlace') {
		echo '<div class='.$estilo.'>';
			foreach ($menu_botones_enlace as $descripcion => $enlace)
				echo '<a href="'.$enlace.'"><span>'.$descripcion.'</span></a>';
		echo '</div>';
	}
	function dibujaMenu(){
		echo '<br>';
	
		$menu = array('Alta usuario'=>'../usuarios/alta.php','Buscar usuario' =>'../usuarios/buscar.php','Eliminar usuario'=>'../usuarios/eliminar.php', 'Eliminar usuario1'=>'../usuarios/eliminar1.php', 'Ordenar usuarios'=>'../usuarios/ordenar.php', 'Modificar usuario'=>'../usuarios/modificar.php', 'Ver usuarios'=>'../usuarios/users.php');
		DibujaMenuBotones($menu);
		echo '<br>';
		
		$menu = array('Alta encuesta'=>'../encuesta/alta_e.php','Buscar encuesta'=>'../encuesta/buscar_e.php','Eliminar encuesta'=>'../encuesta/eliminar_e.php', 'Ordenar encuesta'=>'../encuesta/ordenar_e.php', 'Modificar encuesta'=>'../encuesta/modificar_e.php');
		DibujaMenuBotones($menu);
		echo '<br>';
		
		$menu = array('Alta respuestas encuesta'=>'../respuestas/alta_encuesta_respuestas.php','Buscar respuestas encuesta'=>'../respuestas/buscar_encuesta_respuestas.php','Elimina respuestas encuesta'=>'../respuestas/eliminar_encuesta_respuestas.php','Ordenar respuestas encuesta'=>'../respuestas/ordenar_encuesta_respuestas.php','Modificar respuestas encuesta'=>'../respuestas/modificar_encuesta_respuestas.php');
		DibujaMenuBotones($menu);
		echo '<br>';
		
		$menu = array('Selecciona encuesta'=>'../responde/selecciona_encuesta.php');
		DibujaMenuBotones($menu);
		echo '<br>';
	}*/
?>