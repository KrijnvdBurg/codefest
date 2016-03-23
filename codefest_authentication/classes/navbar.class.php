<?php
class NavBar {
	private $navbar;

	private $conn;
    function __construct(){
        require_once '../include/DB_Connect.php';
        $db         = new Db_Connect();
        $this->conn = $db->connect();
    }

	function __construct() {
		//menuItems eerste value is path 2de value is item
		$menuItems = array();
		$stmt = $this->conn->query("SELECT `item`, `path` FROM `menu` WHERE `menu_id` = 1");
		foreach ($conn->query($stmnt) as $menuQuery) {
			$temparr = array($menuQuery['path'] => $menuQuery['item']);
		}
		$menuItems = array_merge($menuItems, $temparr);
		$this->navbar = $menuItems;
	}

	function render() {
		$menuClasses = array(
			'1' => 'menuMedewerker',
			'2' => 'menuMain',
			'3' => 'menuMain'
		);

		//ROLEID moet nog opgehaald worden
		$roleID = $_POST['roleID'];
		$menuclass = $menuClasses[$roleID];
		$result = '<div id="'.$menuclass.'" name="menu"><ul>';
		
		foreach($this->navbar as $menuItem){
			$result .= '<li><a href="'.$menuItem[0].'">'.$menuItem[1].'</a></li>';
		}
		$result .= '</ul></div>';
		return $result;
	}
}	
?>