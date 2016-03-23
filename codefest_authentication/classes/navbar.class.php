<?php
class NavBar {
	private $navbar;
	//menuItems eerste value is path 2de value is item

	function __construct() {
		$menuItems = array(
			array ('', ''),
			array ('', ''),
			array ('', ''),
			array ('', '')
		);
		$this->navbar = $menuItems;
	}

	function render() {
		$menuClasses = array(
			'1' => 'menuMedewerker',
			'2' =>  'menuMain',
			'3' =>  'menuMain'
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