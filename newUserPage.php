<?php
include 'newUserPage.html';

$fname=filter_input(INPUT_POST,"Fname",FILTER_SANITIZE_STRING);
$lname=filter_input(INPUT_POST,"Lname",FILTER_SANITIZE_STRING);
$eml=filter_input(INPUT_POST,"Email",FILTER_SANITIZE_EMAIL);
$pasword=filter_input(INPUT_POST,"Password",FILTER_SANITIZE_STRING);
$role=$_POST['role'];
$hash=md5($pasword);

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

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $hash);


$sql = "INSERT INTO Users(firstname,lastname,email,role,password) Values($fname,$lname,$eml,$role,$hash);";

$stmt = $pdo->query($sql);


$stmt->execute();


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>