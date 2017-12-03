<h3>Comments:</h3>
<?php
header("Cache-Control: 600, must-revalidate");
use TastyRecipes\Controller\SessionManager;
$commentMessage = $commentError = "";
if(isset($_SESSION["username"])) {
    echo '<form method="post" action="'.$page.'">
        <textarea name="commentText"></textarea><br>
        <input type="submit" name="commentButton" value="Comment" class="button"> 
    </form>';
    echo "<br>";
} else {
    echo '<strong>Log in to write a comment.</strong><br>';
}
include 'submitComment.php';
echo "<strong>$commentError</strong>";
echo "<p>$commentMessage</p>";
include 'readComment.php';
$controller = SessionManager::getController();
foreach($result_array as $array){
    echo "Username: " . $array["Username"] . "<br>" . "Comment: " . $array["Comment"] . "<br>";
    $user = $array["Username"];
    $time = $array["TimeSubmitted"];
    $currentUser = $controller->getUsername();
    if ($user === $currentUser) {
    echo    '<form method="post">
                <input type="hidden" value='.$time.' name="submittedTime">
                <input type="submit" name="delete" value="Delete" class="button">
            </form>';
    echo "<br>";
    include "deleteComment.php";
    } else {
       echo "<br>";
    }
}