<?php
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case "datereg":
		case "list":
			require("./access/services/".$_GET['action'].".php");
			break;
		default:
			header("Location: ./?page=home");
	}
} else header("Location: ./?page=home");
?>
