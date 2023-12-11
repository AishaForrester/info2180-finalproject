<?php

session_start(); // Starting the PHP session

$host = 'localhost';
$username = 'finalproject';
$password = 'password123'; 
$dbname = 'dolphin_crm';
$pdodsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $conn = new PDO($pdodsn, $username, $password);

    if (isset($_POST['submit'])) {
        $adminl_pw = filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS); //security purposes
        $adminl_email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL); //validate email
        
        $hashed_up = password_hash($adminl_pw, PASSWORD_DEFAULT); //hashed password

        $adminl_pw2 = 'password123'; //admin's credential
        $adminl_email2 = 'admin@project2.com';

        
        

        if (password_verify($adminl_pw2,$hashed_up) && $adminl_email2 == $adminl_email) {
            // Setting the user data in the session
            $_SESSION['user_email'] = $adminl_email;

            //inserting this user into our database
            $stmt = $conn->prepare('INSERT INTO USERS VALUES(NULL,"","",:password,:email,"","2023-12-06 10:30:00")'); 

            $stmt->bindParam(':password', $hashed_up);
            $stmt->bindParam(':email', $adminl_email);
            $stmt->execute();

           
            // Redirecting to home if user could be found in database 
            header('Location: index.html');  
            exit();
        } else {
            echo "Invalid login credentials";
        }
    }

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
