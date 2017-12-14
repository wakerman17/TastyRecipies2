<form class="loginInfo" method="post">
    <p>Hi <?php echo $_SESSION["username"]; ?>, your now logged in.</p>
    <input type="submit" name="log_out" value="Log out" class="button">
</form>