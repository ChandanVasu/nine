<?php
/**
 * The comments template file
 *
 * This template is used to display comments and the comment form.
 *
 * @package nine
 */
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
            echo esc_html(
                sprintf(
                    _nx('%1$s Reply', '%1$s Comments', $comments_number, 'comments title', 'nine'),
                    number_format_i18n($comments_number)
                )
            );
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
                'callback'    => 'custom_comment_output'
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'nine'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    $aria_req = $req ? " aria-required='true'" : '';

    comment_form(array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
        'comment_field'      => '<p class="comment-form-comment">' .
            '<textarea id="comment" name="comment" placeholder="' . esc_attr__('Your Comment', 'nine') . '" cols="45" rows="8" aria-required="true"></textarea>' .
            '</p>',
        'fields'             => array(
            'author' => '<p class="comment-form-author">' .
                '<input id="author" name="author" type="text" placeholder="' . esc_attr__('Name', 'nine') . '" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />' .
                '</p>',
            'email'  => '<p class="comment-form-email">' .
                '<input id="email" name="email" type="email" placeholder="' . esc_attr__('Email', 'nine') . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />' .
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
    <li <?php comment_class('comment-class-nine'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-content-nine">
            <div class="comment-author-nine vcard-nine">
                <?php echo get_avatar($comment, 48); ?>
                <div class='comment-name-and-date-metabox-nine'>
                    <p class="comment-user-name-nine"><?php echo get_comment_author_link(); ?></p>
                    <div class="comment-meta-nine commentmetadata-nine">
                        <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                            <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                        </a>
                        <?php edit_comment_link(__('(Edit)', 'nine'), ' ', ''); ?>
                    </div>
                    <?php if ($comment->comment_approved === '0') : ?>
                        <p class="comment-awaiting-moderation-nine"><?php esc_html_e('Your comment is awaiting moderation.', 'nine'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="comment-text-nine">
                <?php comment_text(); ?>
            </div>
            <div class="reply-nine">
                <?php comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                ))); ?>
            </div>
        </div>
    </li>
    <?php
}
?>