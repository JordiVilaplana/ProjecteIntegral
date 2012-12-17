<?php
session_start();

switch (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)) {
	case "ca":
		require('./lang/ca.inc');
		break;
	case "es":
		require('./lang/es.inc');
		break;
	default:
		require('./lang/en.inc');
}


function drawHead($title){
	echo '<!DOCTYPE html><html lang="'.$GLOBALS['t_lang'].'">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8; " />
	<link rel="stylesheet" type="text/css" href="./css/main.css" />
	<link rel="stylesheet" type="text/css" href="./css/color.css" />
	<link rel="stylesheet" type="text/css" href="./css/media.css" />
	<link rel="stylesheet" type="text/css" href="./css/jQUI/cupertino/jquery-ui.css" />
	<script src="./libs/jQuery.1.8.3.js"></script>
	<script src="./libs/jQueryUI.1.9.2.js"></script>
	<script src="./scripts/animate/usermenu.js"></script>
	<title>'.$title.' - stile Peluqueros, S.L.</title>
</head>
<body>
<div id="page">
	<div id="header">
		<h1><a href="./">stile Peluqueros <span class="little">S.L.</span></a></h1>
		<br class="lilmedia" /><div id="login">';
if (isset($_SESSION['login'])) {
	echo '<h4>'.$_SESSION['nombre'].' '.$_SESSION['apellidos'].'</h4></div>
		<div id="user_menu"><ul>';

if ($_SESSION['userType'] === 'client')
	echo '<li><a href="./?page=services&action=datereg">'.$GLOBALS['tmenu_cita'].'</a></li>';
else if ($_SESSION['userType'] === 'worker')
	echo '<li><a href="./?page=services&action=agenda">Consultar agenda</a></li>';
else if ($_SESSION['userType'] === 'admin')
	echo '<li><a href="./?page=users&action=list">'.$GLOBALS['tmenu_users'].'</a></li>';

			echo '<li><a href="./?page=users&action=profile&user='.$_SESSION['login'].'">Ver perfil</a></li><li><a href="./?page=users&action=edit&user='.$_SESSION['login'].'">Editar perfil</a></li></ul>
			<form action="./?page=users&action=logout" method="post">
				<p><input TYPE="submit" NAME="logout" VALUE="Salir"></p>
			</form>
		</div>';
} else {
			echo '<h4>LogIn</h4></div>
			<div id="user_menu">
				<form action="./?page=users&action=login" method="post">
					<p>'.$GLOBALS['tlogin_user'].': <INPUT TYPE="text" NAME="login" SIZE="20" MAXLENGTH="12"></p>
					<p>'.$GLOBALS['tlogin_pass'].': <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="24"></p>
					<p><input TYPE="submit" NAME="valida" VALUE="'.$GLOBALS['tlogin_login'].'"></p>
				</form>
				<hr />
				<form action="./?page=users&action=registry" method="post">
					<p>'.$GLOBALS['tlogin_rem'].'</p>
					<p><input TYPE="submit" NAME="register" VALUE="'.$GLOBALS['tlogin_reg'].'"></p>
				</form>
			</div>';
}
		echo '<div class="clear"></div>
	</div>
	<div id="menu">
		<ul><li><a href="./?page=home">Inicio</a></li>
			<li>'.$GLOBALS['tmenu_services'].'
				<ul>
					<li>'.$GLOBALS['tmenu_basics'].'</li>
					<li>'.$GLOBALS['tmenu_adva'].'</li>
					<li>'.$GLOBALS['tmenu_specials'].'</li>
					<li><a href="./?page=services&action=list">'.$GLOBALS['tmenu_tarifas'].'</a></li>
				</ul>
			</li>
			<li>'.$GLOBALS['tmenu_prof'].'
				<ul>
					<li>Elena</li>
					<li>Mighelo</li>
					<li>Estefanía</li>
				</ul>
			</li>';
if (isset($_SESSION['login'])) {
if ($_SESSION['userType'] === 'client')
	echo '<li><a href="./?page=services&action=datereg">'.$GLOBALS['tmenu_cita'].'</a></li>';
else if ($_SESSION['userType'] === 'worker')
	echo '<li><a href="./?page=services&action=agenda">Consultar agenda</a></li>';
else if ($_SESSION['userType'] === 'admin')
	echo '<li><a href="./?page=users&action=list">'.$GLOBALS['tmenu_users'].'</a></li>';
}
		echo '</ul>
		<div class="clear"></div>
	</div>
	<hr />
	<div id="contents">';
}

function drawFoot(){
	echo '<div class="clear"></div></div>
	<div id="footer">
		<h5>©2012-2013 Jordi Vilaplana - '.$GLOBALS['t_footer'].' Google Chrome/Chromium</h5>
	</div>
</div>
</body>
</html>';
}
?>
