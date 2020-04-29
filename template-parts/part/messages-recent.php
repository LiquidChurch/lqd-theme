<?php if (!isset($_GET['sermon-search'])) : ?>
    <hr/>
    <h1>Most Recent Messages</h1>
    <p><?php do_action('gc_sermons',
            array('per_page' => '4',
                  'remove_pagination' => true,
                  'content' => 'excerpt',
                  'thumbnail_size' => 'medium',
                  'number_columns' => 4)); ?></p>
<?php endif; ?>
<hr/>
