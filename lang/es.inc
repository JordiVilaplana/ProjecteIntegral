<?php
$t_lang = "es";
$t_footer = "Optimizado para";
$t_yes = "Sí";
$t_no = "No";

$terror_user = "Este usuario no existe.";
$terror_login = "El nombre de usuario no existe o la contraseña no es correcta.";

$tlogin_user = "Usuario";
$tlogin_pass = "Contraseña";
$tlogin_login = "Entra";
$tlogin_welcome_m = "Bienvenido";
$tlogin_welcome_f = "Bienvenida";
$tlogin_back = "Volver al Inicio";
$tlogin_rem = "¿Aún no te has registrado?";
$tlogin_reg = "Registrarse";

$tmenu_services = "Servicios";
$tmenu_basics = "Basicos";
$tmenu_adva = "Avanzados";
$tmenu_specials = "Especiales";
$tmenu_tarifas = "Tiemos y precios";
$tmenu_prof = "Nuestros profesionales";
$tmenu_cita = "Concertar cita";
$tmenu_users = "Ver usuarios";

$tindex_ptitle = "Inicio";
$tindex_title = "¡Bienvenido a stile Peluqueros!";

$tusers_new = "Nuevo usuario";
$tusers_new_req = "Todos los campos marcados con * son obligatorios.";
$tusers_ptitle = "Usuarios";
$tusers_title = "Usuarios registrados";
$tusers_text = "Buscar";
$tusers_field = "en";
$tusers_order = "Ordena por";
$tusers_invert = "Invertir orden";
$tusers_search = "Buscar";
$tusers_nofound = "No se han encontrado usuarios que correspondan con los criterios de búsqueda.";
$tusers_tprofile = "Perfil de ";
$tusers_edit = "Editar datos del usuario";
$tusers_cedit = "Edita";
$tusers_tedit = "Editar datos de ";
$tusers_tedit_pass = "Cambiar contraseña";
$tusers_delete = "Eliminar usuario";
$tusers_tdelete = "Eliminar ";
$tusers_del_q1 = "¿Está seguro de que desea eliminar a ";
$tusers_del_q2 = " de la base de datos?";

$tservices = "Servicios";
$tservices_tlist = "Lista de tiempos y tarifas de nuestros servicios";
$tservices_iva = "Los precios incluyen el 21% IVA";

$tdate = "Concertar cita";
$tdate_date = "Concertar";
$tdate_day = "Día";
$tdate_hour = "Hora";

$tfields_user_login = "Nombre de usuario";
$tfields_user_password = "Contraseña";
$tfields_user_oldpass = "Anterior contraseña";
$tfields_user_newpass = "Nueva contraseña";
$tfields_user_newrepeat = "Repita la nueva contraseña";
$tfields_user_name = "Nombre";
$tfields_user_surname = "Apellido";
$tfields_user_email = "Correo electrónico";
$tfields_user_birthdate = "Fecha de nacimiento";
$tfields_user_address = "Dirección postal";
$tfields_user_phone = "Teléfono";
$tfields_user_photo = "Foto";

$tfields_services_name = "Servicio";
$tfields_services_time = "Tiempo";
$tfields_services_price = "Precio";

function getServNames($servID) {
	switch ($servID) {
		case 0:	return "Lavado";		break;
		case 1:	return "Tratamiento capilar";	break;
		case 2:	return "Tinte normal";		break;
		case 3:	return "Tinte paleta";		break;
		case 4:	return "Mechas";		break;
		case 5:	return "Corte puntas";		break;
		case 6:	return "Corte normal";		break;
		case 7:	return "Corte estilo";		break;
		case 8:	return "Alisado";		break;
		case 9:	return "Permanente";		break;
	}
}
?>
