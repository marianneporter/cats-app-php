<?php 
     require_once('./utility/message.php');
     $msg = $_GET['msg'];
     $msg = Messages::getMessage($_GET['msg'], $_GET['name']);
     if (strpos($msg, "success")) {
         $class="alert-success";
     } else {
         $class="alert-danger";
     }
?>

<div class="alert <?php echo $class ?>" role="alert">
    <?php echo $msg ?>
</div>