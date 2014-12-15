<?php
/**
 * SilverStone Theme Customizer
 *
 * @package SilverStone
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function SilverStone_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* FrontPage Section */
	$wp_customize->add_panel( 'SilverStone_frontpage_options', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Static Front Page Options', 'silverstone'),
	) );
	
   	$wp_customize->add_section( 'static_front_page' , array(
		'title'      => __('Static front page', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 100,
   	) );
	
	$wp_customize->add_setting(
		'SilverStone_show_frontpage_posts', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
    $wp_customize->add_control( 'SilverStone_show_frontpage_posts', array(
        'label'   => __('Select front page layout:', 'silverstone'),
        'section' => 'static_front_page',
        'type'    => 'select',
		'priority'   => 900,
        'choices' => array('yes'=>__('Without Posts and Pages', 'silverstone'), 'no'=>__('With Posts and Pages', 'silverstone')),
    ));
	
   	$wp_customize->add_section( 'SilverStone_frontpage_header' , array(
		'title'      => __('Front Page Header Section', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 200,
   	) );
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_image', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'SilverStone_frontpage_header_image',
			   array(
				   'label'          => __( 'Upload a Image for Front page Header.', 'silverstone' ),
				   'section'        => 'SilverStone_frontpage_header',
				   'priority'   => 100,
			   )
		   )
	);	
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_headline', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_header_headline', array(
        'label'   => __('Front Page Header Headline :', 'silverstone'),
        'section' => 'SilverStone_frontpage_header',
        'type'    => 'text',
		'priority'   => 110,
    ));	
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_header_text', array(
        'label'   => __('Front Page Header Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_header',
        'type'    => 'text',
		'priority'   => 120,
    ));	
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_cta_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_header_cta_text', array(
        'label'   => __('Front Page Header CTA Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_header',
        'type'    => 'text',
		'priority'   => 130,
    ));	
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_header_cta_link', array(
        'label'   => __('Front Page Header CTA Link :', 'silverstone'),
        'section' => 'SilverStone_frontpage_header',
        'type'    => 'text',
		'priority'   => 140,
    ));
	global 	$wp_version;
	if( $wp_version >= 4.0 ) {
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_background_visibility', array(
        'default'        => '5',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_header_background_visibility', array(
        'label'   => __('Background Visibility :', 'silverstone'),
        'section' => 'SilverStone_frontpage_header',
        'type'    => 'range',
		'input_attrs' => array(
        'min'   => 0,
        'max'   => 100,
        'step'  => 5,
    	),
		'priority'   => 150,
    ));
	}
	$wp_customize->add_setting(
		'SilverStone_frontpage_header_background', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'SilverStone_frontpage_header_background',
			   array(
				   'label'          => __( 'Upload a Image for Front page Header background, suggested size is 2000x1200', 'silverstone' ),
				   'section'        => 'SilverStone_frontpage_header',
				   'priority'   => 160,
			   )
		   )
	);				
	
   	$wp_customize->add_section( 'SilverStone_frontpage_welcome' , array(
		'title'      => __('Front Page Welcome Section', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 300,
   	) );
	$wp_customize->add_setting(
		'SilverStone_frontpage_welcome_headline', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_welcome_headline', array(
        'label'   => __('Front Page Welcome Headline :', 'silverstone'),
        'section' => 'SilverStone_frontpage_welcome',
        'type'    => 'text',
		'priority'   => 200,
    ));		
	$wp_customize->add_setting(
		'SilverStone_frontpage_welcome_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_welcome_text', array(
        'label'   => __('Front Page Welcome Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_welcome',
        'type'    => 'text',
		'priority'   => 210,
    ));		
	
   	$wp_customize->add_section( 'SilverStone_frontpage_left_product' , array(
		'title'      => __('Front Page Left Product', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 400,
   	) );
	$wp_customize->add_setting(
		'SilverStone_frontpage_left_large', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'SilverStone_frontpage_left_large',
			   array(
				   'label'          => __( 'Upload a 720x420 for Left Section Large Image', 'silverstone' ),
				   'section'        => 'SilverStone_frontpage_left_product',
				   'priority'   => 220,
			   )
		   )
	);
	$wp_customize->add_setting(
		'SilverStone_frontpage_left_name', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_left_name', array(
        'label'   => __('Left Section Name :', 'silverstone'),
        'section' => 'SilverStone_frontpage_left_product',
        'type'    => 'text',
		'priority'   => 240,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_left_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_left_text', array(
        'label'   => __('Left Section Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_left_product',
        'type'    => 'text',
		'priority'   => 245,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_left_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_left_cta_link', array(
        'label'   => __('Left Section Link:', 'silverstone'),
        'section' => 'SilverStone_frontpage_left_product',
        'type'    => 'text',
		'priority'   => 260,
    ));	
	
   	$wp_customize->add_section( 'SilverStone_frontpage_center_product' , array(
		'title'      => __('Front Page Center Product', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 500,
   	) );
	$wp_customize->add_setting(
		'SilverStone_frontpage_center_large', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'SilverStone_frontpage_center_large',
			   array(
				   'label'          => __( 'Upload a 720x420 for Center Section Large Image', 'silverstone' ),
				   'section'        => 'SilverStone_frontpage_center_product',
				   'priority'   => 270,
			   )
		   )
	);
	$wp_customize->add_setting(
		'SilverStone_frontpage_center_name', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_center_name', array(
        'label'   => __('center Section Name :', 'silverstone'),
        'section' => 'SilverStone_frontpage_center_product',
        'type'    => 'text',
		'priority'   => 290,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_center_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_center_text', array(
        'label'   => __('center Section Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_center_product',
        'type'    => 'text',
		'priority'   => 300,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_center_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_center_cta_link', array(
        'label'   => __('center Section Link:', 'silverstone'),
        'section' => 'SilverStone_frontpage_center_product',
        'type'    => 'text',
		'priority'   => 320,
    ));		
	
   	$wp_customize->add_section( 'SilverStone_frontpage_right_product' , array(
		'title'      => __('Front Page Right Product', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 600,
   	) );
	$wp_customize->add_setting(
		'SilverStone_frontpage_right_large', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'SilverStone_frontpage_right_large',
			   array(
				   'label'          => __( 'Upload a 720x420 for Right Section Large Image', 'silverstone' ),
				   'section'        => 'SilverStone_frontpage_right_product',
				   'priority'   => 330,
			   )
		   )
	);
	$wp_customize->add_setting(
		'SilverStone_frontpage_right_name', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_right_name', array(
        'label'   => __('right Section Name :', 'silverstone'),
        'section' => 'SilverStone_frontpage_right_product',
        'type'    => 'text',
		'priority'   => 350,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_right_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_right_text', array(
        'label'   => __('right Section Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_right_product',
        'type'    => 'text',
		'priority'   => 360,
    ));
	$wp_customize->add_setting(
		'SilverStone_frontpage_right_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_frontpage_right_cta_link', array(
        'label'   => __('right Section Link:', 'silverstone'),
        'section' => 'SilverStone_frontpage_right_product',
        'type'    => 'text',
		'priority'   => 380,
    ));	
	
   	$wp_customize->add_section( 'SilverStone_frontpage_footer_cta' , array(
		'title'      => __('Front Page Footer CTA', 'silverstone'),
		'panel'  => 'SilverStone_frontpage_options',
		'priority'   => 700,
   	) );
	$wp_customize->add_setting(
		'SilverStone_show_cta_section', array(
        'default'        => 'yes',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));	
    $wp_customize->add_control( 'SilverStone_show_cta_section', array(
        'label'   => __('Show CTA Section:', 'silverstone'),
        'section' => 'SilverStone_frontpage_footer_cta',
        'type'    => 'select',
		'priority'   => 10,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));	
	$wp_customize->add_setting(
		'SilverStone_footer_cta_heading', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_footer_cta_heading', array(
        'label'   => __('Footer CTA Section Heading :', 'silverstone'),
        'section' => 'SilverStone_frontpage_footer_cta',
        'type'    => 'text',
		'priority'   => 20,
    ));	
	$wp_customize->add_setting(
		'SilverStone_footer_cta_text', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_footer_cta_text', array(
        'label'   => __('Footer CTA Section Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_footer_cta',
        'type'    => 'text',
		'priority'   => 30,
    ));
	$wp_customize->add_setting(
		'SilverStone_footer_cta', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_footer_cta', array(
        'label'   => __('Footer CTA Button Text :', 'silverstone'),
        'section' => 'SilverStone_frontpage_footer_cta',
        'type'    => 'text',
		'priority'   => 40,
    ));			
	$wp_customize->add_setting(
		'SilverStone_footer_cta_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'SilverStone_footer_cta_link', array(
        'label'   => __('Footer CTA Button Link :', 'silverstone'),
        'section' => 'SilverStone_frontpage_footer_cta',
        'type'    => 'text',
		'priority'   => 50,
    ));									
	
		
		
	/* Social Section */
   	$wp_customize->add_section( 'SilverStone_social_options' , array(
		'title'      => __('Footer Options', 'silverstone'),
		'priority'   => 800,
   	) );

	$wp_customize->add_setting(
		'SilverStone_show_social_section', array(
        'default'        => 'yes',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));	
    $wp_customize->add_control( 'SilverStone_show_social_section', array(
        'label'   => __('Show Social Section:', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'select',
		'priority'   => 110,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	$wp_customize->add_setting(
		'SilverStone_social_facebook', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_facebook', array(
        'label'   => __('Facebook Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 120,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_twitter', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_twitter', array(
        'label'   => __('Twitter Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 130,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_behance', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_behance', array(
        'label'   => __('Behance Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_bitbucket', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_bitbucket', array(
        'label'   => __('BitBucket Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 150,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_github', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_github', array(
        'label'   => __('GitHub Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 160,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_instagram', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_instagram', array(
        'label'   => __('InstaGram Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 169,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_youtube', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_youtube', array(
        'label'   => __('YouTube Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 170,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_dribble', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_dribble', array(
        'label'   => __('Dribble Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 180,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_googleplus', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_googleplus', array(
        'label'   => __('Google Plus Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 190,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_tumblr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_tumblr', array(
        'label'   => __('Tunblr Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 200,
    ));	
	$wp_customize->add_setting(
		'SilverStone_social_vine', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_vine', array(
        'label'   => __('Vine Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 210,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_wp', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_wp', array(
        'label'   => __('WordPress Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 220,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_spotify', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_spotify', array(
        'label'   => __('Spotify Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 230,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_soundcloud', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_soundcloud', array(
        'label'   => __('SoundCloud Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 240,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_reddit', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_reddit', array(
        'label'   => __('Reddit Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 250,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_pinterest', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_pinterest', array(
        'label'   => __('Pinterest Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 260,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_linkedin', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_linkedin', array(
        'label'   => __('LinkedIn Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 270,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_flickr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_flickr', array(
        'label'   => __('Flickr Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 280,
    ));
	$wp_customize->add_setting(
		'SilverStone_social_stackexchange', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( 'SilverStone_social_stackexchange', array(
        'label'   => __('StackExchange Link :', 'silverstone'),
        'section' => 'SilverStone_social_options',
        'type'    => 'text',
		'priority'   => 290,
    ));	
	
	/* Single Post Section */
   	$wp_customize->add_section( 'SilverStone_single_post' , array(
		'title'      => __('Single Post Options', 'silverstone'),
		'priority'   => 900,
   	) );

	$wp_customize->add_setting(
		'SilverStone_show_custom_header_single', array(
        'default'        => 'no',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_custom_header_single', array(
        'label'   => __('Show Custom Header on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 100,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	$wp_customize->add_setting(
		'SilverStone_show_title_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_title_post', array(
        'label'   => __('Show Title on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 200,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	$wp_customize->add_setting(
		'SilverStone_show_meta_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_meta_post', array(
        'label'   => __('Show Meta on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 300,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));

	$wp_customize->add_setting(
		'SilverStone_show_cats_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_cats_post', array(
        'label'   => __('Show Categories on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 400,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	$wp_customize->add_setting(
		'SilverStone_show_tags_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_tags_post', array(
        'label'   => __('Show Tags on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 500,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));

	$wp_customize->add_setting(
		'SilverStone_show_nav_post', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_nav_post', array(
        'label'   => __('Show Nav Section on Single Post:', 'silverstone'),
        'section' => 'SilverStone_single_post',
        'type'    => 'select',
		'priority'   => 700,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	
	/* Page Section */
   	$wp_customize->add_section( 'SilverStone_page_options' , array(
		'title'      => __('Page Options', 'silverstone'),
		'priority'   => 910,
   	) );

	$wp_customize->add_setting(
		'SilverStone_show_custom_header_page', array(
        'default'        => 'no',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_custom_header_page', array(
        'label'   => __('Show Custom Header on Page:', 'silverstone'),
        'section' => 'SilverStone_page_options',
        'type'    => 'select',
		'priority'   => 90,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	$wp_customize->add_setting(
		'SilverStone_show_title_page', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_title_page', array(
        'label'   => __('Show Title on Page:', 'silverstone'),
        'section' => 'SilverStone_page_options',
        'type'    => 'select',
		'priority'   => 100,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));
	
	/* Archive Section */
   	$wp_customize->add_section( 'SilverStone_category_page' , array(
		'title'      => __('Archive Pages Options', 'silverstone'),
		'priority'   => 920,
   	) );

	$wp_customize->add_setting(
		'SilverStone_show_excerpt_categories', array(
        'default'        => 'yes',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'SilverStone_sanitize_yes_no',
    ));
	$wp_customize->add_control( 'SilverStone_show_excerpt_categories', array(
        'label'   => __('Disable categories/tags on Archive Pages:', 'silverstone'),
        'section' => 'SilverStone_category_page',
        'type'    => 'select',
		'priority'   => 200,
        'choices' => array('yes'=>__('Yes', 'silverstone'), 'no'=>__('No', 'silverstone')),
    ));	
	
}
add_action( 'customize_register', 'SilverStone_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function SilverStone_customize_preview_js() {
	wp_enqueue_script( 'SilverStone_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'SilverStone_customize_preview_js' );

function SilverStone_sanitize_yes_no( $value ) {
    if ( ! in_array( $value, array( 'yes', 'no' ) ) ){
        $value = 'yes';
	}
    return $value;
}
