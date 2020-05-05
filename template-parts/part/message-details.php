 <?php
 global $sermon;
 $sermon = gc_get_sermon_post();
 $message_field_to_display = array();
 // Get Configure Options for Liquid Messages Plugin
 $plugin_option = GC_Sermons_Plugin::get_plugin_settings_options('single_message_view');
 // Get a list of the message fields to display TODO: Add documentation
 if (!empty($plugin_option)) {
     {
         $message_field_to_display = ! empty( $plugin_option['message_field_to_display'] ) ? $plugin_option['message_field_to_display'] : array();
     }
 }
 ?>
 <header class="py-3">
     <?php // If Title Option is Enabled
     if (in_array('title', $message_field_to_display)) { ?>
         <div class="lqdm-single-msg-title col-xs-12 col-md-9 d-flex float-left">
             <?php the_title( '<h1 class="lqdm-msg-title">', '</h1>'); ?>
         </div>
         <div class="lqd-social-share col-xs-12 col-md-3 d-flex justify-content-center">
             <?php get_template_part( 'template-parts/part/social', 'action-bar'); ?>
         </div>
         <?php // If Message Image Option is Selected
         if (in_array('sermon_image', $message_field_to_display)) { ?>
             <div class="col-xs-12">
                 <?php echo wp_get_attachment_image($sermon->featured_image_id(), 'full', false, array(
                     'class' => 'lqd-series-list-msgs-img',
                     'style' => 'width:100%;',
                 )); ?>
             </div>
         <?php } ?>
 </header>
 <div class="lqdm-single-msg-details col-xs-12">

 </div>
 <?php } ?>

        <?php // If Show Series Option Enabled
        if (in_array('series', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'series');
        } ?>

        <?php // If Show Speaker Option is Enabled
        if (in_array('speakers', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'speaker');
        } ?>

        <?php // If Part of Series Option is Enabled
        $exclude_msg = $sermon->get_meta('gc_exclude_msg');
        if (in_array('part_of_series', $message_field_to_display)
            && ($exclude_msg != 'on')
        ) {
            get_template_part('template-parts/part/sermons/list', 'series-part');
        } ?>

        <?php // If Scripture Reference Option is Enabled
        if (in_array('scripture_reference', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'scripture');
        } ?>

        <?php // If Topics Option is Enabled
        if (in_array('topics', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'topics');
        } ?>

        <?php // If Tags Option is Enabled
        if (in_array('tags', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'tags');
        } ?>

        <?php // If Summary Option is Enabled
        if (in_array('description', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'summary');
        } ?>

        <?php // If Date Option is Enabled
        if (in_array('date', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'date');
        } ?>

        <?php // If Additional Resources Option is Enabled
        if (in_array('additional_resource', $message_field_to_display)) {
            get_template_part('template-parts/part/sermons/list', 'addtnl-resource');
        } ?>
    </div>
</div>
