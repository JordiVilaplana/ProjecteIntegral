<?php
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case "login":
		case "registry":
		case "list":
		case "profile":
		case "edit":
		case "delete":
			require("./access/users/".$_GET['action'].".php");
			break;
		case "logout":
			session_start();
			session_destroy();
		default:
			header("Location: ./?page=home");
	}
} else header("Location: ./?page=home");
?>
