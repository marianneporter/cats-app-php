<?php

class Messages { 

    public const MESSAGES = array (
        "addSuccess" => "has been successfully added",
        "addFailure" => "cannot be added at this time",
        "updateSuccess" => "has been successfully updated",
        "updateFailure" => "cannot be updated at this time",
        "deleteSuccess" => "has been successfully deleted",
        "deleteFailure" => "cannot be deleted at this time", 
        "regSuccess"    => "Congratulations! You have registered successfully",
        "regFailure"    => "Sorry! registration is not currently available"       
    );
   
    public static function getMessage($requiredMessage, $name="") { 
        
        return $name == "" ? self::MESSAGES[$requiredMessage]
                           : $name . " " . self::MESSAGES[$requiredMessage];
    }

    public static function getAuthMessage($msg) { 
        
        return  self::MESSAGES[$msg];
                           
    }



}

?>