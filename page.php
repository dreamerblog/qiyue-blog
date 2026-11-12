<?php
get_header();
?>
<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-header"><div class="container reading-container"><p class="eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p><h1><?php the_title(); ?></h1></div></header>
		<div class="container reading-container section-small">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-page' ); ?>>
				<?php qiyue_blog_post_thumbnail( 'full' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( '分页：', 'qiyue-blog' ), 'after' => '</div>' ) ); ?>
				</div>
			</article>
			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
		</div>
	<?php endwhile; ?>
</main>
<?php get_footer();