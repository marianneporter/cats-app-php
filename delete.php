<?php require_once 'includes/header.php';

    if (isset($_POST['delete'])) {
        $id=$_POST['id'];
        $name=$_POST['name'];
        
        require_once('database/dbConnect.php');
        $dbConnection = new DB_Connect(); 
        $db = $dbConnection->CreateConnection();
 
        if ($db == null) {    
            header("Location: error.php");
        }
        else {
            require_once('./database/dbQueries.php');

            $dbQueries = new DB_Queries();
 
            $deleteSuccess = $dbQueries->deleteCat($db, $id);
            
            if ($deleteSuccess) {
                header("Location: catslist.php?"."msg=deleteSuccess"."&name=".$name);
            } else {
                header("Location: catslist.php?"."msg=deleteFailure"."&name=".$name);
            }     
        }  
    }

    $id=$_GET['id'];

    require_once('includes/getCatObject.php');

    $cat = getCatObject($id);

?>

    <h3 class="pt-4 pb-3">Are you sure you want to delete <?php echo $cat->name ?>?</h3>
    <div class="cat-card">
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2">
            <span class="label fw-bold ">Name:</span>
            <span class="data-item"><?php echo $cat->name ?></span>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2">
            <span class="label fw-bold">Date of Birth:</span>
            <span class="data-item"><?php echo $cat->dob ?></span>
        </div>  
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2">
            <span class="label fw-bold">Colour:</span>
            <span class="data-item"><?php echo $cat->colour ?></span>
        </div>  
        <div class="d-flex flex-column flex-sm-row justify-content-between mt-2">
            <span class="label fw-bold">Favourite Food:</span>
            <span class="data-item"><?php echo $cat->favFood ?></span>
        </div>   

        
    </div>
    <div class="btn-area">
        <a class="btn btn-secondary" href="catslist.php">Cancel</a>
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cat->id ?>">
            <input type="hidden" name="name" value="<?php echo $cat->name ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
    </div>


<?php require_once('includes/footer.php') ?> 