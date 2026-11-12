<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %s: comment count. */
				esc_html__( '%s 条评论', 'qiyue-blog' ),
				'<span>' . esc_html( get_comments_number() ) . '</span>'
			);
			?>
		</h2>
		<ol class="comment-list"><?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true, 'avatar_size' => 48 ) ); ?></ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( '评论已关闭。', 'qiyue-blog' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'          => __( '留下您的想法', 'qiyue-blog' ),
			'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
			'class_submit'         => 'submit button',
			'comment_notes_before' => '<p class="comment-notes">' . __( '您的电子邮箱不会被公开。', 'qiyue-blog' ) . '</p>',
		)
	);
	?>
</div>
