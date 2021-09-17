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

            <tr>
                <td>
                    <?php echo $service_title . ' ' . $model_title ?>
                </td>
                <td>
                    <?php echo $service_time ?>
                </td>
                <td>
                    <?php echo $replacement_price ?>
                </td>
                <td>
                    <?php echo $original_price ?>
                </td>
            </tr>
        </tbody>
    </table>   
</div>