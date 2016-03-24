<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

$stmt = $this->conn->query("SELECT `projectnaam` FROM `projects`");
$resultStmt = $stmt->fetchAll();

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Uren</h2></div>
	<div class="element-name<?php frmd_add_class("name"); ?>"><label class="title"></label><span class="nameFirst"><input placeholder=" Voornaam" type="text" size="8" name="name[first]" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder=" Achternaam" type="text" size="14" name="name[last]" /><span class="icon-place"></span></span></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title"></label><div class="item-cont"><div class="large"><span>
<select name="select" >
		<?php
		/*foreach ($resultStmt as $row) {
			$result .= '<li><a href="'.$row['path'].'">'.$row['item'].'</a></li>';
			echo '<option value="'. $row .'">'. $row .'</option>';
		}*/?>	
</select>

<span class="icon-place"></span></span></div></div></div>
	<div class="element-date<?php frmd_add_class("date"); ?>"><label class="title"></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="date" placeholder="Date"/><span class="icon-place"></span></div></div>
	<div class="element-number<?php frmd_add_class("number1"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" min="0" max="100" name="number1" placeholder="Aantal overuren" value=""/><span class="icon-place"></span></div></div>
	<div class="element-number<?php frmd_add_class("number"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" min="0" max="100" name="number" placeholder="Aantal uren" value=""/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Doorsturen"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-blue.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>