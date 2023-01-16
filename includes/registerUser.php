<?php 

    require_once('./database/dbConnect.php');
    $dbConnection = new DB_Connect(); 
    $db = $dbConnection->CreateConnection();
    if ($db == null) {  
        header("Location: error.php");
    }

    require_once('./database/dbAuth.php');
    $dbAuth = new DB_Auth();

    $registerResult = $dbAuth->registerUser($db, $user);

    if ($registerResult=="success") {
        header("Location: index.php?authMsg=regSuccess");
    } else if ($registerResult=="emailError") {
        $errors['email'] = "Email is already registered";
    } else {
        header("Location: index.php?authMsg=regFailure");
    }

?>
