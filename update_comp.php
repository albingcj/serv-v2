<?php

require 'config.php';
include("session.php");


//approval change

// Assuming you have a database connection established

// Assuming you have a database connection established
if (isset($_POST['complaintId']) && isset($_POST['increment'])) {
    $complaintId = $_POST['complaintId'];
    $increment = intval($_POST['increment']); // Ensure it's an integer

    // Update the status in the database by incrementing it
    $updateQuery = "UPDATE complaints SET status = status + $increment WHERE id = '$complaintId'";
    $result = mysqli_query($db, $updateQuery);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'Missing data'; // Handle the case when the expected POST data is missing.
}







//feedback modal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaintID = $_POST['complaintID'];
    $modalType = $_POST['modalType'];

    if ($modalType === 'editComplaintModal') {

        $complaintType = $_POST['editComplaintType'];
        $blockName = $_POST['editBlockName'];
        $roomNumber = $_POST['editRoomNumber'];
        $complaintDescription = $_POST['editComplaintDescription'];

        // Update only the columns relevant to editComplaintModal
        $query = "UPDATE `complaints` SET complaint_type = '$complaintType', block = '$blockName', place = '$roomNumber', description = '$complaintDescription' WHERE id = '$complaintID'";
    } elseif ($modalType === 'complaintFeedbackModal') {

        $feedbackComment = $_POST['feedbackComment'];


        $query = "UPDATE `complaints` SET complaintFeedback = '$feedbackComment' WHERE id = '$complaintID'";
    }

    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . mysqli_error($db);
    }
}
?>
