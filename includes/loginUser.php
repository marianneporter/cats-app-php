<?php 

    require_once('./database/dbConnect.php');
    $dbConnection = new DB_Connect(); 
    $db = $dbConnection->CreateConnection();
    if ($db == null) {    
        echo "connection failure";
        header("Location: error.php");
    }

    require_once('./database/dbAuth.php');
    $dbAuth = new DB_Auth();

    $loginResult = $dbAuth->loginUser($db, $loginCreds);
    
    echo $loginResult;
    if ($loginResult == "loginSuccess") {
        header("Location: catslist.php");
    } elseif ($loginResult == "noEmailError") {
        $errors['email'] = "No account for this email";
    } elseif ($loginResult == "wrongPasswordError") {
        $errors['password'] = "Email and Password Combination do not match";
    } else {
        header("Location: error.php");
    }



    // $registerResult = $dbAuth->registerUser($db, $user);
    // echo $registerResult;

    // if ($registerResult=="success") {
    //     header("Location: index.php?authMsg=regSuccess");
    // } else if ($registerResult=="emailError") {
    //     $errors['email'] = "Email is already registered";
    // } else {
    //     header("Location: index.php?authMsg=regFailure");
    // }

?>
