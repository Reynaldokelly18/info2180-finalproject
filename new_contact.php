<?php 


$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$company = $_GET['company'];
$phone = $_GET['phone'];
$type = $_GET['type'];
$assignedto = $_GET['assignedto'];
$title = $_GET['title'];


$fname = trim(filter_var($fname, FILTER_UNSAFE_RAW));
$lname = trim(filter_var($lname, FILTER_UNSAFE_RAW));
$email = trim(filter_var($email, FILTER_UNSAFE_RAW));
$company = trim(filter_var($company, FILTER_UNSAFE_RAW));
$phone = trim(filter_var($phone, FILTER_UNSAFE_RAW));
$type = trim(filter_var($type, FILTER_UNSAFE_RAW));
$assignedto = filter_var($assignedto, FILTER_UNSAFE_RAW);
$title = filter_var($title, FILTER_UNSAFE_RAW);

if(empty($fname)){
    echo 'Please enter a value for First Name.';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
    return;
}else{
    $fname= mysqli_real_escape_string($conn, $fname);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for Last Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Last Name must be letters only.</span>';
    return;
}else{
    $lname= mysqli_real_escape_string($conn, $lname);
}

if(empty($email)){
    echo '<span style= "color: red;"> Please enter a value for email.</span>';
    return;
}else if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
    return;
}else{
    $email = mysqli_real_escape_string($conn, $email);
}

if(empty($company)){
    echo '<span style= "color: red;"> Please enter a value for Company.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Company must be letters only.</span>';
    return;
}else{
    $company= mysqli_real_escape_string($conn, $company);
}

if(empty($phone)){
    echo '<span style= "color: red;"> Please enter a value for Phone number.</span>';
    return;
}else if(!is_numeric($phone))
{
    echo '<span style= "color: red;">  Must be letters only.</span>';
    return;
}else{
    $phone= mysqli_real_escape_string($conn, $phone);
}

if($type === "None")
{
    echo '<span style= "color: red;"> Plese select a Type.</span>';
    return;
}else{
    $type= mysqli_real_escape_string($conn, $type);
}

if($assignedto === "None")
{
    echo '<span style= "color: red;"> Plese select an Assigned To.</span>';
    return;
}else{
    $assignedto= mysqli_real_escape_string($conn, $assignedto);
}

if($title === "None")
{
    echo '<span style= "color: red;"> Plese select a Title.</span>';
    return;
}else{
    $title= mysqli_real_escape_string($conn, $title);
}

$sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to) VALUES ('$title', '$fname', '$lname', '$email', '$phone', '$company', '$type', '$assignedto')";


if(mysqli_query($conn,$sql)){
    echo'Added to the database';
}else{
    echo"Didn't write to database";
}

mysqli_close($conn); 

?>