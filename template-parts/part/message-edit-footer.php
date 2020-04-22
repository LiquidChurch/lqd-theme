<footer class="entry-footer">
    <?php liquidchurch_entry_meta(); ?>
    <?php
    edit_post_link(
        sprintf(
        /* translators: %s: Name of current post */
            __('Edit<span class="screen-reader-text"> "%s"</span>', 'liquidchurch'),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
    ?>
</footer><!-- .entry-footer -->
