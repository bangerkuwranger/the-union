<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );

function add_custom_font() { 
	$font_path = get_stylesheet_directory_uri() . '/fonts/cacscribbles/';
	?>
	<style type="text/css">
	@font-face {
		font-family: 'cAcScribbles Regular';
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Regular.otf'; ?>)  format('opentype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Regular.ttf'; ?>)  format('truetype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Regular.woff'; ?>)  format('woff');
	}
	@font-face {
		font-family: 'cAcScribbles Oblique';
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Oblique.otf'; ?>)  format('opentype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Oblique.ttf'; ?>)  format('truetype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Oblique.woff'; ?>)  format('woff');
	}
	@font-face {
		font-family: 'cAcScribbles Bold';
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold.otf'; ?>)  format('opentype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold.ttf'; ?>)  format('truetype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold.woff'; ?>)  format('woff');
	}
	@font-face {
		font-family: 'cAcScribbles Bold Oblique';
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold-Oblique.otf'; ?>)  format('opentype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold-Oblique.ttf'; ?>)  format('truetype');
		src: url( <?php  echo esc_url( $font_path ).'cAcScribbles-Bold-Oblique.woff'; ?>)  format('woff');
	}
	</style>
	<?php
}
add_action( 'wp_head', 'add_custom_font' );
add_action( 'customize_controls_print_styles', 'add_custom_font' );


function add_custom_fonts( $localized_data ) {
	$localized_data['fonts']['Custom'][] = 'cAcScribbles Regular';
	$localized_data['fonts']['Custom'][] = 'cAcScribbles Oblique';
	$localized_data['fonts']['Custom'][] = 'cAcScribbles Bold';
	$localized_data['fonts']['Custom'][] = 'cAcScribbles Bold Oblique';
	return $localized_data;
}
add_filter( 'neve_react_controls_localization', 'add_custom_fonts' );