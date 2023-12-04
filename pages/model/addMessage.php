<?php
header('Content-Type: application/json');
include '../php_utility/connection.php';

// Initialize response array
$response = array();

// Retriveing the Json 
$json = file_get_contents('php://input');
// converting to associative arrry 
$data = json_decode($json, true);


if ($data != null) {


    $msg = $data['msg'];
    $sender = $data['sender'];
    $receiver = $data['receiver'];

    // Create the SQL query using prepared statements
    $sql = "INSERT INTO `messages` (`sender`, `receiver`, `msg`) VALUES (?,?,?)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $sender, $receiver, $msg);

    try {
        $stmt->execute();
        $response['status'] = 'success';
        $response['message'] = 'New record created successfully';

    } catch (Exception $e) {
        $response['status'] = 'errors';
        $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
    }
    $stmt->close();


} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid JSON';
}

$conn->close();

// Send JSON response
echo json_encode($response);
?>