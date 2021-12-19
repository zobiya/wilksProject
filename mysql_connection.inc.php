<?php
define('DB_NAME', 'project_database');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Bronzetree789');
define('DB_HOST', 'localhost');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  or die('Error connecting to server.');

?>