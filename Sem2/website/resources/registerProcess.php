<?php
$errorUser = $errorPassword = $error = "";
if (isset($_POST["register"])) {
	$username = $_POST["usernameRegister"];
	$password = $_POST["passwordRegister"];
	include 'formValidation.php';
	$registerErrorUsername = $errorUser;
	$registerErrorPassword = $errorPassword;
	if ($errorUser === $errorPassword) {
		$connect = mysqli_connect('localhost','willi','will','login');
		$sql = "SELECT * FROM user WHERE Username = '$username'";
		$result = mysqli_query($connect, $sql);
		if ($connect->query($sql) === false) {
			echo "Error: " . $sql . "<br>" . $connect->error;
		}
		//var_dump($result);
		if (mysqli_num_rows($result) > 0) {
			echo "<strong>Another account already has the username $username</strong>";
		} else {
			$sql = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
			if ($connect->query($sql) === TRUE) {
				echo "Thanks, now a new account with the username " . $username ." is created!<br>";
			}
		}
	}
}
?>