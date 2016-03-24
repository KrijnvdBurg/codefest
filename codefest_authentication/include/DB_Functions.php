<?php

class DB_Functions{
    private $conn;
   
    function __construct(){
        require_once 'DB_Connect.php';
        $db         = new Db_Connect();
        $this->conn = $db->connect();
    }
    
    
    function __destruct(){}

    
    public function storeUser($username, $password, $role_id, $firstname, $lastname, $department_id, $ptf_id){
        
        $uuid = uniqid('', true);
        $encrypted_password = md5($password);
        $stmt = $this->conn->prepare("INSERT INTO users(username, password, role_id, firstname, lastname, department_id, ptf_id ) VALUES(?, ?, ?, ?, ?, ?, ?");
        $result = $stmt->execute([$username, $password, $role_id, $firstname, $lastname, $department_id, $ptf_id]);

        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return null;
        }
    }
    
    public function getUserByEmailAndPassword($username, $password){
        $stmt           = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $crypt_password = md5($password);
        if ($stmt->execute([$username, $crypt_password])) {
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return NULL;
        }
    }
    
    public function isUserExisted($username){
        $stmt = $this->conn->prepare("SELECT username from users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }


    public function savePeriodOffInput($userid, $status_id, $permission, $start_date, $end_date){  
        $stmt = $this->conn->prepare("INSERT INTO absence(user_id, status_id, permission, start_date, end_date) VALUES(?, ?, ?, ?, ?)");
        $result = $stmt->execute([$userid, $status_id, $permission, $start_date, $end_date]);
    }

    public function getKeyPermissions()
    {
        $stmt           = $this->conn->prepare("SELECT * FROM status WHERE 1");
        if ($stmt->execute()) {
           $result = $stmt -> fetchAll();
            $status = array();



            foreach( $result as $row ) {
    $status[] = $row;
}
            return $status;
        } else {
            return NULL;
        }
    }
    
    public function hashSSHA($password){
        $salt      = sha1(rand());
        $salt      = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash      = array(
            "salt" => $salt,
            "encrypted" => $encrypted
        );
        return $hash;
    }
    
    public function checkhashSSHA($salt, $password){
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
        return $hash;
    }
}
?>