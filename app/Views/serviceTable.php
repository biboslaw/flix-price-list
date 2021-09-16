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

                if( !$table_args['service'] ) {

                    if( have_rows('service_repeater') ) {

                        while( have_rows('service_repeater') ) {

                            the_row();

                            self::renderTableRow( get_the_title(), get_the_title( get_sub_field('model_name') ), get_sub_field('repair_time'), get_sub_field('replacemet_part_price'), get_sub_field('original_part_price') );

                        }
                    }

                 } else {

                    if( $current_service->have_posts() ) {

                        while( $current_service->have_posts() ) {

                            $current_service->the_post();

                            if( have_rows('service_repeater') ) {

                                while( have_rows('service_repeater') ) {

                                    the_row();

                                    $associated_terms_slugs = wp_get_post_terms( get_sub_field('model_name'), 'device-types', ['fields'=>'slugs']);

                                    if( in_array( $table_args['device-type'], $associated_terms_slugs ) ) {

                                        self::renderTableRow( get_the_title(), get_the_title( get_sub_field('model_name') ), get_sub_field('repair_time'), get_sub_field('replacemet_part_price'), get_sub_field('original_part_price') );

                                    }
                                }
                            }
                        }
                    }
                 }



            ?>
        </tbody>
    </table>   
</div>

