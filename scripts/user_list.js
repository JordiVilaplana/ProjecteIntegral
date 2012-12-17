$(document).ready(function() {
	var oTable = $('#userslist').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": 'dbhandlers/ajax_userlist.php'
	} );
} );