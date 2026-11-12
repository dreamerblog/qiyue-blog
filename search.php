<?php
get_header();
?>
<main id="primary" class="site-main">
	<header class="page-header">
		<div class="container"><p class="eyebrow"><?php esc_html_e( 'SEARCH', 'qiyue-blog' ); ?></p><h1><?php printf( esc_html__( '“%s”的搜索结果', 'qiyue-blog' ), esc_html( get_search_query() ) ); ?></h1><p><?php esc_html_e( '在文字里，找到与你有关的内容。', 'qiyue-blog' ); ?></p></div>
	</header>
	<div class="container content-layout section-small">
		<div class="posts-area">
			<?php if ( have_posts() ) : ?>
				<div class="post-list"><?php while ( have_posts() ) : the_post(); ?><?php get_template_part( 'template-parts/content', 'search' ); ?><?php endwhile; ?></div>
				<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( '上一页', 'qiyue-blog' ), 'next_text' => __( '下一页', 'qiyue-blog' ) ) ); ?>
			<?php else : ?><?php get_template_part( 'template-parts/content', 'none' ); ?><?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();