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
		$stmt = $this->conn->query("SELECT `item`, `path` FROM `menu` WHERE `menu_id` = 1");
		$resultStmt = $stmt->fetchAll();
		$menuItems = array();

		//ROLEID moet nog opgehaald worden
		$menuClasses = array(
			'1' => 'menuMedewerker',
			'2' => 'menuMain',
			'3' => 'menuMain'
		);
		$roleID = 1;
		$menuclass = $menuClasses[$roleID];

		$result = '<div id="'.$menuclass.'" name="menu"><ul>';
		foreach ($resultStmt as $row) {
			$result .= '<li><a href="'.$row['path'].'">'.$row['item'].'</a></li>';
		}

		$result .= '</ul></div>';
		var_dump($menuItems);
		echo $result;
		return $result;
	}
}	
?>