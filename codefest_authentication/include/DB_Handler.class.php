<?php
require_once ('.\cgi_bin\connector.php');
    class DatabaseHandler
    {
        private $databaseHandle;

        public function __construct($host,$user,$password,$database)
        {
			try {
				//Open connection PDO
				$dsn='mysql:dbname='.$database.';host='.$host;
				$this->databaseHandle = new PDO($dsn, $user, $password);
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
        }

        // Execute query
        public function executeQuery($sql_query)
        {
			$result=$this->databaseHandle->query($sql_query);
			if (is_object($result) && $result->rowCount()>0) {
				return $result;
			} else {
				return false;
			}	
		}

        // Close connection
        public function __destruct()
        {
			try {
				$this->DatabaseHandle = null; //Closes connection
			} catch (PDOException $e) {
			}        
		}
    }
