/**
* @fileOverview Validació del formulari per al registre d'usuaris.
* @name user_registry.js
* @author Jordi Vilaplana
*/

/**
* Valida que el nom d'usuari siga correcte dins dels seus paràmetres.
* @return true si el nom d'usuari és correcte, false si no
*/
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

/**
* Valida que la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
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

/**
* Valida que la repetició de la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
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

/**
* Valida que l'email siga correcte dins dels seus paràmetres.
* @return true si l'email és correcte, false si no
*/
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

/**
* Valida que el nom de la persona física siga correcte dins dels seus paràmetres.
* @return true si el nom de la persona física és correcte, false si no
*/
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

/**
* Valida que els cognoms de la persona física siguen correctes dins dels seus paràmetres.
* @return true si els cognoms de la persona física són correctes, false si no
*/
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

/**
* Valida que la data de naixement de la persona física siga correcta dins dels seus paràmetres.
* @return true si la data de naixement de la persona física és correcta, false si no
*/
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

/**
* Valida que el telèfon de la persona física siga correcte dins dels seus paràmetres.
* @return true si el telèfon de la persona física és correcte, false si no
*/
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

/**
* Valida i recull la validació de tots els camps competents per al registre de l'usuari.
* @return true si tots els paràmetres verificats són correctes, false si no
*/
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
