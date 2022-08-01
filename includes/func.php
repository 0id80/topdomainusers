<?php
    require_once "const.php";


	function domain_auth($login, $password) {
		$login = trim(strtolower($login));
		$ldap = ldap_connect($ldap_server);
		if ($ldap_bind = ldap_bind($ldap, $domain_name . $login, $password)) {
			return true;
		} else {
			return false;
		}
	}

	function change_rating($connect, $login, $value) {
		$login = trim(strtolower($login));
		$sql = 'UPDATE outsiders SET rating= rating + ' . $value . ' WHERE login="' . $login . '"';
		mysqli_query($connect, $sql);
	}

	function add_outsider($connect, $login) {
		$login = trim(strtolower($login));
		$sql = "INSERT INTO outsiders (LOGIN,BIO) VALUES(" . '"' . $login . '"' . ", " . '"' . $_POST["bio"] . '"' . ");";
		mysqli_query($connect, $sql);
	}

	function delete_outsider($connect, $login) {
		$login = trim(strtolower($login));
		$sql = 'DELETE FROM outsiders WHERE login="' . $login . '"';
		mysqli_query($connect, $sql);
	}

	function check_admin($connect, $login) {
		$sql = 'SELECT * FROM admins WHERE login="' . $login . '";';
		$query = mysqli_query($connect, $sql);
		$result = mysqli_fetch_assoc($query);
		if ($result["login"] == $login and $result["permission_level"] >= 1) {
			return $result["permission_level"];
		} else {
			return false;
		}
	}

	function change_admin($connect, $login, $action) {
		$login = trim(strtolower($login));
		if ($action == "Добавить") {
			$sql = 'INSERT INTO admins (login,permission_level) VALUES("' . $login . '", 1);';
			mysqli_query($connect, $sql);
		} else if ($action == "Удалить") {
			if ($login != $_SESSION["username"]) {
				$sql = 'DELETE FROM admins WHERE login = "' . $login . '" LIMIT 1;';
				mysqli_query($connect, $sql);
			}
		}
	}
?>