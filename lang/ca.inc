<?php
$t_lang = "ca";
$t_footer = "Optimitzat per";
$t_yes = "Sí";
$t_no = "No";

$terror_user = "Aquest usuari no existeix.";
$terror_login = "El nom d'usuari no existeix o la contrasenya no és correcta.";

$tlogin_user = "Usuari";
$tlogin_pass = "Contrasenya";
$tlogin_login = "Entra";
$tlogin_welcome_m = "Benvingut";
$tlogin_welcome_f = "Benvinguda";
$tlogin_back = "Tornar a l'Inici";
$tlogin_rem = "Encara no t'has registrat?";
$tlogin_reg = "Registrar-se";

$tmenu_services = "Serveis";
$tmenu_basics = "Bàsics";
$tmenu_adva = "Avançats";
$tmenu_specials = "Especials";
$tmenu_tarifas = "Temps i preus";
$tmenu_prof = "Els nostres professionals";
$tmenu_cita = "Concertar cita";
$tmenu_users = "Vore usuaris";

$tindex_ptitle = "Inici";
$tindex_title = "Benvingut a stile Peluqueros!";

$tusers_new = "Nou usuari";
$tusers_new_req = "Tots els camps marcats amb * són obligatoris.";
$tusers_ptitle = "Usuaris";
$tusers_title = "Usuaris registrats";
$tusers_text = "Buscar";
$tusers_field = "en";
$tusers_order = "Ordena per";
$tusers_invert = "Invertir ordre";
$tusers_search = "Buscar";
$tusers_nofound = "No s'han trobat usuaris que corresponen amb els criteris de búsqueda.";
$tusers_tprofile = "Perfil de ";
$tusers_edit = "Editar dades de l'usuari";
$tusers_cedit = "Edita";
$tusers_tedit = "Editar dades de ";
$tusers_tedit_pass = "Canviar contrasenya";
$tusers_delete = "Eliminar usuari";
$tusers_tdelete = "Eliminar ";
$tusers_del_q1 = "Está segur de que desitja eliminar a ";
$tusers_del_q2 = " de la base de dades?";

$tservices = "Serveis";
$tservices_tlist = "Llista de temps i tarifes dels nostres serveis";
$tservices_iva = "Els preus inclouen el 21% IVA";

$tdate = "Concertar cita";
$tdate_date = "Concertar";
$tdate_day = "Dia";
$tdate_hour = "Hora";

$tfields_user_login = "Nom d'usuari";
$tfields_user_password = "Contrasenya";
$tfields_user_oldpass = "Anterior contrasenya";
$tfields_user_newpass = "Nova contrasenya";
$tfields_user_newrepeat = "Repeteixa la nova contrasenya";
$tfields_user_name = "Nom";
$tfields_user_surname = "Cognom";
$tfields_user_email = "Correu electrònic";
$tfields_user_birthdate = "Data de naixement";
$tfields_user_address = "Adreça postal";
$tfields_user_phone = "Telèfon";
$tfields_user_photo = "Foto";

$tfields_services_name = "Servei";
$tfields_services_time = "Temps";
$tfields_services_price = "Preu";

function getServNames($servID) {
	switch ($servID) {
		case 0:	return "Rentat";		break;
		case 1:	return "Tractament capilar";	break;
		case 2:	return "Tintat normal";		break;
		case 3:	return "Tintat paleta";		break;
		case 4:	return "Metxes";		break;
		case 5:	return "Tallat puntes";		break;
		case 6:	return "Tallat normal";		break;
		case 7:	return "Tallat estil";		break;
		case 8:	return "Allisat";		break;
		case 9:	return "Permanent";		break;
	}
}
?>
