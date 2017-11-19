<?php
if (!empty($_POST['commentText'])) {
	$connect = mysqli_connect('localhost','willi','will','comments');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$comment = $_POST["commentText"];
	$comment = $connect->real_escape_string($comment);
	$username = $_SESSION["username"];
	$time = strtotime("now");
	$sql = 	"INSERT INTO $recipe (Username, Comment, TimeSubmitted)
			VALUES ('$username', '$comment', '$time')";
	if ($connect->query($sql) === TRUE) {
		echo "Thanks for your comment, see it below.<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}
	$connect->close();
} elseif (isset($_POST['commentButton'])) {
	echo "<strong>Please write something</strong><br><br>";
}
?>