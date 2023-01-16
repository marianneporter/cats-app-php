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

            [ $host, $dbName, $username, $password ] = self::getDBCredentials();
			          
			// Set DSN
			$dsn='mysql:host='.$host.';dbname='.$dbName;

            echo $_SERVER['SERVER_NAME'];

            try {
                $this->pdo=new PDO($dsn, $username, $password);	
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

        private function getDBCredentials() {
            if ( $_SERVER['SERVER_NAME'] == 'localhost') {
                [ $host, $dbName, $username, $password ] = self::getLocalhostDets();   
            } else {
                [ $host, $dbName, $username, $password ] = self::getHerokuDets();              
            }

            return [ $host, $dbName, $username, $password];  			                  
        }

        private function getHerokuDets() {

            $dbUrl    = getenv('CLEARDB_DATABASE_URL');
            $host     = substr($dbUrl, 32, 27);
            $dbName   = substr($dbUrl, 60, 22);
            $username = substr($dbUrl, 8, 14);
            $password = substr($dbUrl, 23, 8);  
            
            return [ $host, $dbName, $username, $password];  
        }

        private function getLocalhostDets() {
            $host =   "localhost";
            $dbName = "cats_db";
            $username = "root";
            $password = "";

            return [ $host, $dbName, $username, $password];                        
        }

	}