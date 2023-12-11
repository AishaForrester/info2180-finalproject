<?php
$servername = "localhost";
$username = "finalproject";
$password = "password123";
$dbname = "dolphin_crm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$contactId = $_GET['id'];

$sql = "SELECT * FROM Contacts WHERE id = $contactId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $contact = $result->fetch_assoc();
} else {
    echo 'Contact not found';
    exit;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>

    <link rel="stylesheet" href="viewContact.css">
</head>
<body>
    <header>
        <h1>Dolphin CRM</h1>
    </header>

    <div class="sidebar">
        <nav>
        <ul>
            <li><a href="homePage.html">Home</a></li>
            <li><a href="newContact.php">New Contact</a></li>
            <li><a href="newUserPage.php">Users</a></li>
            <li><a href="Logout.php">Logout</a></li>
        </ul>
        </nav>
    </div>

    <div class="container">

     
        <img src="#" alt="profile image">
        <h1> <?php echo $contact['firstname'] . ' ' . $contact['lastname'];?> </h1>
        <p>Created on <?php echo $contact['created_at']; ?> by <?php echo $contact['created_by'];?> </p>
        <p>Updated on <?php echo $contact['updated_at']; ?> </p>

        <button class="assign">Assign to me</button>
        <button class="switch">Switch to Sales Lead</button>

      
      <div class="box1">
        <h3>Email</h3>
        <p><?php echo $contact['email']; ?></p>

        <h3>Company</h3>
        <p><?php echo $contact['company']; ?></p>

        <h3>Telephone</h3>
        <p><?php echo $contact['telephone']; ?></p>

        <h3>Assigned To</h3>
        <p><?php echo $contact['assigned_to']; ?></p>
      </div>
      
      <div class="box2"><h2>Notes</h2></div>

      <div class="box3">
         <?php
          // Fetch and display comments 
          $sqlSelectComments = "SELECT * FROM Notes WHERE contact_id = '$contactId'";
          $resultComments = $conn->query($sqlSelectComments);
  
          if ($resultComments->num_rows > 0) {
              while ($row = $resultComments->fetch_assoc()) {
                echo '<h4>' . $row['created_by'] . '</h4>';
                echo '<p>' . $row['comment'] . '</p>';
                echo '<p>' . $row['created_at'] . '</p>';
              }
          } else {
              echo '<p>No comments yet</p>';
          }
         ?>
      </div>

      <div class="box4">
          <form action="commentProcess.php" method="post">
            <label for="comment">Add a note</label>
            <textarea name="comment" id="comment" rows="4" cols="50" placeholder="Enter details here"></textarea>
            <br>
            <button class="addNote" type="submit">Add Note</button>
          </form>
      </div>
    </div>

</body>
</html>