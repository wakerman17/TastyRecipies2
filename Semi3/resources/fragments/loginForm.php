<form method="post" class="loginInfo" action=<?php $page ?>>
    <?php echo "<strong>$loginError $loginErrorUser</strong>"; ?> Username: <input type="text" name="usernameLogin">
    <?php echo "<strong>$loginErrorPassword</strong>"; ?> Password: <input type="password" name="passwordLogin">
    <input type="submit" name="log_in" value="Log in" class="button">
</form>