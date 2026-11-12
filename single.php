<?php
get_header();
?>
<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-header single-header">
			<div class="container reading-container">
				<?php qiyue_blog_entry_categories(); ?>
				<h1><?php the_title(); ?></h1>
				<div class="entry-meta"><?php qiyue_blog_posted_on(); ?><?php qiyue_blog_posted_by(); ?></div>
			</div>
		</header>
		<div class="container content-layout section-small">
			<div class="posts-area">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-single' ); ?>>
					<?php qiyue_blog_post_thumbnail( 'full' ); ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( '分页：', 'qiyue-blog' ), 'after' => '</div>' ) ); ?>
					</div>
					<?php qiyue_blog_entry_footer(); ?>
				</article>
				<?php the_post_navigation( array( 'prev_text' => '<span>' . esc_html__( '上一篇', 'qiyue-blog' ) . '</span><strong>%title</strong>', 'next_text' => '<span>' . esc_html__( '下一篇', 'qiyue-blog' ) . '</span><strong>%title</strong>' ) ); ?>
				<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	<?php endwhile; ?>
</main>
<?php get_footer();