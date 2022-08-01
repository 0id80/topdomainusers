<?php 
	if (array_key_exists("add_user", $_POST)) {
		add_outsider($conn, $_POST["login"]);
	}

	if (array_key_exists("add_rating", $_POST)) {
		change_rating($conn, $_POST["login"], $_POST["add_rating"]);
	}

	if (array_key_exists("remove_rating", $_POST)) {
		change_rating($conn, $_POST["login"], $_POST["remove_rating"]);
	} 

	if (array_key_exists("delete_user", $_POST)) {
		delete_outsider($conn, $_POST["login"]);
	}

	if (array_key_exists("add_admin", $_POST)) {
		change_admin($conn, $_POST["login"], $_POST["add_admin"]);
	}

	if (array_key_exists("remove_admin", $_POST)) {
		change_admin($conn, $_POST["login"], $_POST["remove_admin"]);
	}

?>