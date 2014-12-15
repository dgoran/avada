    jQuery(function () {
      
      jQuery('#main-nav').tinyNav({
        header: 'Navigation' // Writing any title with this option triggers the header
      });

    });	  
	
    jQuery(window).load(function(){
      jQuery(".header-nav-container").sticky({ topSpacing: 0, wrapperClassName: 'nifty-sticky-wrapper', className: 'sticky-header' });
	  jQuery(".header-nav-container-inner").sticky({ topSpacing: 0, wrapperClassName: 'nifty-sticky-wrapper', className: 'sticky-header' });
    });	
