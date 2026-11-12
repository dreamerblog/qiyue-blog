<?php
get_header();
?>
<main id="primary" class="site-main error-main">
	<div class="container error-layout">
		<div class="error-code">404</div>
		<h1><?php esc_html_e( '这一页，似乎还没有写下', 'qiyue-blog' ); ?></h1>
		<p><?php esc_html_e( '您访问的内容可能已被移动或删除。可以返回首页，或通过搜索找到想读的文字。', 'qiyue-blog' ); ?></p>
		<div class="error-actions"><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '返回首页', 'qiyue-blog' ); ?><?php echo qiyue_blog_icon( 'arrow' ); ?></a><?php get_search_form(); ?></div>
	</div>
</main>
<?php get_footer();