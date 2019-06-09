<?php

// Enqueue the parent theme's CSS.
add_action( 'wp_enqueue_scripts', 'twentynineteen_child_enqueue_scripts' );
function twentynineteen_child_enqueue_scripts() {
	wp_enqueue_style(
		'twentynineteen',
		get_template_directory_uri() . '/style.css',
		array(),
		'1.4',
		'all'
	);
}

// Include the theme's header.
add_action( 'twentynineteen_child_header', 'twentynineteen_child_header' );
function twentynineteen_child_header() {
	include 'includes/header.php';
}

// Include the theme's footer.
add_action( 'twentynineteen_child_footer', 'twentynineteen_child_footer' );
function twentynineteen_child_footer() {
	include 'includes/footer.php';
}

// Show theme support for Beaver Builder in the theme.
add_action( 'after_setup_theme', 'twentynineteen_beaver_header_footer_support' );
function twentynineteen_beaver_header_footer_support() {
	add_theme_support( 'fl-theme-builder-headers' );
	add_theme_support( 'fl-theme-builder-footers' );
	add_theme_support( 'fl-theme-builder-parts' );
}

// Allow Beaver Builder to take over the header/footer
add_action( 'wp', 'twentyninteteen_beaver__header_footer_render' );
function twentyninteteen_beaver__header_footer_render() {
	if ( class_exists( 'FLThemeBuilderLayoutData' ) ) {
		// Get the header ID.
		$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

		// If we have a header, remove the theme header and hook in Theme Builder's.
		if ( ! empty( $header_ids ) ) {
			remove_action( 'twentynineteen_child_header', 'twentynineteen_child_header' );
			add_action( 'twentynineteen_child_header', 'FLThemeBuilderLayoutRenderer::render_header' );
		}
		// Get the footer ID.
		$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();
		// If we have a footer, remove the theme footer and hook in Theme Builder's.
		if ( ! empty( $footer_ids ) ) {
			remove_action( 'twentynineteen_child_footer', 'twentynineteen_child_footer' );
			add_action( 'twentynineteen_child_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
		}
	}
}
