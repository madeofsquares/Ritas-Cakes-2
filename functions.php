<?php

// switch off auto <p>
// remove_filter( 'the_content', 'wpautop' );

// load theme stylesheet
wp_register_style(
    'core-css',
    get_template_directory_uri() . '/style.css',
    '',
    '2.0',
    'all'
);
function rc_enqueue_style() {
    wp_enqueue_style( 'core-css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'rc_enqueue_style' );

// register menus
function register_my_menus() {
    register_nav_menu( 'main-nav', 'Navigation Menu' );
    register_nav_menu( 'socail-nav', 'Socail Network Menu' );
}
add_action( 'init', 'register_my_menus' );

// add div around video embeds
function div_vid_embed( $html ) {
    return '<div class="video-container">' . $html . '</div>';
} 
add_filter( 'embed_oembed_html', 'div_vid_embed', 10, 3 );
add_filter( 'video_embed_html', 'div_vid_embed' ); // for Jetpack

// theme support
function rc_theme_setup() {
    
    add_theme_support( 'custom-logo', array(
        'flex-height'   => true,
    ) );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'rc_theme_setup' );

// custom menu walker [https://www.microdot.io/simpler-wp-nav-menu-markup/]
class Microdot_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<div>';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</div>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';
        if( in_array('current-menu-item', $classes) ) {
            $active_class = ' class="active"';
        } else if( in_array('current-menu-parent', $classes) ) {
            $active_class = ' class="active-parent"';
        } else if( in_array('current-menu-ancestor', $classes) ) {
            $active_class = ' class="active-ancestor"';
        }

        $url = '';
        if( !empty( $item->url ) ) {
            $url = $item->url;
        }

        $output .= '<div><a ' . $active_class . ' href="' . $url . '">' . $item->title . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</a></div>';
    }
}

function rc_add_image_category() {
    $labels = array(
        'name'              => 'Image Category',
        'singular_name'     => 'Image Categories',
        'search_items'      => 'Search Image Categories',
        'all_items'         => 'All Image Categories',
        'parent_item'       => 'Parent Image Category',
        'parent_item_colon' => 'Parent Image Category:',
        'edit_item'         => 'Edit Image Category',
        'update_item'       => 'Update Image Category',
        'add_new_item'      => 'Add New Image Category',
        'new_item_name'     => 'New Image Category Name',
        'menu_name'         => 'Image Category',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'image_category', 'attachment', $args );
}
add_action( 'init', 'rc_add_image_category' );

?>