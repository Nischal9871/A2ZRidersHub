<?php
/**
 * A2Z RidersHub — WordPress port of the Downloads/a2z static catalogue.
 * Design only: product data comes from assets/a2z/js/products.js.
 * products.csv is intentionally NOT used.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'A2Z_VERSION', '1.0.0' );
define( 'A2Z_DIR', get_template_directory() );
define( 'A2Z_URI', get_template_directory_uri() );

/* ---------- Setup ---------- */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [ 'height' => 480, 'width' => 500, 'flex-height' => true, 'flex-width' => true ] );
    register_nav_menus( [
        'primary' => __( 'Primary', 'a2zridershub' ),
        'mobile'  => __( 'Mobile', 'a2zridershub' ),
        'footer'  => __( 'Footer', 'a2zridershub' ),
    ] );
} );

/* ---------- Assets (same files, same order as the static source) ---------- */
add_action( 'wp_enqueue_scripts', function () {
    $css = A2Z_DIR . '/assets/a2z/css/style.css';
    wp_enqueue_style(
        'a2z-style',
        A2Z_URI . '/assets/a2z/css/style.css',
        [],
        file_exists( $css ) ? (string) filemtime( $css ) : A2Z_VERSION
    );

    $js = function ( $handle, $file, $deps = [] ) {
        $path = A2Z_DIR . '/assets/a2z/js/' . $file;
        wp_enqueue_script(
            $handle,
            A2Z_URI . '/assets/a2z/js/' . $file,
            $deps,
            file_exists( $path ) ? (string) filemtime( $path ) : A2Z_VERSION,
            true
        );
    };

    $js( 'a2z-config',     'config.js' );
    $js( 'a2z-media',      'media.js',      [ 'a2z-config' ] );
    $js( 'a2z-products',   'products.js',   [ 'a2z-media' ] );
    $js( 'a2z-site',       'site.js',       [ 'a2z-config', 'a2z-media', 'a2z-products' ] );
    $js( 'a2z-components', 'components.js', [ 'a2z-site' ] );

    /* WordPress URL bridge — must load before config.js */
    wp_add_inline_script(
        'a2z-config',
        'window.A2Z_URLS = ' . wp_json_encode( [
            'home'      => home_url( '/' ),
            'catalogue' => home_url( '/catalogue/' ),
            'product'   => home_url( '/product/' ),
            'about'     => home_url( '/about/' ),
            'contact'   => home_url( '/contact/' ),
            'logo'      => A2Z_URI . '/assets/a2z/images/logo.png',
        ] ) . ';',
        'before'
    );

    /* Page scripts — same per-page files as the static source */
    if ( is_front_page() ) {
        $js( 'a2z-home', 'home.js', [ 'a2z-components' ] );
    } elseif ( is_page_template( 'template-catalogue.php' ) ) {
        $js( 'a2z-catalogue', 'catalogue.js', [ 'a2z-components' ] );
    } elseif ( is_page_template( 'template-product.php' ) ) {
        $js( 'a2z-product', 'product.js', [ 'a2z-components' ] );
    } elseif ( is_page_template( 'template-about.php' ) ) {
        $js( 'a2z-about', 'about.js', [ 'a2z-components' ] );
    } elseif ( is_page_template( 'template-contact.php' ) ) {
        $js( 'a2z-contact', 'contact.js', [ 'a2z-components' ] );
    }
} );

/* ---------- Canonical (mirrors the static <link rel="canonical"> tags) ---------- */
add_action( 'wp_head', function () {
    if ( is_front_page() ) {
        echo '<link rel="canonical" href="' . esc_url( home_url( '/' ) ) . '" />' . "\n";
    } elseif ( is_page() ) {
        echo '<link rel="canonical" href="' . esc_url( get_permalink() ) . '" />' . "\n";
    }
}, 1 );

/* ---------- Create the four design-only pages on activation ---------- */
add_action( 'after_switch_theme', function () {
    $pages = [
        'catalogue' => [ 'Catalogue', 'template-catalogue.php' ],
        'product'   => [ 'Product',   'template-product.php' ],
        'about'     => [ 'About',     'template-about.php' ],
        'contact'   => [ 'Contact',   'template-contact.php' ],
    ];

    foreach ( $pages as $slug => [ $title, $template ] ) {
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            $id = wp_insert_post( [
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ] );
            if ( $id && ! is_wp_error( $id ) ) {
                update_post_meta( $id, '_wp_page_template', $template );
            }
        } else {
            update_post_meta( $existing->ID, '_wp_page_template', $template );
        }
    }

    /* Pretty /catalogue/ + ?cat=… URLs need postname permalinks */
    if ( ! get_option( 'permalink_structure' ) ) {
        update_option( 'permalink_structure', '/%postname%/' );
    }
    flush_rewrite_rules();
} );
