<?php
if(isset($_POST['log_out'])){
	unset($_SESSION['username']);
	unset($_POST['log_in']);
	include 'fragments/loginForm.php';
	echo '<p class="loginInfo">Logged out</p>';
	$logged_in = false;
}
?>