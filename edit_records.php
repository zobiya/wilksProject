<?php
include_once('header.inc.php');
if ($_SESSION['account_name'] != 'admin') {
    header("location: index.php");
    exit();
}
include_once('mysql_connection.inc.php');
include_once('delete.inc.php');

?>

    <div class="text-center p-3">
        <h2>Edit Lift Records</h2>
    </div>

    <div class="text-center">
        <?php
            //get top five records with highest wilks scores
            $query = "SELECT * FROM lift_records order by date_posted desc";
            mysqli_query($db, $query) or die('Error querying database.');
            //display results to page
            $result = mysqli_query($db, $query);
            echo '<table class="table text-light">
                <thead>
                    <th>Name</th><th>Bench Press</th><th>Squat</th><th>Deadlift</th><th>Wilks Score</th><th></th>
                <thead>
                <tbody>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr><form method="POST" action=""><td>' . $row['name'] . '</td><td>' .
                    $row['benchpress_weight'] . '</td><td>' .
                    $row['squat_weight'] . '</td><td>' . $row['deadlift_weight'] . '</td><td>' . $row['total_wilks'] . 
                    '</td><td><input type="hidden" name="record_id" value="'. $row['record_id'] .'">
                    <button name="submit" formaction="edit_data.php" value="edit" type="submit">Edit Record</button>&nbsp<button name="submit" value="delete" type="submit">Delete</button>
                    </td></form></tr>';
            }
            echo '</tbody></table>';
        ?>
    </div>

<?php
include_once('footer.inc.php');
?>