<?php
session_start();
require "dbconnect.php";

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo json_encode(['success' =>false, 'error'=> 'Invalid email format']);
        return;
    }

    $password_entered_hash = password_hash($password, PASSWORD_DEFAULT);

    try{
        $stmt = $pdo->prepare("SELECT id, email, password FROM Users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            $hashed_password = $result["password"];
            if(password_verify($password, $hashed_password)){
                $_SESSION['id'] = $result['id'];
                $_SESSION['email'] = $result['email'];
                echo json_encode(["success"=>true]);
            }else{
                echo json_encode(["success"=>false, "error"=> "Invalid password"]);
            }
        }else{
            echo json_encode(["success"=>false,"error"=> "User not found"]);
        }
    }catch(PDOException $e){
        echo json_encode(["success"=>false, "error"=>$e->getMessage()]);
    }
}else{
    http_response_code(405);
    echo "Method Not Allowed";
}

?>