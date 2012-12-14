<?php
$t_lang = "en";
$t_footer = "Optimized for";
$t_yes = "Yes";
$t_no = "No";

$terror_user = "This user doesn't exist.";
$terror_login = "The user doesn't exist or the password is wrong.";

$tlogin_user = "User";
$tlogin_pass = "Password";
$tlogin_login = "Enter";
$tlogin_welcome_m = "Welcome";
$tlogin_welcome_f = "Welcome";
$tlogin_back = "Back to Index";
$tlogin_rem = "Do you have an account?";
$tlogin_reg = "Register";

$tmenu_services = "Services";
$tmenu_basics = "Basics";
$tmenu_adva = "Advanced";
$tmenu_specials = "Specials";
$tmenu_tarifas = "Times & prices";
$tmenu_prof = "Our professionals";
$tmenu_cita = "Make an appointment";
$tmenu_users = "List users";

$tindex_ptitle = "Home";
$tindex_title = "Welcome to stile Peluqueros!";

$tusers_new = "New user";
$tusers_new_req = "All the fields marked with * are required.";
$tusers_ptitle = "Users";
$tusers_title = "Registered users";
$tusers_text = "Search";
$tusers_field = "in";
$tusers_order = "Order by";
$tusers_invert = "Reverse order";
$tusers_search = "Search";
$tusers_nofound = "No users found matching the search criteria.";
$tusers_tprofile = "Profile of ";
$tusers_edit = "Edit user's data";
$tusers_cedit = "Edit";
$tusers_tedit = "Edit data of ";
$tusers_tedit_pass = "Change password";
$tusers_delete = "Remove user";
$tusers_tdelete = "Remove ";
$tusers_del_q1 = "Are you sure you want to remove ";
$tusers_del_q2 = " from database?";

$tservices = "Services";
$tservices_tlist = "Times and prices of our services";
$tservices_iva = "21% VAT is included in the prices";

$tdate = "Make an appointment";
$tdate_date = "Arrange";
$tdate_day = "Date";
$tdate_hour = "Hour";

$tfields_user_login = "User name";
$tfields_user_password = "Password";
$tfields_user_oldpass = "Old password";
$tfields_user_newpass = "New password";
$tfields_user_newrepeat = "Repeat the new password";
$tfields_user_name = "Name";
$tfields_user_surname = "Surname";
$tfields_user_email = "Electronic mail";
$tfields_user_birthdate = "Birth date";
$tfields_user_address = "Postal address";
$tfields_user_phone = "Phone numbre";
$tfields_user_photo = "Photo";

$tfields_services_name = "Service";
$tfields_services_time = "Time";
$tfields_services_price = "Price";

function getServNames($servID) {
	switch ($servID) {
		case 0:	return "Lavado";		break;
		case 1:	return "Tractament capilar";	break;
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
