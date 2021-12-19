<?php
include_once('mysql_connection.inc.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //collect all values from the form
    $name = mysqli_real_escape_string($db, $_COOKIE['name']);
    $dateOfLift = mysqli_real_escape_string($db, $_COOKIE['dateOfLift']);
    $gender = mysqli_real_escape_string($db, $_COOKIE['gender']);
    $bodyWeight = mysqli_real_escape_string($db, $_COOKIE['bodyWeight']);
    $benchPressWeight = mysqli_real_escape_string($db, $_COOKIE['benchPressWeight']);
    $deadliftWeight = mysqli_real_escape_string($db, $_COOKIE['deadliftWeight']);
    $squatWeight = mysqli_real_escape_string($db, $_COOKIE['squatWeight']);
    $totalWilks = mysqli_real_escape_string($db, $_COOKIE['total_wilks']);
    $unit = mysqli_real_escape_string($db, $_COOKIE['unit']);

    //create query to insert values into the database
    $query = "INSERT INTO lift_records(name, date_of_lift, total_wilks, unit, benchpress_weight, deadlift_weight, squat_weight, body_weight, gender) 
        VALUES ('" . $name . "', '" . $dateOfLift . "', '" . $totalWilks . "', '" . $unit . "', '" . $benchPressWeight . "', '" . $deadliftWeight . "', '" .
        $squatWeight . "', '" . $bodyWeight . "', '". $gender ."')";

    //run the query in the database
    $execute = mysqli_query($db, $query);

    //do something if it fails or succeeds
    if(!$execute) {
        echo "Error with recording score. " . "<br />" ."<br />". $query. "<br /><a href=\"index.php\">Back to the Home page.</a>";
    } else {
        echo "<div class='text-center'><h1>Wilks Score recorded!</h1></div>";
        header("Refresh: 3; url=records.php");
    }

    mysqli_close($db);
}

?>