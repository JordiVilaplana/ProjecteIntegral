window.onload = function() {
	document.getElementById("text").addEventListener("keyup", loadUserList, false);
	document.getElementById("field").addEventListener("change", loadUserList, false);
	document.getElementById("order").addEventListener("change", loadUserList, false);
	document.getElementById("reverse").addEventListener("change", loadUserList, false);

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
	var f_order = document.getElementById("order");
	var f_order = f_order.options[f_order.selectedIndex].value;
	consulta += "&order=" + f_order;
	var f_reverse = document.getElementById("reverse").checked;
	consulta += "&reverse=" + f_reverse;


	var userList;

	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		userList = new XMLHttpRequest();
	} else { // code for IE6, IE5
		userList = new ActiveXObject("Microsoft.XMLHTTP");
	}

	userList.onreadystatechange = function() {
		if (userList.readyState == 4 && userList.status == 200) {
			document.getElementById("responseList").innerHTML = userList.responseText;
		}
	}

	userList.open("GET", "./dbhandlers/user_list.php?" + consulta, true);
	userList.send();
};
