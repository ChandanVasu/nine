<?php
// If the current post is password protected, stop here.
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                echo esc_html__('1 Reply', 'yourthemename');
            } else {
                printf(
                    esc_html(_n(
                        '%1$s Comments',
                        '%1$s Comments',
                        $comments_number,
                        'comments title',
                        'yourthemename'
                    )),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h2><!-- .comments-title -->


        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
                'callback'    => 'custom_comment_output' // Specify the custom callback function
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'yourthemename'); ?></p>
        <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    $aria_req = ( $req ? " aria-required='true'" : '' ); // Define $aria_req variable

    // Modify the comment form to replace labels with placeholders
    comment_form(array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
        'comment_field' => '<p class="comment-form-comment">' .
                '<textarea id="comment" name="comment" placeholder="' . esc_attr__('Your Comment', 'domainname') . '" cols="45" rows="8" aria-required="true"></textarea>' .
                '</p>',
        'fields' => array(
            'author' => '<p class="comment-form-author">' .
                '<input id="author" name="author" type="text" placeholder="' . esc_attr__('Name', 'domainname') . '" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />' .
                '</p>',
            'email'  => '<p class="comment-form-email">' .
                '<input id="email" name="email" type="email" placeholder="' . esc_attr__('Email', 'domainname') . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />' .
                '</p>',
            'cookies' => '',
        ),
    ));
    ?>

</div><!-- #comments -->

<?php
// Custom callback function to display each comment with a custom class
function custom_comment_output($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('custom-comment-class'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-content">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, 48); ?>
                <div>
                    <p class="comment-user-name"><?php echo get_comment_author_link(); ?></p>
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                            <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                        </a>
                        <?php edit_comment_link(__('(Edit)', 'yourthemename'), '  ', ''); ?>
                    </div>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'yourthemename'); ?></p>
                        <br />
                    <?php endif; ?>
                </div>
            </div>


            <div class="comment-text">
                <?php comment_text(); ?>
            </div>

            <div class="reply">
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )));
                ?>
            </div>
        </div>
    <?php
}
?>
