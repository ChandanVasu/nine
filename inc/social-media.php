<?php 
/**
 * Socail Post Share
 * @package nine
 */
?>
<?php

function social_media_share_one() {
    ?>
    <div class="share-icon-cont">
        <ul class="share-icons">
            <li><a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"
                    rel="noopener noreferrer"><i class="nine-brand vt-facebook"></i></a></li>
            <li><a class="x-icon" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                    target="_blank" rel="noopener noreferrer"><i class="nine-brand vt-x"></i></a></li>
            <li><a class="linkedin-icon" href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"
                    target="_blank" rel="noopener noreferrer"><i class="nine-brand vt-linkedin"></i></a></li>
            <li><a class="pinterest-icon" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo urlencode(wp_get_attachment_url(get_post_thumbnail_id())); ?>&description=<?php echo urlencode(get_the_title()); ?>"
                    target="_blank" rel="noopener noreferrer"><i class="nine-brand vt-pinterest"></i></a></li>
        </ul>
    </div>
    <?php
}