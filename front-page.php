<?php
get_header();

$paged       = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
$posts_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => (int) get_option( 'posts_per_page' ),
		'paged'               => $paged,
		'ignore_sticky_posts' => false,
	)
);
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
			<?php if ( $posts_query->have_posts() ) : ?>
				<div class="post-list">
					<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
						<?php get_template_part( 'template-parts/content' ); ?>
					<?php endwhile; ?>
				</div>
				<?php if ( $posts_query->max_num_pages > 1 ) : ?>
					<nav class="navigation pagination" aria-label="<?php esc_attr_e( '文章分页', 'qiyue-blog' ); ?>">
						<div class="nav-links">
							<?php
							echo paginate_links(
								array(
									'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'format'    => '?paged=%#%',
									'current'   => $paged,
									'total'     => $posts_query->max_num_pages,
									'mid_size'  => 1,
									'prev_text' => __( '上一页', 'qiyue-blog' ),
									'next_text' => __( '下一页', 'qiyue-blog' ),
								)
							);
							?>
						</div>
					</nav>
				<?php endif; ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();