/**
* @fileOverview Validació del formulari per al registre de cites (incomplet).
* @name date_registry.js
* @author Jordi Vilaplana
*/
var form = null;
var time = null;

function chkDate() {
	var result = document.getElementById("date_erlog");
	var field = null;
	if (form.date.value.length > 0)
		field = new Date(form.date.value);

	if (field == null) {
		result.innerHTML = "No ha seleccionado una fecha.";
		return false;
	} else if (field.getDay() === 0) {
		result.innerHTML = "Lo sentimos, pero no atendemos citas los domingos.";
		return false;
	} else {
		$('#date_erlog').load('./dbhandlers/date_reg_valdate.php?fecha=' + form.date.value);

		return (result.innerHTML.length < 1);
	}
}

function chkService(service, erlog, offset) {
	var result = document.getElementById(erlog);
	var field = document.getElementById(service).checked;

	if (field) {
		$(erlog).load('./dbhandlers/date_reg_valdate.php?fecha=' + form.date.value);
		return (result.innerHTML.length < 1);
	}
}

function chkProffessionals() {
	for (var i = 0; i < 10; i++) {
		
	}
}

function valida() {
	var rdate = chkDate();
//	var rpro = chkProffessionals();
	return (rdate);
}

function changeTime() {
	var hour = document.getElementById("time_h");
	hour = hour.options[hour.selectedIndex].value;
	var minutes = document.getElementById("time_h");
	minutes = minutes.options[minutes.selectedIndex].value;

	time = hour+":"+minutes+":00";
}

window.onload = function() {
	form = document.forms.datereg;
//	changeTime();
};
