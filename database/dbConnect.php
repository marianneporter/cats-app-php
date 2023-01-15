<?php 
	/**
	*  DB connection class for cats app
	*
	*/		
	
	class DB_Connect { 	
      
        protected $pdo;		
	
	    /**
		*  Create PDO object and connect to DB and check if connection was successful.
		*  Handle error if necessary using try-catch block.
		*
		*/
		public function CreateConnection() { 

        //    $host = 'localhost';
        //    $dbName = 'cats_db';
        //    $username = 'root';
        //    $password ='';
        //    $charset = 'utf8mb4';

            $host = 'eu-cdbr-west-03.cleardb.net';
            $dbName = 'heroku_25a13e34a818616';
            $user = 'bf2ff53d063109';
            $pass ='8245d001';
            $charset = 'utf8mb4';
			          
			// Set DSN
			$dsn='mysql:host='.$host.';dbname='.$dbName;

            echo $_SERVER['SERVER_NAME'];

            try {
                $this->pdo=new PDO($dsn, $user, $pass);	
                $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                $this->pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
                return $this->pdo;       
            } 
            catch(Exception $e) {
                echo 'error!';
                echo $e;
                return null;
            }
		}
	}