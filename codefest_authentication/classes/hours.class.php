<?php

require_once '../include/DB_Connect.php';

class Hours extends DB_Connect {

	function __construct() {
		$this->conn = $this->connect();
	}
	
	function render() {
		$test = "test";
		$stmt = $this->conn->query("SELECT `item`, `path` FROM `menu` WHERE `menu_id` = 1");
		$resultStmt = $stmt->fetchAll();
		$menuItems = array();
		$result = "hourclassresult";

		echo $result;
		return $result;
	}
}	
?>