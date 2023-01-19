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

<div class="visible alert <?php echo $class ?>" role="alert" style="position: relative; z-index: 1">
    <?php echo $msg ?>
</div>

