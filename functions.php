<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'QIYUE_BLOG_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/customizer.php';

function qiyue_blog_setup() {
	load_theme_textdomain( 'qiyue-blog', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( '主导航', 'qiyue-blog' ),
			'footer'  => __( '页脚导航', 'qiyue-blog' ),
		)
	);

	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'qiyue_blog_setup' );

function qiyue_blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( '博客侧边栏', 'qiyue-blog' ),
			'id'            => 'sidebar-1',
			'description'   => __( '显示在文章列表与文章详情页。未添加小工具时显示默认关于、搜索和分类。', 'qiyue-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( '页脚小工具', 'qiyue-blog' ),
			'id'            => 'footer-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'qiyue_blog_widgets_init' );

function qiyue_blog_scripts() {
	wp_enqueue_style( 'qiyue-blog-style', get_stylesheet_uri(), array(), QIYUE_BLOG_VERSION );
	wp_enqueue_script( 'qiyue-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), QIYUE_BLOG_VERSION, true );

	$primary = sanitize_hex_color( get_theme_mod( 'qiyue_blog_primary_color', '#566b58' ) );
	if ( $primary ) {
		wp_add_inline_style( 'qiyue-blog-style', ':root{--primary:' . $primary . ';}' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qiyue_blog_scripts' );

function qiyue_blog_excerpt_length( $length ) {
	return is_admin() ? $length : 42;
}
add_filter( 'excerpt_length', 'qiyue_blog_excerpt_length' );

function qiyue_blog_excerpt_more( $more ) {
	return is_admin() ? $more : '…';
}
add_filter( 'excerpt_more', 'qiyue_blog_excerpt_more' );

function qiyue_blog_menu_fallback() {
	echo '<ul id="primary-menu" class="menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( '首页', 'qiyue-blog' ) . '</a></li>';
	wp_list_pages(
		array(
			'title_li' => '',
			'number'   => 5,
			'depth'    => 1,
		)
	);
	echo '</ul>';
}
