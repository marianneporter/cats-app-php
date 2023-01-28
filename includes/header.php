<?php 
    session_start();     
   
    $url=$_SERVER['PHP_SELF'];

    // redirect to login page if user is not logged in
    if (!strpos($url, 'login') && !strpos($url, 'register') && !strPos($url, 'error')) {
        if (!isset($_SESSION['firstName'])) {    
            header("Location: login.php");
        }             
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <?php 
         require_once('addStyleSheets.php');
    ?>
    <link rel ="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel ="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">

    <title>Cats App PHP</title>
</head>

<body >
    <div class="content" style="display: relative">

    <div class="message-area" style="display: relative">
        <?php 
            if ( isset($_GET['msg'])) {       
                require_once('includes/statusMessage.php');
            }
        ?>
    </div> 
        
    <?php require_once('includes/nav.php'); ?>      
    <div class="container-sm">   
