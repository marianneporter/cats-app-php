<?php

class DB_Queries {

    public function getCats($db) {
      
        $stmt  = $db->prepare("SELECT * FROM `cats`");        
        
        try {
            $res = $stmt->execute();         
            $result = $stmt->fetchAll(); 
            return $result;
        }
        catch(Exception $e) {
            return null;
        }           
    }  

    public function getCatById($db, $id) {   

        try {
            $sql = "SELECT * FROM `cats` "; 
            $sql .= " WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':id', $id);        
            $res = $stmt->execute();         
            $cat = $stmt->fetchObject();  
            return $cat;        
        }
        catch(Exception $e) {
            return null;
        }           
    }  

    public function insertCat($db, $cat) {
        
        try {
            $sql = "INSERT INTO cats (name,  dob, colour, fav_food)
                         VALUES (:name, :dob,  :colour, :favFood )";
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':name', $cat->name);
            $stmt->bindparam(':dob', $cat->dob);
            $stmt->bindparam(':colour', $cat->colour);
            $stmt->bindparam(':favFood', $cat->favFood);
 
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;            
        }                   
    }

    public function updateCat($db, $cat) {
         try {
            $sql  = "UPDATE cats ";
            $sql .= " SET name   = :name,";
            $sql .= " dob = :dob,";
            $sql .= " colour = :colour,";
            $sql .= " fav_food = :favFood";
            $sql .= " WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':id', $cat->id);
            $stmt->bindparam(':name', $cat->name);
            $stmt->bindparam(':dob', $cat->dob);
            $stmt->bindparam(':colour', $cat->colour);
            $stmt->bindparam(':favFood', $cat->favFood); 
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;            
        }                   
    }

    public function deleteCat($db, $id) {
        try {
            $sql  = "DELETE FROM `cats` ";
            $sql .= " WHERE id = :id";
            echo $sql;
            echo $id;
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':id', $id); 
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;            
        }           
    }    
}
?>

