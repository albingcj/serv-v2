<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if the "action" is "cancel" (cancellation request)
    if (isset($_POST['action']) && $_POST['action'] === 'cancel') {
        // Handle cancellation request
        $complaintID = $_POST['complaintID'];
        $approvalValue = 100; // Set the approval value to 100 for cancellation
        $query = "UPDATE `complaints` SET status = ? WHERE id = ?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ii", $approvalValue, $complaintID);

        if (mysqli_stmt_execute($stmt)) {
            $res = [
                'status' => 200,
                'message' => 'canceled'
            ];

            echo json_encode($res);
        } else {
            http_response_code(500);
            echo "Error canceling";
        }
        mysqli_stmt_close($stmt);
    } else {
        // Handle approval or other types of updates
        $complaintID = $_POST['complaintID'];
        $statq = "SELECT status FROM `complaints` WHERE id = $complaintID";
        $statr = mysqli_query($db, $statq);
        $status = mysqli_fetch_assoc($statr)['status'];
        $q = '';

        // Check if it's an approval request
        if (isset($_POST['approval'])) {
            
        } else {
            $modalType = $_POST['modalType'];

            // Handle different modal types
            if ($modalType === 'editComplaintModal') {
                // Handle editComplaintModal updates
                $complaintType = $_POST['editComplaintType'];
                $blockName = $_POST['editBlockName'];
                $roomNumber = $_POST['editRoomNumber'];
                $complaintDescription = $_POST['editComplaintDescription'];

                $query = "UPDATE `complaints` SET complaint_type = '$complaintType', block = '$blockName', place = '$roomNumber', description = '$complaintDescription' WHERE id = '$complaintID'";
            } elseif ($modalType === 'complaintFeedbackModal') {
                // Handle complaintFeedbackModal updates
                $feedbackComment = mysqli_real_escape_string($db, $_POST['feedbackComment']);
                $rating = $_POST['rating'];

                $query = "UPDATE complaints SET feedback = '$feedbackComment', rating = $rating WHERE id = $complaintID";
            }

            $query_run = mysqli_query($db, $query);

            if ($query_run) {
                echo "Data updated successfully";
            } else {
                echo "Error updating data: " . mysqli_error($db);
            }
        }
    }
}
