<aside id="sidebar" class="widget-area">
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <p>No widgets added to this sidebar yet.</p>
    <?php endif; ?>
</aside>
