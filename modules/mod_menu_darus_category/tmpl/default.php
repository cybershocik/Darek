<?php // no direct access
defined('_JEXEC') or die('Restricted access');
//JHTML::stylesheet ( 'menucss.css', 'modules/mod_virtuemart_category/css/', false );

/* ID for jQuery dropdown */
$ID = str_replace('.', '_', substr(microtime(true), -8, 8));
$js="
//<![CDATA[
jQuery(document).ready(function() {
		jQuery('#Menu_C".$ID." li.VmClose ul').hide();
		jQuery('#Menu_C".$ID." li .VmArrowdown').click(
		function() {

			if (jQuery(this).parent().next('ul').is(':hidden')) {
				jQuery('#Menu_C".$ID." ul:visible').delay(500).slideUp(500,'linear').parents('li').addClass('VmClose').removeClass('VmOpen');
				jQuery(this).parent().next('ul').slideDown(500,'linear');
				jQuery(this).parents('li').addClass('VmOpen').removeClass('VmClose');
			}
		});
	});
//]]>
" ;

		$document = JFactory::getDocument();

		$document->addScriptDeclaration($js);?>

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

<div id="Menu_C">
<ul class="Menu_C" id="<?php echo "Menu_C".$ID ?>">
<?php foreach ($categories as $category) {
	    $active_menu = 'class="VmClose"';
		$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
		$cattext = $category->category_name;
		if (in_array( $category->virtuemart_category_id, $parentCategories)) $active_menu = 'class="VmOpen"';
		?>

<li <?php echo $active_menu ?> >
	<div>
		<img src="/modules/mod_menu_darus_category/css/arrow.png"/>
		<?php echo JHTML::link($caturl, $cattext);
		if ($category->childs) {
			?>
			<!--<span class="VmArrowdown"> </span>-->
			<?php
		}
		?>
	</div>

<?php if ($category->childs) { ?>
<ul class="menu" >
<?php
		foreach ($category->childs as $child) {

		$active_child_menu = 'class="VmClose"';
		$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$child->virtuemart_category_id);
		$cattext = vmText::_($child->category_name);
		if ($child->virtuemart_category_id == $active_category_id) $active_child_menu = 'class="VmOpen"';
		?>

			<li style="list-style-type: square;margin-left:25px;line-height: 30px;">
				<div id="active"><?php echo JHTML::link($caturl, $cattext); ?></div>
			</li>
<?php		} ?>
</ul>
	<div id="bottom_menu">

	</div>
<?php 	} else {?>
	<div id="bottom_menu">

	</div>
<?php } ?>
</li>
<?php
	} ?>
</ul>

</div>