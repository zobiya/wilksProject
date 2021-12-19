<?php
include_once('header.inc.php');
include_once('mysql_connection.inc.php');
?>
    <div class="p-4 text-center">
        <h5>
            The Wilks calculator is a tool used by weightlifters to determine their relative strength.<br/>
            Taking a lifter's weight, the total weight of their main 3 lifts, age and biological gender, the calculator then sums up<br />
            the relative strength of a lifter in a single number.<br />
            The stronger you are for your size and gender, the higher your score.
        </h5>
    </div>
    <div class="p-4 text-center text-dark bg-light">
        <form method="POST" id="form" action="submit.php">
            <div id="formEntry">
                <label for="measurement">Measurement</label>&nbsp
                    <select name="measurement">
                        <option value="kg">Kg</option>
                        <option value="lbs">Lbs</option>
                    </select><br />
                <label for="name">Name: </label>&nbsp<input type="text" id="name" name="name"><br />
                <label for="dateOfLift">Date of Lift</label>&nbsp <input id="dateOfLift"  type="date" name="dateOfLift"><br />
                <label for="gender">Gender</label>&nbsp
                    <select name="gender" id="gender" name="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                    <br />
                <label for="bodyWeight">Body Weight</label>&nbsp <input id="bodyWeight" type="number" name="bodyWeight"><br />
                <label for="benchPressWeight">Bench Press Weight</label>&nbsp <input id="benchPressWeight" type="number" name="benchPressWeight"><br />
                <label for="deadliftWeight">Deadlift Weight</label>&nbsp <input id="deadliftWeight" type="number" name="deadliftWeight"><br />
                <label for="squatWeight">Squat Weight</label>&nbsp <input id="squatWeight" type="number" name="squatWeight"><br />
                <button type="button" id="button" onclick="calculateForm()">Calculate!</button>
            </div>
            
        </form>
    </div>
    <div class="text-center h3">
        <br />
        <h2 class="p-3">Top 5 Wilks Scores</h2>
        <?php
            //get top five records with highest wilks scores
            $query = "SELECT * FROM lift_records order by total_wilks desc LIMIT 5";
            mysqli_query($db, $query) or die('Error querying database.');
            //display results to page
            $result = mysqli_query($db, $query);
            $counter = 1;
            while ($row = mysqli_fetch_array($result)) {
                echo $counter . '.' . ' ' . $row['name'] . ' - ' . $row['total_wilks'] . '<br/>';
                $counter += 1;
            }
        ?>
    </div>
<?php
include_once('footer.inc.php');
?>