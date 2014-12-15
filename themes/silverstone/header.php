<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SilverStone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper-one">
<div id="wrapper-two">
<div id="wrapper-three">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'silverstone' ); ?></a>
	
    <?php if( is_front_page() ) : ?>
    <div class="frontpage-header">
    
    	<div class="frontpage-header-overlay">
        
        	<div class="frontpage-header-content-container">
        
                <div class="frontpage-header-content">
                
                	<div class="frontpage-header-content-image">
                        <?php if( get_theme_mod('SilverStone_frontpage_header_image') ) : ?>
                        <img src="<?php echo esc_url(get_theme_mod('SilverStone_frontpage_header_image')); ?>" />
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/skins/images/fpimage.png" />
                        <?php endif; ?>
                    </div>
                    
                    <div class="frontpage-header-content-headline">
                    
                    	<h1>
							<?php 
                                if( get_theme_mod('SilverStone_frontpage_header_headline') ){
                                    echo esc_html( get_theme_mod('SilverStone_frontpage_header_headline') );
                                }else {
                                    _e('Modern Business Theme',  'silverstone');
                                }
                            ?>                         
                        </h1>
                        <p>
							<?php 
                                if( get_theme_mod('SilverStone_frontpage_header_text') ){
                                    echo esc_html( get_theme_mod('SilverStone_frontpage_header_text') );
                                }else {
                                    _e('Awesome Responsive Business Theme with large header, product sections and CTA button in header and footer. Customize it live via WordPress customizer',  'silverstone');
                                }
                            ?>                        
                        </p>
                    
                    </div>
                    
                    <div class="frontpage-header-content-button">
                    
                    	<?php if( get_theme_mod('SilverStone_frontpage_header_cta_link') ) : ?>
                     	<a href="<?php echo esc_url(get_theme_mod('SilverStone_frontpage_header_cta_link')); ?>">
							<?php 
                                if( get_theme_mod('SilverStone_frontpage_header_cta_text') ){
                                    echo esc_html( get_theme_mod('SilverStone_frontpage_header_cta_text') );
                                }else {
                                    _e('Call To Action',  'silverstone');
                                }
                            ?>                         
                        </a>                       
                        <?php else : ?>
                    	<span>
							<?php 
                                if( get_theme_mod('SilverStone_frontpage_header_cta_text') ){
                                    echo esc_html( get_theme_mod('SilverStone_frontpage_header_cta_text') );
                                }else {
                                    _e('Call To Action',  'silverstone');
                                }
                            ?>                         
                        </span>
                        <?php endif; ?>
                    
                    </div>
                    
                    <span class="frontpage-header-arrow"></span>                   
                
                </div>  
                      
        	</div>
        
        </div>
    
    </div>
    <?php endif; ?>
    
	<header id="masthead" class="site-header" role="banner">
    <?php if(is_front_page()) : ?>
    <div class="header-nav-container">
    <?php else : ?>
    <div class="header-nav-container-inner">
    <?php endif; ?>
        <div class="responsive-container">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
    
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-nav' ) ); ?>
            </nav><!-- #site-navigation -->
        </div><!-- .responsive-container -->
    </div>
    </header><!-- #masthead -->
    
    <?php if( (!is_front_page() && is_single()) && (get_theme_mod('SilverStone_show_custom_header_single', 'no') == 'yes') ) : ?>
    	<?php get_template_part('custom', 'header'); ?>
    <?php endif; ?>   
    
    <?php if( (!is_front_page() && is_page()) && (get_theme_mod('SilverStone_show_custom_header_page', 'no') == 'yes') ) : ?>
    	<?php get_template_part('custom', 'header'); ?>
    <?php endif; ?>     
    
    <?php if( is_front_page() ) : ?>
    <div class="frontpage-welcome-container">
		<div class="responsive-container">
            <div class="frontpage-welcome">
            
                <h1>
                    <?php 
                        if( get_theme_mod('SilverStone_frontpage_welcome_headline') ){
                            echo esc_html( get_theme_mod('SilverStone_frontpage_welcome_headline') );
                        }else {
                            _e('Welcome Headline Here',  'silverstone');
                        }
                    ?>    
                </h1>
                
                <p>
                    <?php 
                        if( get_theme_mod('SilverStone_frontpage_welcome_text') ){
                            echo esc_html( get_theme_mod('SilverStone_frontpage_welcome_text') );
                        }else {
                            _e('You can change this text in front page welcome text box in front page options tab of customizer in Appearance section of dashboard. Write something awesome.',  'silverstone');
                        }
                    ?>                                
                </p>    
            
            </div><!-- .frontpage-welcome -->    
    	</div>
    </div>
    <?php endif; ?>
            
	<div id="content" class="site-content">
	<div class="responsive-container">