<?php if ( post_password_required() ) return; ?>
<div class="scfb-comments">
	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2><p class="comment-count">' . get_comments_number() . ' Comments</p>',
			'class_submit' => 'btn btn-dark-green',
		) );
	?>
	<?php the_comments_navigation(); ?>
	<ul class="scfb-comment-list">
		<?php
			global $scf_functions;
			wp_list_comments( array (
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 50,
				'callback' => array( $scf_functions, "socialcatfish_comment_walker" ),
			) );
		?>
	</ul>
	<?php the_comments_navigation(); ?>
</div>