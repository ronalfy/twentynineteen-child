<?php

// Enqueue the parent theme's CSS
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
