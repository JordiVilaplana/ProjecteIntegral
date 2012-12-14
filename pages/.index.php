<?php
require('./pages/body.inc');
drawHead($tindex_ptitle);

switch ($_GET['view']) {
	case "home":
		require ('./pages/home.php');
		break;
	default:
		header("Location: ./?page=home");
}

drawFoot();
?>
