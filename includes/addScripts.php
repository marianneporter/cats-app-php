<?php 
    $route = basename($_SERVER['PHP_SELF'], ".php");   
?>

<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<?php
    if ($route === "add-update") { ?>    
         <!-- Vanilla Datepicker JS -->
        <script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>                  
        <script src="js/datePicker.js"></script>
<?php } ?>  




