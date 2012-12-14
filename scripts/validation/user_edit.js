/**
* @fileOverview Validació dels distints formularis de modificació de les dades dels usuaris.
* @name user_edit.js
* @author Jordi Vilaplana
*/

/** Variable on es recollirà l'objecte formulari. */
var form = null;

/**
* Valida que la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
function pass() {
	var result = document.getElementById("pass_erlog");
	var field = form.pass.value;

	if (field.match(/^[\S]{6,24}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "La contraseña debe tener entre 6 y 24 carácteres.";
		return false;
	}
}

/**
* Valida que la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
function oldPass() {
	var result = document.getElementById("oldPass_erlog");
	var field = form.oldPass.value;

	if (field.match(/^[\S]{6,24}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "La contraseña debe tener entre 6 y 24 carácteres.";
		return false;
	}
}

/**
* Valida que la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
function newPass() {
	var result = document.getElementById("newPass_erlog");
	var field = form.newPass.value;

	if (field.match(/^[\S]{6,24}$/)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "La contraseña debe tener entre 6 y 24 carácteres.";
		return false;
	}
}

/**
* Valida que la contrasenya siga correcta dins dels seus paràmetres.
* @return true si la contrasenya és correcta, false si no
*/
function repeat() {
	var result = document.getElementById("repeat_erlog");
	var field = form.newPass.value;
	var repeat = form.repeat.value;

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
	var field = form.email.value;

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
	var field = form.nombre.value;

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
	var field = form.apellidos.value;

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
	var field = new Date(form.bday.value);
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
	var field = form.phone.value;

	if ((field.match(/^[96][0-9]{8}$/)) || (field.length === 0)) {
		result.innerHTML = "";
		return true;
	} else {
		result.innerHTML = "No se ha escrito un número de teléfono válido.";
		return false;
	}
}

/**
* Valida i recull la validació de tots els camps competents per a la modificació de les dades personals de l'usuari.
* @return true si tots els paràmetres verificats són correctes, false si no
*/
function val_datos() {
	form = document.forms.edit_data;
	var remail = email();
	var rnombre = nombre();
	var rapellidos = apellidos();
	var rbday = bday();
	var rphone = phone();
	return (remail && rnombre && rapellidos && rbday && rphone);
}

/**
* Valida i recull la validació de tots els camps competents per a la modificació de la contrasenya de l'usuari.
* @return true si tots els paràmetres verificats són correctes, false si no
*/
function val_pass() {
	form = document.forms.edit_pass;
	var rold = oldPass();
	var rnew = newPass();
	var rrepeat = repeat();
	return (rold && rnew && rrepeat);
}

/**
* Valida i recull la validació de tots els camps competents per a l'esborrat de l'usuari.
* @return true si tots els paràmetres verificats són correctes, false si no
*/
function val_del() {
	form = document.forms.del_user;
	var rpass = pass();
	return (rpass);
}
