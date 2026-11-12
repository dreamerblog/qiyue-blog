<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qiyue_blog_icon( $name ) {
	$paths = array(
		'arrow'  => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
		'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>',
	);

	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%s</svg>',
		$paths[ $name ]
	);
}

function qiyue_blog_posted_on() {
	printf(
		'<span class="meta-item"><a href="%1$s"><time datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

function qiyue_blog_posted_by() {
	printf(
		'<span class="meta-item">%1$s <a href="%2$s">%3$s</a></span>',
		esc_html__( '作者', 'qiyue-blog' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

function qiyue_blog_entry_categories() {
	$categories = get_the_category_list( '' );
	if ( $categories ) {
		printf( '<div class="entry-categories">%s</div>', wp_kses_post( $categories ) );
	}
}

function qiyue_blog_post_thumbnail( $size = 'large' ) {
	if ( ! has_post_thumbnail() || post_password_required() || is_attachment() ) {
		return;
	}
	?>
	<div class="post-thumbnail"><?php the_post_thumbnail( $size, array( 'loading' => 'eager' ) ); ?></div>
	<?php
}

function qiyue_blog_entry_footer() {
	$tags = get_the_tag_list( '', '' );
	if ( $tags ) {
		printf( '<div class="entry-tags">%s</div>', wp_kses_post( $tags ) );
	}
}
