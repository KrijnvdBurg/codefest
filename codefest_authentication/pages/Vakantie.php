<?php $form_path='vakantie_files/formoid1/form.php'; require_once $form_path; include('../classes/navbar.class.php');?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Medewerker - Vakantie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<?php 
$NavBar = new NavBar();
$NavBar->render();
?>
{{Formoid}}

</body>
</html>
