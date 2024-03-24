<aside id="sidebar" class="widget-area">
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php else : ?>
        <!-- This will be displayed if there are no widgets in the sidebar -->
        <p>No widgets added to this sidebar yet.</p>
    <?php endif; ?>
</aside>
