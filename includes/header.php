<?php 
    session_start();     
   
    $url=$_SERVER['PHP_SELF'];

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

<body>
    
<?php require_once('includes/nav.php'); ?>      
<div class="container-sm">   