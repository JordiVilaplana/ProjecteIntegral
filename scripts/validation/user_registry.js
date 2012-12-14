function login() {
	var result = document.getElementById("login_erlog");
	var field = document.forms.userreg.login.value;

	if (field.match(/^[a-z]{4,12}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "El nombre de usuario debe tener entre 4 y 12 carácteres de la 'a' a la 'z' minúsculas.";
		return false;
	}
}

function pass() {
	var result = document.getElementById("pass_erlog");
	var field = document.forms.userreg.pass.value;

	if (field.match(/^[\S]{6,24}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "La contraseña debe tener entre 6 y 24 carácteres.";
		return false;
	}
}

function repeat() {
	var result = document.getElementById("repeat_erlog");
	var field = document.forms.userreg.pass.value;
	var repeat = document.forms.userreg.repeat.value;

	if (field === repeat) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "La contraseña debe coincidir.";
		return false;
	}
}

function email() {
	var result = document.getElementById("email_erlog");
	var field = document.forms.userreg.email.value;

	if (field.match(/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "Debe introducir una dirección de eMail válida.";
		return false;
	}
}

function nombre() {
	var result = document.getElementById("nombre_erlog");
	var field = document.forms.userreg.nombre.value;

	if (field.match(/^[A-ZÇÑ][a-zçñ]+( [A-ZÇÑ][a-zçñ]+)*$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "El formato de escritura para el nombre no es correcto.";
		return false;
	}
}

function apellidos() {
	var result = document.getElementById("apellidos_erlog");
	var field = document.forms.userreg.apellidos.value;

	if (field.match(/^[A-ZÇÑ][a-zçñ]+( [A-ZÇÑ][a-zçñ]+)*$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "El formato de escritura para los apellidos no es correcto.";
		return false;
	}
}

function bday() {
	var result = document.getElementById("bday_erlog");
	var field = new Date(document.forms.userreg.bday.value);
	var today = new Date();

	if (today >= field) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "No se permite registrar clientes no natos.";
		return false;
	}
}

function phone() {
	var result = document.getElementById("phone_erlog");
	var field = document.forms.userreg.phone.value;

	if ((field.match(/^[96][0-9]{8}$/)) || (field.length === 0)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "No se ha escrito un número de teléfono válido.";
		return false;
	}
}

function valida() {
	var rlogin = login();
	var rpass = pass();
	var rrepeat = repeat();
	var remail = email();
	var rnombre = nombre();
	var rapellidos = apellidos();
	var rbday = bday();
	var rphone = phone();
	return (rlogin && rpass && rrepeat && remail && rnombre && rapellidos && rbday && rphone);
}
