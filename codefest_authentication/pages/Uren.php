<?php $form_path='uren_files/formoid1/form.php'; 

require_once $form_path;  
//include "../classes/navbar.class.php"; 
include "../classes/hours.class.php";

?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Medewerker - Uren</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>
<body>
<?php 
/*$NavBar = new NavBar();
$NavBar->render();*/
$Hours = new Hours();
$Hours->render();
?>

{{Formoid}}

</body>
</html>
