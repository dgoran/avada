
	function thirty_pc() {
		var height = jQuery(window).height();
		var width = jQuery(window).width();
		var frontHeaderHeight = height;
		frontHeaderHeight = parseInt(frontHeaderHeight) + 'px';
		if( width > 1500 ){
		jQuery(".frontpage-header").css('height',frontHeaderHeight);
		}
	}
	
	jQuery(document).ready(function() {
		thirty_pc();
		jQuery(window).bind('resize', thirty_pc);
	});	