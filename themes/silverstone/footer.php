<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SilverStone
 */
?>
	</div><!-- .responsive-container -->
	</div><!-- #content -->

	<?php if( is_front_page() ) : ?>
	<?php if(get_theme_mod('SilverStone_show_cta_section', 'yes') != 'no'):?>
    <div class="footer-cta-container">
    
            <div class="responsive-container">
            
                <div class="footer-cta">
                
                	<div class="footer-cta-heading">
                         <p>
						 <?php 
                            if( get_theme_mod('SilverStone_footer_cta_heading') ){
                                echo esc_html( get_theme_mod('SilverStone_footer_cta_heading') );
                            }else {
                                _e("Ready to Start Your Project?",  "SilverStone");
                            }
                        ?>                    
                    	</p>
                    </div>
                    
                    <div class="footer-cta-text">
                        
                        <p>
                         <?php 
                            if( get_theme_mod('SilverStone_footer_cta_text') ){
                                echo esc_html( get_theme_mod('SilverStone_footer_cta_text') );
                            }else {
                                _e("You can change this quote/testimonial text in footer settings tab of customizer under Appearance section of dashboard. Don't forget to rate my theme on WordPress too :)",  "SilverStone");
                            }
                        ?>
                        </p>
                        
                        <?php if( get_theme_mod('SilverStone_footer_cta_link') ) : ?>
                        <a class="footer-cta-button" href="<?php echo esc_url(get_theme_mod('SilverStone_footer_cta_link')); ?>">
                         <?php 
                            if( get_theme_mod('SilverStone_footer_cta') ){
                                echo esc_html( get_theme_mod('SilverStone_footer_cta') );
                            }else {
                                _e('Get A Quote',  'silverstone');
                            }
                        ?>
                        </a>                        
                        <?php else : ?>
                        <span class="footer-cta-button">
                         <?php 
                            if( get_theme_mod('SilverStone_footer_cta') ){
                                echo esc_html( get_theme_mod('SilverStone_footer_cta') );
                            }else {
                                _e('Get A Quote',  'silverstone');
                            }
                        ?>
                        </span>
                        <?php endif; ?>
                        
                    </div>                    
                                
                </div><!-- .footer-cta -->        
            
            </div><!-- .Responsive-Container -->        
    
    </div><!-- .footer-cta-container --> 
	<?php endif; ?>
    <?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="responsive-container">
    	
        <div class="footer-widgets">
        
        	<div class="footer-widget">
            	<?php if ( dynamic_sidebar('sidebar-footer-left') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Center Left', 'embr' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>                  
            </div>
            
        	<div class="footer-widget">
            	<?php if ( dynamic_sidebar('sidebar-footer-center-left') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Center Left', 'embr' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>                   
            </div>
            
        	<div class="footer-widget">
            	<?php if ( dynamic_sidebar('sidebar-footer-center-right') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Center Right', 'embr' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>                  
            </div>
            
        	<div class="footer-widget">
            	<?php if ( dynamic_sidebar('sidebar-footer-right') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Right', 'embr' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>                 
            </div>                                    
        
        </div>
		<div class="site-info">
            <p>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'silverstone' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'silverstone' ), 'WordPress' ); ?></a>
            </p>
			<?php if(get_theme_mod('SilverStone_show_social_section') != 'no'):?>
                <div class="footer_social_icons">
        
                            <?php if(get_theme_mod('SilverStone_social_facebook')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_facebook')); ?>">&#xf09a;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_twitter')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_twitter')); ?>">&#xf099;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_behance')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_behance')); ?>">&#xf1b4;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_bitbucket')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_bitbucket')); ?>">&#xf171;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_github')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_github')); ?>">&#xf113;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_instagram')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_instagram')); ?>">&#xf16d;</a></span> 
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_youtube')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_youtube')); ?>">&#xf167;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_dribble')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_dribble')); ?>">&#xf17d;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_googleplus')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_googleplus')); ?>">&#xf0d5;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_tumblr')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_tumblr')); ?>">&#xf173;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_vine')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_vine')); ?>">&#xf1ca;</a></span>  
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_wp')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_wp')); ?>">&#xf19a;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_spotify')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_spotify')); ?>">&#xf1bc;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_soundcloud')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_soundcloud')); ?>">&#xf1be;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_reddit')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_reddit')); ?>">&#xf1a1;</a></span> 
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_pinterest')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_pinterest')); ?>">&#xf0d2;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_linkedin')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_linkedin')); ?>">&#xf0e1;</a></span>
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_flickr')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_flickr')); ?>">&#xf16e;</a></span>  
                            <?php endif; ?>
                            <?php if(get_theme_mod('SilverStone_social_stackexchange')):?>
                            <span><a href="<?php echo esc_url(get_theme_mod('SilverStone_social_stackexchange')); ?>">&#xf16c;</a></span>
                            <?php endif; ?> 
            
                </div><!-- .footer_social_icons -->
            <?php endif; ?>              
		</div><!-- .site-info -->
	</div><!-- .responsive-container -->
    </footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- #wrapper-one -->
</div><!-- #wrapper-two -->
</div><!-- #wrapper-three -->

<?php wp_footer(); ?>

</body>
</html>
