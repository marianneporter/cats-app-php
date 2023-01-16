<?php 

require_once('./database/dbConnect.php');
$dbConnection = new DB_Connect(); 
$db = $dbConnection->CreateConnection();
if ($db == null) {   
    header("Location: error.php");
}

require_once('./database/dbQueries.php');
$dbQueries = new DB_Queries();

$cat->name= trim($cat->name);

if ($cat->id == 0) {  
    $insertSuccess = $dbQueries->insertCat($db, $cat);

    if ($insertSuccess) {
        header("Location: catslist.php?"."msg=addSuccess"."&name=".$cat->name);
    } else {
        header("Location: catslist.php?"."msg=addFailure"."&name=".$cat->name);
    }
} else {
   
    $updateSuccess = $dbQueries->updateCat($db, $cat);

    if ($updateSuccess) {
        header("Location: catslist.php?"."msg=updateSuccess"."&name=".$cat->name);
    } else {
        header("Location: catslist.php?"."msg=updateFailure"."&name=".$cat->name);
    }   
}
?>
