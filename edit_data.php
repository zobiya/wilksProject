<?php
include_once('header.inc.php');
if ($_SESSION['account_name'] != 'admin') {
    header("location: index.php");
    exit();
}
include_once('mysql_connection.inc.php');

if(isset($_POST['submit'])) {
    $recordId = $_POST['record_id'];

    $query = "SELECT * from lift_records where record_id = ". $recordId;
    mysqli_query($db, $query) or die("Error querying database.");
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    
    $name = $row['name'];
    $date_of_lift = $row['date_of_lift'];
    $benchPressWeight = $row['benchpress_weight'];
    $deadliftWeight = $row['deadlift_weight'];
    $squatWeight = $row['squat_weight'];
    $bodyWeight = $row['body_weight'];
    $gender = $row['gender'];
    $recordId = $row['record_id'];
    $unit = $row['unit'];
}
?>
    <div class="text-center p-3">
        <h2>Edit Record</h2>
    </div>
    <div class="p-2 text-center">
        <form method="POST" id="form" action="edit_data_script.php">
            <div id="formEntry">
                <label for="measurement">Measurement</label>&nbsp
                    <select name="measurement" value="<?php echo $unit ?>">
                        <option value="kg">Kg</option>
                        <option value="lbs">Lbs</option>
                    </select><br />
                <label for="name">Name: </label>&nbsp<input type="text" id="name" name="name" value="<?php echo $name ?>"><br />
                <label for="dateOfLift">Date of Lift</label>&nbsp <input id="dateOfLift"  type="date" name="dateOfLift" value="<?php echo $date_of_lift ?>"><br />
                <label for="gender">Gender</label>&nbsp
                    <select name="gender" id="gender" name="gender" value="<?php echo $gender ?>">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                    <br />
                <label for="bodyWeight">Body Weight</label>&nbsp <input id="bodyWeight" type="number" name="bodyWeight" value="<?php echo $bodyWeight ?>"><br />
                <label for="benchPressWeight">Bench Press Weight</label>&nbsp <input id="benchPressWeight" type="number" name="benchPressWeight" value="<?php echo $benchPressWeight ?>"><br />
                <label for="deadliftWeight">Deadlift Weight</label>&nbsp <input id="deadliftWeight" type="number" name="deadliftWeight" value="<?php echo $deadliftWeight ?>"><br />
                <label for="squatWeight">Squat Weight</label>&nbsp <input id="squatWeight" type="number" name="squatWeight" value="<?php echo $squatWeight ?>"><br />
                <input type="hidden" value="<?php echo $recordId ?>" name="recordId" />
                <button type="button" id="button" onclick="calculateForm()">Calculate Edited Record</button>
            </div>
            
        </form>
    </div>

<?php
include_once('footer.inc.php');
?>