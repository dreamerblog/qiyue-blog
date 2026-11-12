<?php
get_header();
?>
<main id="primary" class="site-main">
	<section class="blog-intro">
		<div class="container intro-layout">
			<div>
				<p class="eyebrow"><?php echo esc_html( qiyue_blog_mod( 'intro_eyebrow' ) ); ?></p>
				<h1><?php echo nl2br( esc_html( qiyue_blog_mod( 'intro_title' ) ) ); ?></h1>
			</div>
			<div class="intro-copy">
				<p><?php echo esc_html( qiyue_blog_mod( 'intro_description' ) ); ?></p>
				<a class="text-link" href="#latest"><?php esc_html_e( '开始阅读', 'qiyue-blog' ); ?><?php echo qiyue_blog_icon( 'arrow' ); ?></a>
			</div>
		</div>
	</section>
	<div id="latest" class="container content-layout section-small">
		<div class="posts-area">
			<div class="section-heading"><h2><?php esc_html_e( '最新文章', 'qiyue-blog' ); ?></h2><span><?php esc_html_e( 'RECENT NOTES', 'qiyue-blog' ); ?></span></div>
			<?php if ( have_posts() ) : ?>
				<div class="post-list">
					<?php while ( have_posts() ) : the_post(); ?><?php get_template_part( 'template-parts/content', get_post_type() ); ?><?php endwhile; ?>
				</div>
				<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( '上一页', 'qiyue-blog' ), 'next_text' => __( '下一页', 'qiyue-blog' ) ) ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();