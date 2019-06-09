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
