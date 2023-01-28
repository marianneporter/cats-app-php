<?php 
    $route = basename($_SERVER['PHP_SELF'], ".php");   
?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
    if ( $route === "catslist" || $route === "login" || $route === "register" ) { ?>             
        <script src="./js/messages.js"></script>          
        <script src="./js/statusMessage.js"></script>
<?php } ?>

<?php
    if ($route === "add-update") { ?>    
        <!-- jquery for datepicker -->    
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>     
        <script src="./js/messages.js"></script>     
        <script src="./js/add-update.js"></script>
<?php } ?>