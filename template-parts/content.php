<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<div class="entry-meta">
		<?php qiyue_blog_entry_categories(); ?>
		<?php qiyue_blog_posted_on(); ?>
		<?php if ( is_sticky() && ! is_paged() ) : ?><span class="sticky-label"><?php esc_html_e( '置顶', 'qiyue-blog' ); ?></span><?php endif; ?>
	</div>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
	<a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( '阅读全文', 'qiyue-blog' ); ?><?php echo qiyue_blog_icon( 'arrow' ); ?></a>
</article>
