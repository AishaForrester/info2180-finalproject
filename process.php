<?php

// Establish a database connection
$servername = "localhost";
$username = "finalproject";
$password = "password123";
$dbname = "dolphin_crm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $currentDate = date('Y-m-d H:i:s');

  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
  $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
  $assignedTo = filter_input(INPUT_POST, 'assignedTo', FILTER_SANITIZE_SPECIAL_CHARS);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES,'UTF-8');
  $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_SPECIAL_CHARS);

  // Validation
  if (empty($firstname)) {
    echo 'First name is empty<br/>';
  }

  if (empty($lastname)) {
    echo 'Last Name is empty<br/>';
  }

  // Check if telephone matches this format e.g. 876-999-9999
  if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $telephone)) {
    echo 'Telephone number is not valid!<br/>';
  }

  if (!$email) {
    echo 'Email is not valid!<br/>';
  }

  if (empty($company)) {
    echo 'Company is empty<br/>';
  }


  // SQL insert statement
  $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES ('$title', '$firstname', '$lastname', '$telephone', '$email', '$company', '$type', '$assignedTo','$firstname','$currentDate','$currentDate')";

  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>