    <?php 
         $route = basename($_SERVER['PHP_SELF'], ".php");
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/common.css">   

    <?php
         if ($route === "catslist") { ?> 
            <link rel="stylesheet" href="css/catslist.css">
    <?php } ?>   

    <?php
         if ($route === "index") { ?> 
            <link rel="stylesheet" href="css/home.css">
    <?php } ?>   

    <?php
         if ($route === "about") { ?> 
            <link rel="stylesheet" href="css/about.css">
    <?php } ?>  


    <?php
         if ($route === "add-update") { ?>    
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="css/addUpdate.css">        
    <?php } ?>   
   

    <?php
         if ($route === "delete") { ?> 
            <link rel="stylesheet" href="css/delete.css">
    <?php } ?>    

    <?php
         if ($route === "register" || $route === "login") { ?> 
            <link rel="stylesheet" href="css/register.css">
    <?php } ?>  

