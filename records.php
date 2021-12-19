<?php
include_once('header.inc.php');
include_once('mysql_connection.inc.php');

?>

    <div class="text-center p-3">
        <h2>Lift Records</h2>
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
                    <th>Name</th><th>Bench Press</th><th>Squat</th><th>Deadlift</th><th>Wilks Score</th>
                <thead>
                <tbody>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' . $row['name'] . '</td><td>' .
                    $row['benchpress_weight'] . '</td><td>' .
                    $row['squat_weight'] . '</td><td>' . $row['deadlift_weight'] . '</td><td>' . $row['total_wilks'] . '</td></tr>';
            }
            echo '</tbody></table>';
        ?>
    </div>

<?php
include_once('footer.inc.php');
?>