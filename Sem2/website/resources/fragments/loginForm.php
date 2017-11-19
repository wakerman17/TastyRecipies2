<?php ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
<body>
	<form method="post" class="loginInfo">
		<?php echo "<strong>$loginError $loginErrorUser</strong>"; ?> Username: <input type="text" name="usernameLogin">
		<?php echo "<strong>$loginErrorPassword</strong>"; ?> Password: <input type="password" name="passwordLogin">
		<input type="submit" name="log_in" value="Log in" class="button">
	</form>
</body>
</html>