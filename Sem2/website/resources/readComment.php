<?php 
$connect = mysqli_connect('localhost','willi','will','comments');
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM $recipe";
$result = mysqli_query($connect, $sql);
if ($connect->query($sql) === false) {
	echo "Error: " . $sql . "<br>" . $connect->error;
}

if (mysqli_num_rows($result) > 0) {
	while($row = $result->fetch_assoc()) {
		echo "Username: " . $row["Username"] . "<br>" . "Comment: " . $row["Comment"];
		$user = $row["Username"];
		$time = $row["TimeSubmitted"];
		include 'deleteComment.php';
	}
}
?>