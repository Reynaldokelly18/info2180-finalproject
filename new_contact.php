<?php
session_start();

$host = "localhost";
$dbname = "dolphin_crm";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $assignedto = $_POST['assignedto'];
    $title = $_POST['title'];

    $fname = trim(filter_var($fname, FILTER_UNSAFE_RAW));
    $lname = trim(filter_var($lname, FILTER_UNSAFE_RAW));
    $email = trim(filter_var($email, FILTER_UNSAFE_RAW));
    $company = trim(filter_var($company, FILTER_UNSAFE_RAW));
    $phone = trim(filter_var($phone, FILTER_UNSAFE_RAW));
    $type = trim(filter_var($type, FILTER_UNSAFE_RAW));
    $assignedto = filter_var($assignedto, FILTER_UNSAFE_RAW);
    $title = filter_var($title, FILTER_UNSAFE_RAW);

    if (empty($fname) || empty($lname) || empty($email) || empty($company) || empty($phone) || $type === "None" || $assignedto === "None" || $title === "None") {
        echo 'Please fill in all the required fields.';
        return;
    }

    $sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to) VALUES (:title, :fname, :lname, :email, :phone, :company, :type, :assignedto)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':assignedto', $assignedto);

    if ($stmt->execute()) {
        echo 'Contact added to the database';
    } else {
        echo "Failed to write to the database";
    }
}

$pdo = null;
?>
