<?php
include_once("header.inc.php");
include_once("mysql_connection.inc.php");

if (($_SESSION['login_active']) == true) {
    header("location: index.php");
    exit;
}
?>
<div class="text-center p-3 pt-5">
    <h4 class="pt-sm-5">Login</h4>
<br />
<br />
    <form method="POST" action="loginScript.inc.php">
        <label for="adminname">Username: </label>&nbsp;
        <input type="text" name="adminname">
        <br />
        <label for="password">Password: </label>&nbsp;
        <input type="password" name="password">
        <br />
        <button type="submit" name="submit">Sign In</button>
    </form>
</div>

<?php
include_once("footer.inc.php");
?>