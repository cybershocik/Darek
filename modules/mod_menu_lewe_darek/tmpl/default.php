<?php 
// No direct access
defined('_JEXEC') or die; ?>
<div id ="main_menu">
<?php
$nazwa_Menu = '';

	if ($params->get('nazwa_menu') != null)
	{
		$nazwa_Menu = $params->get('nazwa_menu') . '';
		echo "$nazwa_Menu";
	}


?>
</div>