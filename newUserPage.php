<?php
include ('newUserPage.html');

$fname = filter_input(INPUT_POST, "Fname", FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, "Lname", FILTER_SANITIZE_STRING);
$eml = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING);
$role = $_POST['role'];
$hash = md5($password);

$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

if (preg_match($pattern, $password)) {
    echo "Password meets the requirements.";
} else {
    echo "Password does not meet the requirements.";
}

$host = 'localhost';
$dbname = 'dolphin_crm';
$user = 'finalproject';
$pass = 'password123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use prepared statement to prevent SQL injection
    $stmt = $pdo->prepare("INSERT INTO Users (firstname, lastname, password, email, role) VALUES (:fname, :lname, :hash, :eml, :role)");

    // Bind parameters
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':hash', $hash);
    $stmt->bindParam(':eml', $eml);
    $stmt->bindParam(':role', $role);

    // Execute the statement
    $stmt->execute();

    echo "User successfully added to the database.";

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
