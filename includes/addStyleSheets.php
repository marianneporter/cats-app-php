    <?php 
         $route = basename($_SERVER['PHP_SELF'], ".php");
    ?>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css'>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="css/common.css">

    <?php
         if ($route === "catslist") { ?> 
            <link rel="stylesheet" href="css/catslist.css">
    <?php } ?>   

    <?php
         if ($route === "add-update") { ?>    
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css'>  
            <link rel="stylesheet" href="css/addUpdate.css">        
    <?php } ?>   
   

    <?php
         if ($route === "delete") { ?> 
            <link rel="stylesheet" href="css/delete.css">
    <?php } ?>    