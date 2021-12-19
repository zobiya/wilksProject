<?php
include_once('mysql_connection.inc.php');

if(isset($_POST['submit'])) {
    
    $username = mysqli_real_escape_string($db, $_POST['adminname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username) || empty($password)) {
        header("refresh: 2; url=login.php");
        echo '<alert>Please enter valid credentials.</alert>';
    } else {
        $query = "SELECT user_name, password FROM users WHERE user_name = '$username' and password = '$password'";
        $execute = mysqli_query($db, $query);
        $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
        $count = mysqli_num_rows($execute);

        //if result matches entries, table row must be 1

        if($count == 1) {
            $_SESSION['account_name'] = $username;
            $_SESSION['login_active'] = true;

            header("Location: records.php");
        } else {
            header("refresh: 2; url=login.php");
            echo '<alert>Please enter valid credentials.</alert>';
        }
    }
    
}
mysqli_close($db);


?>