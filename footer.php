<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer id="colophon" class="site-footer">
		<div class="container footer-main">
			<div class="footer-brand">
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="brand-mark" aria-hidden="true">Q</span>
					<span class="brand-copy"><strong><?php bloginfo( 'name' ); ?></strong></span>
				</a>
				<p><?php echo esc_html( qiyue_blog_mod( 'footer_text' ) ); ?></p>
			</div>
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widgets"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<?php else : ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-menu',
						'fallback_cb'    => false,
						'depth'          => 1,
					)
				);
				?>
			<?php endif; ?>
		</div>
		<div class="container footer-bottom">
			<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( '保留所有权利', 'qiyue-blog' ); ?></p>
			<div>
				<span><?php esc_html_e( 'Powered by WordPress', 'qiyue-blog' ); ?></span>
				<span><?php esc_html_e( 'Qiyue Blog · 启越简记', 'qiyue-blog' ); ?></span>
				<?php if ( get_privacy_policy_url() ) : ?><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( '隐私政策', 'qiyue-blog' ); ?></a><?php endif; ?>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
