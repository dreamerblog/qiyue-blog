<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qiyue_blog_defaults() {
	return array(
		'primary_color'     => '#566b58',
		'intro_eyebrow'     => 'WRITING · THINKING · LIVING',
		'intro_title'       => "记录日常，\n分享思考。",
		'intro_description' => '在这里写下生活观察、阅读笔记与创作心得。不追逐喧嚣，只保留值得慢慢阅读的文字。',
		'about_title'       => '你好，我是启越',
		'about_content'     => '一个喜欢阅读、设计与写作的人。这个小小的角落，用来收藏灵感，也记录平凡日子里的微光。',
		'footer_text'       => '以文字记录生活，让思考慢慢发生。',
	);
}

function qiyue_blog_mod( $key ) {
	$defaults = qiyue_blog_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'qiyue_blog_' . $key, $default );
}

function qiyue_blog_customize_register( $wp_customize ) {
	$defaults = qiyue_blog_defaults();

	$add_field = function ( $section, $key, $label, $type = 'text', $sanitize = 'sanitize_text_field' ) use ( $wp_customize, $defaults ) {
		$wp_customize->add_setting(
			'qiyue_blog_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
			)
		);

		$control = array(
			'label'    => $label,
			'section'  => $section,
			'settings' => 'qiyue_blog_' . $key,
		);
		if ( 'text' !== $type ) {
			$control['type'] = $type;
		}
		$wp_customize->add_control( 'qiyue_blog_' . $key, $control );
	};

	$wp_customize->add_section(
		'qiyue_blog_home',
		array(
			'title'       => __( '博客首页', 'qiyue-blog' ),
			'description' => __( '设置博客首页的欢迎文字，无需上传图片。', 'qiyue-blog' ),
			'priority'    => 30,
		)
	);
	$add_field( 'qiyue_blog_home', 'intro_eyebrow', __( '英文眉题', 'qiyue-blog' ) );
	$add_field( 'qiyue_blog_home', 'intro_title', __( '首页标题（可换行）', 'qiyue-blog' ), 'textarea', 'sanitize_textarea_field' );
	$add_field( 'qiyue_blog_home', 'intro_description', __( '首页简介', 'qiyue-blog' ), 'textarea', 'sanitize_textarea_field' );

	$wp_customize->add_section(
		'qiyue_blog_about',
		array(
			'title'    => __( '关于侧栏与页脚', 'qiyue-blog' ),
			'priority' => 35,
		)
	);
	$add_field( 'qiyue_blog_about', 'about_title', __( '关于标题', 'qiyue-blog' ) );
	$add_field( 'qiyue_blog_about', 'about_content', __( '关于简介', 'qiyue-blog' ), 'textarea', 'sanitize_textarea_field' );
	$add_field( 'qiyue_blog_about', 'footer_text', __( '页脚短句', 'qiyue-blog' ) );

	$wp_customize->add_section( 'qiyue_blog_colors', array( 'title' => __( '主题点缀色', 'qiyue-blog' ), 'priority' => 40 ) );
	$wp_customize->add_setting( 'qiyue_blog_primary_color', array( 'default' => $defaults['primary_color'], 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'qiyue_blog_primary_color', array( 'label' => __( '链接与点缀色', 'qiyue-blog' ), 'section' => 'qiyue_blog_colors' ) ) );
}
add_action( 'customize_register', 'qiyue_blog_customize_register' );
