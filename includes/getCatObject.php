<?php  
    require_once 'utility/dates.php';

    function getCatObject($id) {
        require_once('./database/dbConnect.php');
        $dbConnection = new DB_Connect(); 
        $db = $dbConnection->CreateConnection();
        if ($db == null) {    
            header("Location: error.php");
        }
        else {
            require_once('./database/dbQueries.php');
            $dbQueries = new DB_Queries();
            $catData = $dbQueries->getCatById($db, $id);
            $cat = new stdClass();
            $cat->id = $id;
            $cat->name=$catData->name;
            $cat->dob=$catData->dob;
            $cat->colour=$catData->colour;
            $cat->favFood=$catData->fav_food;

            return (object) $cat;
        }               
    }

?>