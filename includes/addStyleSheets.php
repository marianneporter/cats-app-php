    <?php 
         $route = basename($_SERVER['PHP_SELF'], ".php");
    ?>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css'>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/common.css">

    <?php
         if ($route === "catslist") { ?> 
            <link rel="stylesheet" href="css/catslist.css">
    <?php } ?>   

    <?php
         if ($route === "add-update") { ?>    
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <link rel="stylesheet" href="css/addUpdate.css">        
    <?php } ?>   
   

    <?php
         if ($route === "delete") { ?> 
            <link rel="stylesheet" href="css/delete.css">
    <?php } ?>    

    <?php
         if ($route === "register") { ?> 
            <link rel="stylesheet" href="css/register.css">
    <?php } ?>  

