/**
* @fileOverview Inicialitza la interfície de la API de Google Maps per a la pàgina d'inini.
* @name map_init.js
* @author Google, amb modificacions per Jordi Vilaplana
*/
window.onload = function() {
	var myLatlng = new google.maps.LatLng(38.823805,-0.60295);
	var mapOptions = {
		zoom: 16,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var contentString = '<div id="content">'+
		'<div id="siteNotice">'+
		'</div>'+
		'<h2 id="firstHeading" class="firstHeading">stile Peluqueros, S.L.</h2>'+
		'<div id="bodyContent">'+
		'<p>Aqui tenemos nuesta peluqueria.</p>'+
		'</div>'+
		'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'stile Peluqueros'
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
}
