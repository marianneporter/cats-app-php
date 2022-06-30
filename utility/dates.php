<?php 
	/**
	*  Date manipulation class
	*
	*/		
	
	class DateFunctions { 
	
        /* converts YYYY-MM-DD date to 'd M Y' format for display on cats list */
		public static function dbToDisplayFormat($dbDate) { 
 
            if ($dbDate == "") {
                return "";
            }

            $parsedDate=date_parse($dbDate);
            return date('d M Y', mktime(0,0,0,$parsedDate['month'],
                                              $parsedDate['day'],
                                              $parsedDate['year']));  
		}
        
        /* converts alphanumeric date in format 4 may 2000 to YYYY-MM-DD for database */
		public static function displayToDBFormat($inputDate) { 
            $parsedDate=date_parse($inputDate);
            return date('Y-m-d', mktime(0,0,0,$parsedDate['month'],
                                              $parsedDate['day'],
                                              $parsedDate['year'])); 
		} 
	}