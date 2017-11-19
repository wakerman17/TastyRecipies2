<?php
if ($user === $_SESSION["username"]) {
	echo  	'<form method="post">
				<input type="hidden" value="'.$time.'" name="submittedTime">
				<input type="submit" name="delete" value="Delete" class="button">
			</form>';
	echo "<br>";
	if (isset($_POST["delete"])) {
		$time = $_POST["submittedTime"];
		$sql = "DELETE FROM $recipe WHERE TimeSubmitted = $time";
		if ($connect->query($sql) === true) {
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
} else {
	echo "<br><br>";
}
?>