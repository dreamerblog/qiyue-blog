<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="no-results not-found">
	<span class="empty-mark" aria-hidden="true">?</span>
	<h2><?php esc_html_e( '暂时没有找到相关内容', 'qiyue-blog' ); ?></h2>
	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( '换一个关键词试试，或回到首页慢慢浏览。', 'qiyue-blog' ); ?></p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( '第一篇文章正在酝酿中，欢迎稍后再来。', 'qiyue-blog' ); ?></p>
		<a class="text-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '返回首页', 'qiyue-blog' ); ?><?php echo qiyue_blog_icon( 'arrow' ); ?></a>
	<?php endif; ?>
</section>
