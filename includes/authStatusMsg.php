<?php 
     require_once('./utility/message.php');

     $msg = Messages::getAuthMessage($_GET['authMsg']);
?>

<h3><?php echo $msg ?></h3>    
 