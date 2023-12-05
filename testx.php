<?php
include "config.php";

if (isset($_POST['view'])) {
    $id = $_POST["id"];
    $query = "SELECT * FROM complaints WHERE id = '$id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $res = [
            'status' => 200,
            'type' => $row['complaint_type'],
            'block' => $row['block'],
            'place' => $row['place'],
            'desc' => $row['description'],
            'stat' => $row['status'],
            'rej' => $row['rej_comment'],
            'hod' => $row['hod_id'],
            'fac' => $row['fac_id'],
            'workers' => $row['workers'],
            'fdate' => $row['fin_date'],

        ];
        echo json_encode($res);
        return;
    }
} elseif (isset($_POST['action']) && $_POST['action'] === 'cancel') {
    $approvalValue = 100;
    $complaintID = $_POST["complaintId"];

    $query = "UPDATE `complaints` SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ii", $approvalValue, $complaintID);
    if (mysqli_stmt_execute($stmt)) {
        $res = [
            'status' => 200,
            'message' => 'canceled'
        ];

        echo json_encode($res);
        return;
    } else {
        http_response_code(500);
        echo "Error canceling";
    }
    mysqli_stmt_close($stmt);
} elseif (isset($_POST['id'], $_POST['complaintType'], $_POST['blockName'], $_POST['roomNumber'], $_POST['complaintDescription'])) {
    // Handling the request to update complaint details
    $complaintID = $_POST['id'];
    $complaintType = $_POST['complaintType'];
    $statusChange = 0;
    if ($complaintType == "System Complaints") {
        $statusChange = 1;
    } else if ($complaintType == "General Complaints") {
        $statusChange = 2;
    }
    $blockName = $_POST['blockName'];
    $roomNumber = $_POST['roomNumber'];
    $complaintDescription = $_POST['complaintDescription'];

    $query = "UPDATE complaints SET 
        complaint_type = '$complaintType', 
        block = '$blockName', 
        place = '$roomNumber', 
        status = '$statusChange',
        description = '$complaintDescription' 
        WHERE id = '$complaintID'";

    if (mysqli_query($db, $query)) {
        // Successful update
        $response = [
            'status' => 200,
            'message' => 'Complaint details updated successfully',
        ];
        echo json_encode($response);
    } else {
        // Error while updating
        $response = [
            'status' => 500,
            'message' => 'Error updating complaint details',
        ];
        echo json_encode($response);
    }
} elseif (isset($_POST['rating']) && $_POST['feedC']) {
    // rating update
    $complaintID = $_POST['id'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedC'];


    // updating the workers rating
    //select workers id from the complaints table
    $query1 = "SELECT workers FROM complaints WHERE id = '$complaintID'";
    $workerIds = mysqli_query($db, $query1);
    //now this workerids is a string with seperated by commas. need to seperate them and update the workers table
    $workerIds = mysqli_fetch_assoc($workerIds);
    $workerIds = $workerIds['workers'];
    $workerIds = explode(",", $workerIds);
    //now we have an array of worker ids. we need to update the workers table
    foreach ($workerIds as $workerId) {
        //get current rating and total from workers table
        $query2 = "SELECT rating, total FROM workers WHERE id = '$workerId'";
        $workerData = mysqli_query($db, $query2);
        $workerData = mysqli_fetch_assoc($workerData);
        $currentRating = $workerData['rating'];
        $currentTotal = $workerData['total'];
        //calculate new rating and total
        $newTotal = $currentTotal + 1;
        $newRating = (($currentRating * $currentTotal) + $rating) / $newTotal;
        //update the workers table
        $query3 = "UPDATE `workers` SET rating = '$newRating', total = '$newTotal' WHERE id = '$workerId'";
        mysqli_query($db, $query3);
    }
    // end of updating the workers rating


    $query = "UPDATE `complaints` SET rating = ?, feedback = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "isi", $rating, $feedback, $complaintID);

    if (mysqli_stmt_execute($stmt)) {
        $res = [
            'status' => 200,
            'message' => 'Updated'
        ];

        echo json_encode($res);
        return;
    } else {
        http_response_code(500);
        echo "Error Updating";
    }
    mysqli_stmt_close($stmt);
} elseif (isset($_POST['workerId'])) {
    // getWorkerName.php
    $workerId = $_POST['workerId']; // Get the workerId from the AJAX request

    // Fetch worker name from the database
    $workerName = "No worker assigned"; // Default value
    $workerId = (int)$workerId; // Ensure it's an integer

    $workerNameQuery = "SELECT name FROM workers WHERE id = $workerId";
    $workerNameResult = mysqli_query($db, $workerNameQuery);

    if ($workerNameResult && mysqli_num_rows($workerNameResult) > 0) {
        $workerNameData = mysqli_fetch_assoc($workerNameResult);
        $workerName = $workerNameData['name'];
    }

    // Return the worker name to the JavaScript
    echo $workerName;
} else {
    // Invalid or unsupported request
    $response = [
        'status' => 400,
        'message' => 'Bad Request',
    ];
    echo json_encode($response);
}
