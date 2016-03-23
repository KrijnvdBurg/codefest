<?php

class DB_Functions{
    private $conn;
   
    function __construct(){
        require_once 'DB_Connect.php';
        $db         = new Db_Connect();
        $this->conn = $db->connect();
    }
    
    
    function __destruct(){}

    
    public function storeUser($name, $email, $password){
        
        $uuid = uniqid('', true);
        $encrypted_password = md5($password);
        $stmt = $this->conn->prepare("INSERT INTO users(unique_id, name, email, encrypted_password, created_at) VALUES(?, ?, ?, ?, NOW())");
        //$stmt->bindParam(":uuid, :name, :email, :encrypted_password", $uuid, $name, $email, $encrypted_password);
        $result = $stmt->execute([$uuid, $name, $email, $encrypted_password]);

        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            //$stmt->bindParam(":email", $email);
            $stmt->execute([$email]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return null;
        }
    }
    
    public function getUserByEmailAndPassword($email, $password){
        $stmt           = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND encrypted_password = ?");
        $crypt_password = md5($password);
        if ($stmt->execute([$email, $crypt_password])) {
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return NULL;
        }
    }
    
    public function isUserExisted($email){
        $stmt = $this->conn->prepare("SELECT email from users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
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