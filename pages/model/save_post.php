<?php
header('Content-Type: application/json');
include '../php_utility/connection.php';

$emailID = "r@g.c";

$response = array();

// Retriveing the Json 
$json = file_get_contents('php://input');
// converting to associative arrry 
$data = json_decode($json, true);


if ($data != null) {

    $content = $data['content'];

    $sql = "INSERT INTO `posts` (`email`, `content`, `likeCount`) VALUES (?,?,0)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $emailID, $content);

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