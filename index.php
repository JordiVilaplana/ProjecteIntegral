<?php
if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case "users":
		case "services":
		case "team":
		case "home":
			require("./access/".$_GET['page'].".php");
			break;
		default:
			header("Location: ./?page=home");
	}
} else header("Location: ./?page=home");
?>
