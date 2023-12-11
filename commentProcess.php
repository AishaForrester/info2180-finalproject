<?php
$servername = "localhost";
$username = "finalproject";
$password = "password123";
$dbname = "dolphin_crm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($result->num_rows > 0) {
    $contact = $result->fetch_assoc();
} else {
    echo 'Contact not found';
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];

    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

    $currentDate = date('Y-m-d H:i:s');

    $sqlInsertComment = "INSERT INTO Notes (contact_id, comment, created_by, created_at) VALUES ('$contactId', '$comment', '$created_by', '$currentDate')";
    if ($conn->query($sqlInsertComment) === TRUE) {
        echo 'Comment added successfully.';

    } else {
        echo 'Error adding comment: ' . $conn->error;
    }
}
$conn->close();
?>