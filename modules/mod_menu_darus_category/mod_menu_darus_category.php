<?php
defined('_JEXEC') or  die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );

defined('DS') or define('DS', DIRECTORY_SEPARATOR);
//if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');

//VmConfig::loadConfig();
//VmConfig::loadJLang('mod_menu_category', false);
vmJsApi::jQuery();
//vmJsApi::cssSite();

/* Setting */
$categoryModel = VmModel::getModel('Category');
$category_id = $params->get('Parent_Category_id', 0);
/*$moduleclass_sfx = $params->get('moduleclass_sfx','');*/
$layout = $params->get('layout','default');
/*print "$layout";*/
$active_category_id = vRequest::getInt('virtuemart_category_id', '0');
$vendorId = '1';

$categories = $categoryModel->getChildCategoryList($vendorId, $category_id);

$module_name   = basename(dirname(__FILE__));

// We dont use image here
//$categoryModel->addImages($categories);

if(empty($categories)) return false;

$level = $params->get('level','2');

if($level>1){
	foreach ($categories as $i => $category) {
		$categories[$i]->childs = $categoryModel->getChildCategoryList($vendorId, $category->virtuemart_category_id) ;
		// No image used here
		//$categoryModel->addImages($category->childs);
		//Yehyeh, very cheap done.
		if($level>2){
			foreach ($categories[$i]->childs as $j => $cat) {
				$categories[$i]->childs[$j]->childs = $categoryModel->getChildCategoryList( $vendorId, $cat->virtuemart_category_id );
			}
		}
	}
}
//vmdebug('my categories',$categories);
$document = JFactory::getDocument();

$document->addStyleSheet('modules/mod_menu_darus_category/css/style.css');

$parentCategories = $categoryModel->getCategoryRecurse($active_category_id,0);



/* Load tmpl default */
require(JModuleHelper::getLayoutPath($module_name,'mod_menu_darus_category',$layout));
?>