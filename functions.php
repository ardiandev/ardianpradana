<?php

/**
 * Disable WordPress core block patterns.
 */
function mytheme_disable_core_patterns() {
    remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'mytheme_disable_core_patterns' );
