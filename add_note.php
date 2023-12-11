<?php
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';
$id = 1;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$statement = $conn->query("SELECT updated_at FROM contacts FOR UPDATE;
UPDATE contacts SET updated_at=CURRENT_TIMESTAMP WHERE id=1 SELECT CURRENT_TIMESTAMP");
$updatedDate = $statement->fetchAll(PDO::FETCH_ASSOC);

?><?php foreach ($updatedDate as $row): ?><?php endforeach;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['notes']) == false)  {
    echo date('F j, Y.', strtotime($row['updated_at']));
    echo $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_SPECIAL_CHARS);
    echo date('.F j, Y', strtotime($row['updated_at']));
    echo " at ";
    echo date('ga.', strtotime($row['updated_at']));
    include 'process-user.php';
}

$sql = "INSERT INTO notes (contact_id, comment, created_at) 
VALUES ('$id', '$notes', CURRENT_TIME)";?>