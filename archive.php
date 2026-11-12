<?php
get_header();
?>
<main id="primary" class="site-main">
	<header class="page-header">
		<div class="container"><p class="eyebrow"><?php esc_html_e( 'ARCHIVE', 'qiyue-blog' ); ?></p><?php the_archive_title( '<h1>', '</h1>' ); ?><?php the_archive_description( '<div class="archive-description">', '</div>' ); ?></div>
	</header>
	<div class="container content-layout section-small">
		<div class="posts-area">
			<?php if ( have_posts() ) : ?>
				<div class="post-list"><?php while ( have_posts() ) : the_post(); ?><?php get_template_part( 'template-parts/content' ); ?><?php endwhile; ?></div>
				<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( '上一页', 'qiyue-blog' ), 'next_text' => __( '下一页', 'qiyue-blog' ) ) ); ?>
			<?php else : ?><?php get_template_part( 'template-parts/content', 'none' ); ?><?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();