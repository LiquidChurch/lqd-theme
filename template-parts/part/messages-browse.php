<?php if (!isset($_GET['sermon-search'])) : ?>
    <hr/>
    <h1>Browse Message Archive</h1>
    <p><?php do_action('gc_series', array(
            'paging_by' => "per_year",
            'show_num_years_first_page' => 2,
            'paging_init_year' => date('Y')
        )); ?>
    </p>
<?php endif; ?>
