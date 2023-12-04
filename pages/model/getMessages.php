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


    $sender = $data['sender'];
    $receiver = $data['receiver'];

    $query = "SELECT * FROM messages WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)";

    // Bind parameters and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $sender, $receiver, $receiver, $sender);



    try {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $messages = $result->fetch_all(MYSQLI_ASSOC);

            $response['status'] = 'success';
            $response['rows'] = 'exit';
            $response['messages'] = $messages;
        } else {
            $response['status'] = 'success';
            $response['rows'] = 'empty';
        }


    } catch (Exception $e) {
        $response['status'] = 'errors';
        $response['rows'] = 'empty';
        $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
    }
    $stmt->close();


} else {
    $response['status'] = 'error';
    $response['rows'] = 'empty';
    $response['message'] = 'Invalid User Info';
}

$conn->close();

// Send JSON response
echo json_encode($response);
?>