<?php
include_once('mysql_connection.inc.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //collect all values from the form
    $name = mysqli_real_escape_string($db, $_COOKIE['name']);
    $dateOfLift = mysqli_real_escape_string($db, $_COOKIE['dateOfLift']);
    $gender = mysqli_real_escape_string($db, $_COOKIE['gender']);
    $bodyWeight = mysqli_real_escape_string($db, $_COOKIE['bodyWeight']);
    $benchPressWeight = mysqli_real_escape_string($db, $_COOKIE['benchPressWeight']);
    $deadliftWeight = mysqli_real_escape_string($db, $_COOKIE['deadliftWeight']);
    $squatWeight = mysqli_real_escape_string($db, $_COOKIE['squatWeight']);
    $totalWilks = mysqli_real_escape_string($db, $_COOKIE['total_wilks']);
    $recordId = mysqli_real_escape_string($db, $_POST['recordId']);

    //create query to update data in database
    $query = "UPDATE lift_records set name='" . $name . "', date_of_lift='" . $dateOfLift . "', total_wilks='". $totalWilks .
        "', benchpress_weight='". $benchPressWeight . "', deadlift_weight='". $deadliftWeight ."', squat_weight='". $squatWeight .
        "', gender='". $gender ."' WHERE record_id='". $recordId ."' ";
    
    //run the query in the database
    $execute = mysqli_query($db, $query);

    if(!$execute) {
        header("refresh: 2; url=edit_records.php");
        echo "Error with updating data.";
    } else {
        echo "Data updated!";
        header("refresh: 2; url=records.php");
    }

    mysqli_close($db);

}

?>