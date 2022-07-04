<?php 
    require_once('database/dbConnect.php');
    $dbConnection = new DB_Connect(); 
    $db = $dbConnection->CreateConnection();
    if ($db == null) {    
        echo "connection failure";
        header("Location: error.php");
    }

    require_once('database/dbQueries.php');
    $dbQueries = new DB_Queries();
    $cats = $dbQueries->getCats($db);

    if ($cats==null) {
        header("Location: error.php");
    }  

    require_once('includes/header.php');

    if ( isset($_GET['msg'])) {       
        require_once('includes/statusMessage.php');
    }

    require_once('utility/dates.php');
   
?>  
 
    <h2 class="mt-5" >All Cats</h2>
        <div class="add-area">
            <a href="add-update.php" class="btn btn-primary add-btn">Add Cat</a>
        </div>
       
        <div>
            <div class="cats-list-row cats-list-col-headings">
                <div class="col-heading">Name</div>
                <div class="col-heading">Date of Birth</div>
                <div class="col-heading">Colour</div>
                <div class="col-heading">Favourite Food</div>
                <div class="button-col"></div> 
                <div class="button-col"></div>              
            </div>
    
            <?php     
                for($i=0; $i<count($cats); $i++) {   ?>

                    <div class="cats-list-row">
                        <div class="cat-detail"><?php echo $cats[$i]["name"] ?></div>  
                        <div class="cat-detail">
                            <?php echo DateFunctions::dbToDisplayFormat($cats[$i]["dob"]) ?>
                        </div>  
                        <div class="cat-detail"><?php echo $cats[$i]["colour"] ?></div> 
                        <div class="cat-detail"><?php echo $cats[$i]["fav_food"] ?></div>
                        <div class="button-col">
                            <a href="add-update.php?id=<?php echo $cats[$i]['id']?>" class="btn btn-primary">edit</a>
                        </div>
                        <div class="button-col"><a class="btn btn-danger" href="delete.php?id=<?php echo $cats[$i]['id']  ?>">delete</a></div>                        
                    </div>
 
            <?php } ?>
        </div>
        
    <?php require_once('includes/footer.php') ?> 