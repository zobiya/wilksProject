<?php
if (!isset($_SESSION['login_active'])) {
    $_SESSION['login_active'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <title>Billy's Wilks Calculator</title>

    </head>  
    <body class="bg-dark text-light">
        <div class="bg-info bg-lighten-xs text-white text-center p-3">
            <h1>Wilks Calculator</h1>
            <?php
            if ($_SESSION['login_active'] == true) {
                echo "<a class='nav-link text-light float-right' href='logout.inc.php'>Log Out</a>";
            } else {
                echo "<a class='nav-link text-light float-right' href='login.php'>Login</a>";
            }
            ?>
            <ul class="nav nav-pills justify-content-left">
                <li class="nav-item">
                  <a class="nav-link text-light" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="records.php">All Records</a>
                </li>
                <?php
                    if ($_SESSION['login_active'] == true && $_SESSION['account_name'] == 'admin') {
                        echo "<li><a class='nav-link text-light float-right' href='edit_records.php'>Edit Records</a></li>";
                    }
                ?>
            </ul>
        </div>
