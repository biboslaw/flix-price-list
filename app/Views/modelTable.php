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

                                    self::renderTableRow( get_the_title(), get_the_title( $current_post_ID ), get_sub_field('repair_time'), get_sub_field('replacemet_part_price'), get_sub_field('original_part_price'), get_sub_field('service_description'), get_sub_field('model_name') );

                                }

                            }
                        }
                    
                    }
                }
            ?>
        </tbody>
    </table>   
</div>

