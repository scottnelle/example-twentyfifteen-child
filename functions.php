<?php

/**
 * Enqueue the parent theme's stylesheet to make sure your theme inherits all styles
 */
function example_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'example_enqueue_styles' );

/**
 * Use the filters api to extend functionality defined in the parent theme.
 */
function example_add_color_scheme( $schemes ) {
	$schemes['green'] = array(
		'label'  => __( 'Green', 'child' ),
		'colors' => array(
			'#e9f9f2',
			'#55dcc3',
			'#ffffff',
			'#223f31',
			'#ffffff',
			'#f1f1f1',
		),
	);
	return $schemes;
}
add_filter( 'twentyfifteen_color_schemes', 'example_add_color_scheme' );

/**
 * Register a new widget area to display on the home page
 */
register_sidebar( array(
	'name' => __( 'Home Page Banner', 'child' ),
	'id' => 'home-page-banner',
	'description' => 'Displays before the first post on the home page',
	'before_widget' => '',
	'after_widget' => '',
) );

/**
 * Add customizer options that don't exist in the main theme
 * Here we add a section labeled "Typography" with an option labeled "Body Typeface"
 */
function example_register_customizer_options( $wp_customize ) {
	$wp_customize->add_section( 'example-type', array(
		'title' => __( 'Typography', 'child' ),
		'priority' => 10,
	) );

	$wp_customize->add_setting( 'body_typeface', array( 'default' => 'noto', ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_typeface', array(
		'label' => __( 'Body Typeface', 'child' ),
		'section' => 'example-type',
		'settings' => 'body_typeface',
		'type' => 'select',
		'choices' => array(
				'noto' => __( 'Noto (Default)' ),
				'lora' => __( 'Lora' ),
				'merriweather' => __( 'Merriweather' ),
				'montserrat' => __( 'Montserrat' ),
				'opensans' => __( 'Open Sans' ),
				'oswald' => __( 'Oswald' ),
			),
		)
	) );
}
add_action( 'customize_register', 'example_register_customizer_options' );

/**
 * Get the URL of the selected font, with Open Sans as a default
 */
function example_font_url() {
	$face = get_theme_mod('body_typeface', 'noto' );
	switch ( $face ) {
		case 'lora':
			return '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic';
		case 'merriweather':
			return '//fonts.googleapis.com/css?family=Merriweather:400,700,700italic,400italic,300italic,300,900,900italic';
		case 'montserrat':
			return '//fonts.googleapis.com/css?family=Montserrat:400,700';
		case 'opensans':
			return '//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700';
		case 'oswald':
			return '//fonts.googleapis.com/css?family=Oswald:400,700,300';
		default:
			return twentyfifteen_fonts_url();
	}
}

/**
 * Get the URL for the font that we selected in the customizer
 */
function example_swap_fonts() {
	if ( twentyfifteen_fonts_url() !== example_font_url() ) {
		wp_enqueue_style( 'example-custom-fonts', example_font_url(), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'example_swap_fonts', 11 );

/**
 * Add a class to the body tag to represent the font we selected in the customizer
 * Styles in style.css do the rest of the work for us
 */
function example_add_font_class( $classes ) {
	$classes[] = get_theme_mod('body_typeface', 'noto' );
	return $classes;
}
add_filter( 'body_class', 'example_add_font_class' );

