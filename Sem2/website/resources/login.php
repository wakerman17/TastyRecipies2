<?php
$logged_in = $loginErrorUser = $loginErrorPassword = $loginError = "";
include 'logOut.php';
//New login
if(isset($_POST['log_in'])){
	$connect = mysqli_connect('localhost','willi','will','login');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$username = $_POST["usernameLogin"];
	$password = $_POST["passwordLogin"];
	include 'formValidation.php';
	$loginErrorUser = $errorUser;
	$loginErrorPassword = $errorPassword;
	$sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";
	$result = mysqli_query($connect, $sql);
	if ($result === false) {
		printf("Error1: ", mysqli_error($connect));
	} elseif (mysqli_num_rows($result) == 1) {
		$_SESSION["username"] = $username;
		$logged_in = true;
		echo 	'<form class="loginInfo" method="post">
					Hi ' . $_SESSION['username'] . ', your now logged in.
					<input type="submit" name="log_out" value="Log out" class="button">
				</form>';
	} else {
		$sql = "SELECT * FROM user WHERE Username = '$username'";
		$result = mysqli_query($connect, $sql);
		if ($connect->query($sql) === false) {
			echo "Error: " . $sql . "<br>" . $connect->error;
		}
		if (mysqli_num_rows($result) > 0) {
			if (!empty($_POST["passwordLogin"])) {
				$loginError = "The username $username is made, but the password you wrote were incorrect.";
			} else {
				$loginError = "The username $username is made.";
			}
		} elseif (!empty($_POST["usernameLogin"]) AND !empty($_POST["passwordLogin"])) {
			$loginError = "The account with the username $username weren't found.";
		}
		include 'fragments/loginForm.php';
		$connect->close();
	}
	//login between pages
} elseif (isset($_SESSION["username"])) {
	echo 	"<form class='loginInfo' method='post'>
				Hi " . $_SESSION['username'] . ", your now logged in.
				<input type='submit' name='log_out' value='Log out' class='button'>
			</form>";
	$logged_in = true;
} elseif ($logged_in === false) {}
else {
	include "fragments/loginForm.php";
}
?>