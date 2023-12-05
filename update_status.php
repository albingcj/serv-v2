<?php
require 'config.php';
if (isset($_POST['complaintId']) && isset($_POST['newStatus'])) {
    $complaintId = $_POST['complaintId'];
    $newStatus = (int)$_POST['newStatus'];

    if ($newStatus) {

        // Finish job update
        $query = "UPDATE complaints SET status = ?, fin_date = NOW() WHERE id = ?";
        $stmt = $db->prepare($query);
        if ($stmt) {
            $stmt->bind_param("ii", $newStatus, $complaintId);
            $stmt->execute();
            $stmt->close();
            // Return a success response
            echo json_encode(["message" => "Complaint status updated successfully"]);
        } else {
            // Database error
            http_response_code(500);
            echo json_encode(["error" => "Database error"]);
        }


        // updating the status inside worker  table
        $query2 = "UPDATE workers SET status = 0, currentWorkId = 0 WHERE currentWorkId = $complaintId";
        $result2 = mysqli_query($db, $query2);

        if ($result2) {
            // Update successful
            echo "Workers updated successfully.";
        } else {
            // Error updating workers
            echo "Error updating workers: " . mysqli_error($db);
        }
    } else {
        // Invalid data
        http_response_code(400); // Bad Request status code
        echo json_encode(["error" => "Invalid data"]);
    }
}

// update worker status and complaint status
elseif (isset($_POST['selectedWorkerIDs']) && is_array($_POST['selectedWorkerIDs']) && !empty($_POST['selectedWorkerIDs'])) {
    // Sanitize and validate the received data
    $selectedWorkerIDs = array_map('intval', $_POST['selectedWorkerIDs']);
    $complaintId = (int)$_POST['complaintId'];

    // Update status in the worker table only if there are selected workers
    if (!empty($selectedWorkerIDs)) {
        // Convert worker IDs to a comma-separated string
        $workerIDsString = implode(",", $selectedWorkerIDs);

        // Update status in the worker table
        $updateWorkerQuery = "UPDATE workers SET status = 1, currentWorkId = $complaintId WHERE id IN ($workerIDsString)";
        $updateWorkerResult = mysqli_query($db, $updateWorkerQuery);

        if ($updateWorkerResult) {
            // Update status in the complaint table
            $updateComplaintQuery = "UPDATE complaints SET status = status + 2, workers = '$workerIDsString' WHERE id = $complaintId";
            $updateComplaintResult = mysqli_query($db, $updateComplaintQuery);

            if ($updateComplaintResult) {
                // Success
                $response = [
                    'status' => 200,
                    'message' => 'Data updated successfully',
                ];
                echo json_encode($response);
            } else {
                // Error updating complaint table
                $response = [
                    'status' => 500,
                    'message' => 'Error updating complaint table',
                ];
                echo json_encode($response);
            }
        } else {
            // Error updating worker table
            $response = [
                'status' => 500,
                'message' => 'Error updating worker table',
            ];
            echo json_encode($response);
        }
    } else {
        // No workers selected
        $response = [
            'status' => 400,
            'message' => 'No workers selected',
        ];
        echo json_encode($response);
    }
} else {
    // Invalid data received
    $response = [
        'status' => 400,
        'message' => 'Invalid data received',
    ];
    echo json_encode($response);
}
