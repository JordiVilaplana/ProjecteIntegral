$(document).ready(function() {
	var oTable = $('#userlist').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": 'dbhandlers/ajax_userlist.php'
	} );
} );