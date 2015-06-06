<?php

// Comment Layout
function wpbss_bootstrap_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
        <article id="comment-<?php comment_ID(); ?>" class="clearfix">
            <div class="avatar pull-left">
                <?php echo get_avatar( $comment, $size='75' ); ?>
            </div>
            <div class="comment-data pull-left">
                <div class="comment-meta">
                    <span class="date-comment comment-meta-item">
                        <?php printf('<strong class="media-heading author-name">%s</strong>', get_comment_author_link()) ?>
                    </span>
                    <span class="date-comment comment-meta-item">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('d-m-Y'); ?> </a></time>
                    </span>
                    <span class="comment_reply_link comment-meta-item">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </span>
                    <span class="edit_comment_link comment-meta-item">
                        <?php edit_comment_link(__('Edit','wpbss'),'<span class="edit-comment">','</span>') ?>
                    </span>
                </div>

                <?php if ($comment->comment_approved == '0') : ?>
                    <div class="alert-message success">
                        <p><?php _e('Your comment is awaiting moderation.','wpbss') ?></p>
                    </div>
                <?php endif; ?>
                <div class="comment_text panel panel-default ">
                    <div class="panel-body">
                        <?php comment_text() ?>
                    </div>
                </div>
            </div>
        </article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

//Add class media for comment item
function comment_class_cb_wpbss($classes, $class, $comment_id, $comment, $post_id ) {
    $classes[] = 'media';
    return $classes;
}
add_filter( 'comment_class', 'comment_class_cb_wpbss', 10, 5);