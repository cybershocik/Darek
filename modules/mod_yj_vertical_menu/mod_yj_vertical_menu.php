<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';


$getmodId			= $module->id;
$flyoutPosition		= $params->get('flyoutPosition');
$list				= modYJVerticalMenuHelper::getList($params,$getmodId,$flyoutPosition);
$app				= JFactory::getApplication();
$menu				= $app->getMenu();
$active				= $menu->getActive();
$active_id 			= isset($active) ? $active->id : $menu->getDefault()->id;
$path				= isset($active) ? $active->tree : array();
$showAll			= $params->get('showAllChildren');
$class_sfx			= htmlspecialchars($params->get('class_sfx'));

if(count($list)) {
	require JModuleHelper::getLayoutPath('mod_yj_vertical_menu', $params->get('layout', 'default'));
}
