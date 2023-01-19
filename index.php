<?php 
    require_once('includes/header.php');
 ?>   
    <h1 class="mt-3">Welcome to the Cats App PHP version</h1>

    <?php       
        if (isset($_GET['authMsg'])) {
            echo ($_GET['authMsg']);
            require_once('includes/authStatusMsg.php');
        }
    ?>

 <?php      
 require_once('includes/footer.php'); 
 ?>    
