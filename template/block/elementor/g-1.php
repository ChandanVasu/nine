<?php 
/**
 * Elementor Template
 * @package nine
 */
?>
<div class="el-g-1-box">
    <div class="el-g-1-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <span class="el-g-1-category">
            <?php the_category(', '); ?>
        </span>
    </div>
    <h2 class="el-g-1-title">
        <a href="<?php the_permalink(); ?>">
            <?php 
            global $title_length;
            echo wp_trim_words(get_the_title(), $title_length, '...'); 
            ?>
        </a>
    </h2>
    <div class="el-g-1-excerpt excerpt">
        <?php 
        global $content_length;
        echo wp_trim_words(get_the_content(), $content_length, '...'); 
        ?>
    </div>
    <div class="el-g-1-meta-box">
        <?php
        $author_id = get_the_author_meta('ID');
        $author_avatar = get_avatar_url($author_id, ['size' => 32]);
        ?>
        <img class="el-g-1-avatar author-avatar" src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
        <a class="el-g-1-name" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
            <?php the_author(); ?>
        </a>
        <span class="el-g-1-date">
            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
        </span>
    </div>
</div>
