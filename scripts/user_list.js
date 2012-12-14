window.onload = function() {
	document.getElementById("text").addEventListener("keyup", loadUserList, false);
	document.getElementById("field").addEventListener("change", loadUserList, false);
	document.getElementById("userType").addEventListener("change", loadUserList, false);
//	document.getElementById("order").addEventListener("change", loadUserList, false);
//	document.getElementById("reverse").addEventListener("change", loadUserList, false);

	loadUserList();
};

function loadUserList() {
	var consulta = "";
	var lang = document.getElementsByTagName("html")[0].lang;
	consulta += "lang=" + lang;
	var f_text = document.getElementById("text").value;
	consulta += "&text=" + f_text;
	var f_field = document.getElementById("field");
	var f_field = f_field.options[f_field.selectedIndex].value;
	consulta += "&field=" + f_field;
	var f_userType = document.getElementById("userType");
	var f_userType = f_userType.options[f_userType.selectedIndex].value;
	consulta += "&userType=" + f_userType;
/*	var f_order = document.getElementById("order");
	var f_order = f_order.options[f_order.selectedIndex].value;
	consulta += "&order=" + f_order;
	var f_reverse = document.getElementById("reverse").checked;
	consulta += "&reverse=" + f_reverse;
*/

	var oTable = $('#userslist').dataTable( {
		"bProcessing": true,
		"sAjaxSource": './dbhandlers/user_list.php?' + consulta
	} );
};

