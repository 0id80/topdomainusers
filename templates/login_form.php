<div id="login_form" class="row text-center">
	<div class="col">
		<form method="POST" action="" style="color: black">
			<input class="text-center" type="text" name="domain_login" placeholder="login">
			<input class="text-center" type="password" name="domain_password" placeholder="password">
			<input type="submit" name="domain_submit" value="Войти">
		</form>
	</div>
</div>
<?php

	if (array_key_exists("domain_submit", $_POST)) {
		if ( domain_auth($_POST["domain_login"], $_POST["domain_password"]) ) {
			$_SESSION["auth"] = 1;
			$_SESSION["username"] = trim(strtolower($_POST["domain_login"]));
			header("Refresh:0");
		} else {
			?> <h3 class="text-center" style="color: red"><?php echo "Что-то введено не правильно"; ?></h3>  <?php
		}
	}
?>