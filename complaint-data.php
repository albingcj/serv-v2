<?php
include 'config.php';
include_once 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $complaintID = generateComplaintID();
    $issuedDate = date("Y-m-d");
    $complaintType = $_POST["complaint_type1"];
    $blockName = $_POST["block1"];
    $roomNumber = $_POST["place1"];
    $complaintDescription = $_POST["description1"];
    $facid = $s;
    $status = 0;
    // assign values for Hod's

    $department = $_POST["department1"];
    $hodId = "";

    $latestComplaintId = getLatestComplaintIdForDepartment($department, $db);

    $nextComplaintId = str_pad($latestComplaintId + 1, 6, '0', STR_PAD_LEFT);
    $cid = $department . $nextComplaintId;







    if ($department == "ME") {
        // $hodId = "ME01";
        $hodId = "ME01";
    }
    if ($department == "EEE") {
        $hodId = "EEE01";
    }
    if ($department == "ECE") {
        $hodId = "ECE01";
    }
    if ($department == "CS") {
        $hodId = "CS01";
    }
    if ($department == "IT") {
        $hodId = "IT01";
    }
    if ($department == "CSBS") {
        $hodId = "CSBS01";
    }
    if ($department == "AIDS") {
        $hodId = "AIDS01";
    }
    if ($department == "AIML") {
        $hodId = "AIML01";
    }
    if ($department == "MCA") {
        $hodId = "MCA01";
    }

    if ($complaintType == "System Complaints") {
        $status = 1;
    } else if ($complaintType == "General Complaints") {
        $status = 2;
    }

    $sql = "INSERT INTO complaints (id ,cid, Date, complaint_type, block, place, description,fac_id, hod_id, status) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssssssss", $complaintID, $cid, $issuedDate, $complaintType, $blockName, $roomNumber, $complaintDescription, $facid, $hodId, $status);

    if ($stmt->execute()) {
        echo "Complaint data inserted successfully.";
        echo $department;
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];

    // Prepare and execute a SQL query to fetch the complaint details
    $query = "SELECT * FROM complaints WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $complaintID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data as an associative array
        $row = $result->fetch_assoc();

        // Close the database connection
        $stmt->close();
        $db->close();

        // Return the data as JSON
        echo json_encode($row);
    } else {
        // Complaint not found
        http_response_code(404);
        echo json_encode(['error' => 'Complaint not found']);
    }
}
function checkIfExistsInDatabase($cid, $conn)
{
    // Escape user input to prevent SQL injection
    $escapedCid = $conn->real_escape_string($cid);


    $query = "SELECT COUNT(*) AS count FROM complaints WHERE cid = '$escapedCid'";

    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }


    $row = $result->fetch_assoc();

    $count = $row['count'];
    return ($count > 0);
}


// generating id 
function getLatestComplaintIdForDepartment($department, $conn)
{
    $escapedDepartment = $conn->real_escape_string($department);

    $query = "SELECT MAX(CONVERT(SUBSTRING(cid, -6), SIGNED)) AS latest_id FROM complaints WHERE RIGHT(cid, 6) REGEXP '^[0-9]+$' AND LEFT(cid, LENGTH(cid) - 6) = '$escapedDepartment'";


    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $latestId = $row['latest_id'];
    return $latestId;
}
