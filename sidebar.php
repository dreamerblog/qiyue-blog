<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( '博客侧边栏', 'qiyue-blog' ); ?>">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<section class="widget about-widget">
			<span class="about-monogram" aria-hidden="true">Q</span>
			<h2 class="widget-title"><?php echo esc_html( qiyue_blog_mod( 'about_title' ) ); ?></h2>
			<p><?php echo esc_html( qiyue_blog_mod( 'about_content' ) ); ?></p>
			<div class="about-signature"><?php esc_html_e( 'KEEP WRITING, KEEP LIVING.', 'qiyue-blog' ); ?></div>
		</section>
		<section class="widget widget_search">
			<h2 class="widget-title"><?php esc_html_e( '搜索文章', 'qiyue-blog' ); ?></h2>
			<?php get_search_form(); ?>
		</section>
		<section class="widget widget_categories">
			<h2 class="widget-title"><?php esc_html_e( '文章分类', 'qiyue-blog' ); ?></h2>
			<ul><?php wp_list_categories( array( 'title_li' => '', 'show_count' => true ) ); ?></ul>
		</section>
	<?php endif; ?>
</aside>
