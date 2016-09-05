<div class="gc-sermon-resources-wrap <?php $this->output('resource_extra_classes', 'esc_attr'); ?>">
    <ul class="gc-sermon-resources-list">
        <?php
        $items = $this->get('items');
        $resource_lang = $this->get('resource_lang');
        $lc_list_style = '1' == count($items) ? 'width: 100%;' : '';
        $lc_container_class = '1' == count($items) ? 'single-item' : '';
        foreach ($items as $key => $item) {
            printf('<li class="lc-list" style="%s">', $lc_list_style);
            printf('<ul class="lc-container %s">', $lc_container_class);
            printf('<li class="lc-head">%s</li>', $resource_lang[$key]);
            foreach ($item as $ik => $iv) {
                echo $iv;
            }

            printf('</ul>');
            printf('</li>');
        }
        ?>
    </ul>
</div>
