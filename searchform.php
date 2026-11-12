<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( '搜索：', 'qiyue-blog' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( '输入关键词…', 'qiyue-blog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
	</label>
	<button type="submit" class="search-submit" aria-label="<?php esc_attr_e( '搜索', 'qiyue-blog' ); ?>"><?php echo qiyue_blog_icon( 'search' ); ?></button>
</form>
