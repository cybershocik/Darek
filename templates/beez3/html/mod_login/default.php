<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
	<?php if ($params->get('greeting')) : ?>
		<div class="login-greeting">
		<?php if ($params->get('name') == 0) : ?>
			<?php echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('name'))); ?>
		<?php else : ?>
		 	<?php echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('username'))); ?>
		<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</form>
<?php else : ?>
<a class="loginButton" href="index.php/rejestracja">Zarejestruj się</a>
<a class="loginButton"href="index.php/logowanie">Zaloguj się</a>
<?php endif; ?>
