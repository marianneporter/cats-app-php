<?php 
	/**
	*  Date manipulation class
	*
	*/		
	
	class DateFunctions { 
	
        /* converts YYYY-MM-DD date to 'd M Y' format for display on page */
		public static function YYYYMMDDtoDisplayFormat($YYYYMMDDdate) { 
            $year = substr($YYYYMMDDdate, 0, 4);
            $month = substr($YYYYMMDDdate, 5, 2);
            $day = substr($YYYYMMDDdate, 8,2); 
            $displayDate = date('d M Y', mktime(0,0,0,$month,$day,$year));         
            return $displayDate;
		}
        /* converts dd/mm/yyyy inputformat to YYYY-MM-DD for database */
		public static function inputToDBFormat($inputDate) { 
            $year = substr($inputDate, 6, 4);
            $month = substr($inputDate, 3, 2);
            $day = substr($inputDate, 0, 2); 
            $dbDate = $year . '-' . $month . '-' . $day;        
            return $dbDate;
		}

        /* converts YYYY-MM-DD database date to DD/MM/YYYY for from select  */
		public static function DBToInputFormat($inputDate) { 
            $year = substr($inputDate, 0, 4);
            $month = substr($inputDate, 5, 2);
            $day = substr($inputDate, 8, 2); 
            $selectDate = $day . '-' . $month . '-' . $year;        
            return $selectDate;
		}
 
	}