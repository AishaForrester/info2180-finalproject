<?php
// Connect to the database
$servername = "localhost";
$username = "finalproject";
$password = "password123";
$dbname = "dolphin_crm";

try {
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the table
$sql = "SELECT * FROM Contacts";
$result = $conn->query($sql);

// Display the data in an HTML table
echo "<table border='1'>
         <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Created</th>
         </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
             <td>{$row['firstname']}</td>
             <td>{$row['email']}</td>
             <td>{$row['role']}</td>
             <td>{$row['created_at']}</td>
         </tr>";
}

echo "</table>";

// Close the database connection
$conn->close();

} catch (Exception $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>