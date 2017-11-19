<?php 
if(isset($_SESSION["username"])) {
	echo 	'<form method="post">
				<textarea name="commentText"></textarea><br>
				<input type="submit" name="commentButton" value="Comment" class="button">
			</form>';
	echo "<br>";
} else {
	echo '<strong>Log in to write a comment.</strong><br>';
}
?>