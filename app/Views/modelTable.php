<div class="ww-service-table">
    <table>
        <thead>
            <tr>
                <th><?php _e( 'Model', 'webwolf-engine' ) ?></th>
                <th><?php _e( 'Czas naprawy', 'webwolf-engine' ) ?></th>
                <th><?php _e( 'Cena zamiennik', 'webwolf-engine' ) ?></th>
                <th><?php _e( 'Cena oryginał', 'webwolf-engine' ) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if( $current_service->have_posts() ) {
                    while( $current_service->have_posts() ) {
                        $current_service->the_post();

                        if( have_rows('service_repeater') ) {
                            while( have_rows('service_repeater') ) {
                                the_row();

                                if( get_sub_field('model_name') === $current_post_ID ) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo get_the_title() . ' ' . get_the_title( $current_post_ID ); ?>
                                        </td>
                                        <td>
                                            <?php echo get_sub_field('repair_time'); ?>
                                        </td>
                                        <td>
                                            <?php echo get_sub_field('replacemet_part_price'); ?>
                                        </td>
                                        <td>
                                            <?php echo get_sub_field('original_part_price'); ?>
                                        </td>
                                    </tr>

                                    <?php
                                }

                            }
                        }
                    
                    }
                }
            ?>
        </tbody>
    </table>   
</div>

