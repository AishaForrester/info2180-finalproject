<?php
$host = 'localhost';
$dbname = 'dolphin_crm';
$user = 'finalproject';
$pass = 'password123';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Date Created</th>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['firstname']; ?></td>
            <td><?= $row['lastname']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
            <td><?= $row['created_at']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
