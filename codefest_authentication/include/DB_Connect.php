<?php
/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Connect {
    private $conn;

    // Connecting to database
    public function connect() {
        require_once '..\cgi_bin\connector.php';
        // Connecting to mysql database
		$this->conn = new PDO('mysql:host='. $host .'; dbname='. $database .';', $user , $password);
		//var_dump($this->conn);
        // return database handler
        return $this->conn;
    }
}

?>
