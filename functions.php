<?php

/**
 * Disable WordPress core block patterns.
 */
function mytheme_disable_core_patterns() {
    remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'mytheme_disable_core_patterns' );

/**
 * Enqueue theme stylesheet.
 */
function mytheme_enqueue_styles() {

    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );

}

add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_styles' );

/**
 * Register Project Custom Post Type.
 */
function my_register_project_cpt() {

    register_post_type(
        'project',
        array(
            'labels' => array(
                'name'          => 'Projects',
                'singular_name' => 'Project',
                'menu_name'     => 'Projects',
                'add_new'       => 'Add New',
                'add_new_item'  => 'Add New Project',
                'edit_item'     => 'Edit Project',
                'new_item'      => 'New Project',
                'view_item'     => 'View Project',
                'all_items'     => 'All Projects',
                'search_items'  => 'Search Projects',
                'not_found'     => 'No projects found.',
                'not_found_in_trash' => 'No projects found in Trash.',
            ),

            'public'       => true,
            'show_ui'      => true,
            'show_in_menu' => true,
            'show_in_rest' => true,

            'menu_icon'    => 'dashicons-portfolio',

            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'revisions',
            ),

            'has_archive' => true,

            'rewrite' => array(
                'slug' => 'projects',
            ),
        )
    );

}

add_action( 'init', 'my_register_project_cpt' );


/**
 * Register Project Categories.
 *
 * Hierarchical like WordPress Categories.
 */
function my_register_project_categories() {

    register_taxonomy(
        'project_category',
        array( 'project' ),
        array(
            'labels' => array(
                'name'              => 'Project Categories',
                'singular_name'     => 'Project Category',
                'search_items'      => 'Search Project Categories',
                'all_items'         => 'All Project Categories',
                'parent_item'       => 'Parent Project Category',
                'parent_item_colon' => 'Parent Project Category:',
                'edit_item'         => 'Edit Project Category',
                'update_item'       => 'Update Project Category',
                'add_new_item'      => 'Add New Project Category',
                'new_item_name'     => 'New Project Category Name',
                'menu_name'         => 'Categories',
            ),

            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,

            'hierarchical'      => true,

            'rewrite' => array(
                'slug' => 'project-category',
            ),
        )
    );

}

add_action( 'init', 'my_register_project_categories' );


/**
 * Register Project Tags.
 *
 * Non-hierarchical like WordPress Tags.
 */
function my_register_project_tags() {

    register_taxonomy(
        'project_tag',
        array( 'project' ),
        array(
            'labels' => array(
                'name'          => 'Project Tags',
                'singular_name' => 'Project Tag',
                'search_items'  => 'Search Project Tags',
                'all_items'     => 'All Project Tags',
                'edit_item'     => 'Edit Project Tag',
                'update_item'   => 'Update Project Tag',
                'add_new_item'  => 'Add New Project Tag',
                'new_item_name' => 'New Project Tag Name',
                'menu_name'     => 'Tags',
            ),

            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,

            'hierarchical'      => false,

            'rewrite' => array(
                'slug' => 'project-tag',
            ),
        )
    );

}

add_action( 'init', 'my_register_project_tags' );
