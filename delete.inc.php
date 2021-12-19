<?php
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "delete") {
        $recordId = $_POST['record_id'];
        
        $query = "DELETE from lift_records WHERE record_id = " . $recordId;
        $execute = mysqli_query($db, $query) or die("Error reaching database.");

        //if successful, refresh the records page
        if (!$execute) {
            header("refresh: 2; url=edit_records.php");
            echo "Error deleting record.";
        } else {
            header("location: edit_records.php");
        }
    }
}

?>