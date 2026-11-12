<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( '跳转到主要内容', 'qiyue-blog' ); ?></a>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container header-inner">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="brand-mark" aria-hidden="true">Q</span>
						<span class="brand-copy">
							<strong><?php bloginfo( 'name' ); ?></strong>
							<?php $description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $description ) : ?><small><?php echo esc_html( $description ); ?></small><?php endif; ?>
						</span>
					</a>
				<?php endif; ?>
			</div>

			<button class="search-toggle" type="button" aria-controls="header-search" aria-expanded="false">
				<?php echo qiyue_blog_icon( 'search' ); ?>
				<span class="screen-reader-text"><?php esc_html_e( '打开或关闭搜索', 'qiyue-blog' ); ?></span>
			</button>
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-toggle-lines" aria-hidden="true"><i></i><i></i><i></i></span>
				<span class="screen-reader-text"><?php esc_html_e( '打开或关闭导航', 'qiyue-blog' ); ?></span>
			</button>

			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( '主导航', 'qiyue-blog' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'qiyue_blog_menu_fallback',
					)
				);
				?>
			</nav>
		</div>
		<div id="header-search" class="header-search" hidden>
			<div class="container header-search-inner">
				<span><?php esc_html_e( '搜索文章、笔记与灵感', 'qiyue-blog' ); ?></span>
				<?php get_search_form(); ?>
			</div>
		</div>
	</header>
