<?php
header('Content-Type: application/json');
include '../php_utility/connection.php';

// Initialize response array
$response = array();

$msg = mysqli_real_escape_string($conn, $_POST['msg']);
$sender = mysqli_real_escape_string($conn, $_POST['sender']);
$receiver = mysqli_real_escape_string($conn, $_POST['receiver']);


if (isset($_POST['msg'], $_POST['sender'], $_POST['receiver'])) {


    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $sender = mysqli_real_escape_string($conn, $_POST['sender']);
    $receiver = mysqli_real_escape_string($conn, $_POST['receiver']);

    echo $msg . ' ' . $sender;

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
    $response['message'] = 'Missing required parameters';
}

$conn->close();

// Send JSON response
echo json_encode($response);
?>