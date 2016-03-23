<?php
class NavBar {
	private $navbar;
	private $conn;

	function __construct() {
		require_once '../include/DB_Connect.php';
        $db         = new Db_Connect();
        $this->conn = $db->connect();
	}

	function render() {
		//MENUID moet nog dynamisch opgehaald worden
		$stmt = $this->conn->query("SELECT `item`, `path` FROM `menu` WHERE `menu_id` = 1");
		$resultStmt = $stmt->fetchAll();
		$menuItems = array();

		//ROLEID moet nog dynamisch opgehaald worden
		$menuClasses = array(
			'1' => 'menuMedewerker',
			'2' => 'menuMain',
			'3' => 'menuMain'
		);
		$roleID = 1;
		/*$t_roleID = $this->conn->query("SELECT `role_id` FROM `users` WHERE `username` = ''.$username.''");
		$roleID= $t_roleID->fetch();*/
		$menuclass = $menuClasses[$roleID];

		$result = '<div id="'.$menuclass.'" name="menu"><ul>';
		foreach ($resultStmt as $row) {
			$result .= '<li><a href="'.$row['path'].'">'.$row['item'].'</a></li>';
		}

		$result .= '</ul></div>';
		echo $result;
		return $result;
	}
}	
?>