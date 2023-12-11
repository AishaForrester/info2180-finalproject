<?php

$host = 'localhost';
$dbname = 'dolphin_crm';
$user = 'root';
$pass = '';


$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);


$sql = "SELECT* FROM users";

$stmt = $pdo->query($sql);


$stmt->execute();


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php ?>
<table>
	<tr>
		
		<th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Role </th>
		<th>Date Created</th>
    
	</tr>
<?php foreach ($results as $row): ?>
	<tr>
      
  		<td><?= $row['First Name'];?></td>
  		<td><?= $row['Last Name'];?></td>
      <td><?= $row['Email'];?></td>
      <td><?= $row['Role'];?></td>
      <td><?= $row['Date Created'];?></td>
      
  	</tr>
<?php endforeach; ?>
</table>
<?php ?>