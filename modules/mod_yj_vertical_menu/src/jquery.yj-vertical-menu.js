/*!
 *	jquery.ui.potato.menu
 *
 *	Copyright (c) 2009-2012 makoto_kw, http://www.makotokw.com
 *	Licensed under the MIT license.
 *	http://makotokw.github.io/jquery/ui_potato_menu/
 *
 *	@author makoto_kw
 *	@version 1.2
 *  Extended by Youjoomla.com
 */
(function($) {
	var defaults = {
		vertical:false,
		menuItemSelector: 'li',
		menuGroupSelector: 'ul',
		rootClass:'yj-vertical-menu',
		menuItemClass:'yj-vertical-menu-item',
		menuGroupClass:'yj-vertical-menu-group',
		verticalClass:'yj-vertical-menu-vertical',
		horizontalClass:'yj-vertical-menu-horizontal',
		hasVerticalClass:'yj-vertical-menu-has-vertical',
		hasHorizontalClass:'yj-vertical-menu-has-horizontal',
		hoverClass:'yj-vertical-menu-hover',
		showDuration: 350,
		hideDuration: 350,
		flyoutPosition: 'right'
	};
	function menu() {
		var option = (typeof(arguments[0])!='string') ? $.extend(defaults,arguments[0]) : $.extend(defaults,{});

		// Horizontal:
		// ul.yj-vertical-menu-group,yj-vertical-menu-horizontal
		//   > li.yj-vertical-menu-item,yj-vertical-menu-has-vertical
		//     > ul.yj-vertical-menu-group,yj-vertical-menu-vertical
		//       > li.yj-vertical-menu-item,yj-vertical-menu-has-horizontal
		//        > ....
		//
		// Vertical
		// ul.yj-vertical-menu-group,yj-vertical-menu-vertical
		//   > li.yj-vertical-menu-item,yj-vertical-menu-has-horizontal
		//     > ul.yj-vertical-menu-group,yj-vertical-menu-horizontal
		//       > li.yj-vertical-menu-item,yj-vertical-menu-has-vertical
		//        > ....
		var topMenuGroupClass = (option.vertical) ? option.verticalClass : option.horizontalClass,
			$menu = $(this).addClass(option.rootClass+' '+option.menuGroupClass+' '+topMenuGroupClass),
			$menuItems = $menu.find(option.menuItemSelector).addClass(option.menuItemClass),
			$menuGroups = $menu.find(option.menuGroupSelector).addClass(option.menuGroupClass);
			
		
		$menuItems.hover(
			function(e) {
				$(this).addClass(option.hoverClass);
			},
			function(e) {
				$(this).removeClass(option.hoverClass);
			}
		);
		$menuGroups.parent().each(function(index){
			var $parentMenuItem = $(this); // menu item that has menu group
			var displayDirection = ($parentMenuItem.parent().hasClass(option.horizontalClass)) ? 'bottom' : 'right';
			$parentMenuItem.addClass((displayDirection == 'bottom') ? option.hasVerticalClass : option.hasHorizontalClass);
			var $menuGroup = $parentMenuItem.find(option.menuGroupSelector+':first').addClass(option.verticalClass);
			var setPositon = option.flyoutPosition;
			$parentMenuItem.hover(
			
				function(e) {
					var offset = {left:'', top:''};
					if (displayDirection == 'bottom') {
					
					if(setPositon == 'right'){
						
						offset.right = 0;
					}else{
						offset.left = 0;
					}
					} else {
						
					if(setPositon == 'left'){
						offset.right = $(this).width() + 'px';
					}else{
						offset.left = $(this).width() + 'px';
					}
						offset.top = '0px';
					}
					$menuGroup.css(offset).fadeIn(option.showDuration);
				},
				function(e) {
					$menuGroup.fadeOut(option.hideDuration);
				}
			);
		});
		$menu.find('a[href^="#"]').click(function() {
			$menuGroups.fadeOut(option.hideDuration);
			return ($(this).attr('href') != '#');
		});
		return this;
	}
	$.fn.extend({
		ptMenu:menu
	});
})(jQuery);
(function($) {
	$(document).ready(function(){
		
		var allParents  = $('.yj-vertical-menu').parentsUntil("body")
		allParents.css('overflow', 'inherit').append('<div class="clear-parents"></div>');
		$('li.active.parent').children(":first-child").addClass('isactivea');
		
	});
	
})(jQuery);