<?php

namespace Webwolf\Services;

class Shortcode {

    public static $instance;

    /**
     * Set the shortcode name
     */

    public function __construct() {
        
        $instance = $this;
        add_shortcode( 'render_service_table', [ __CLASS__, 'renderTable' ] );
        add_shortcode( 'render_model_service_table', [ __CLASS__, 'renderModelTable' ] );
    }

    /**
	 * Create and return instance
	 *
	 * @return WebWolf_engine
	 */
	public static function instance() {

		if ( self::$instance === null ) {

			self::$instance = new self();

		}

		return self::$instance;
	}

    /**
     * Render service table using shortcode
     */
    public static function renderTable( $atts ) {

        $table_args = shortcode_atts( array(
            'service' => false,
            'device-type' => false
        ), $atts );

        if( !$table_args['service'] ) {

            global $post;

            if( !$post->post_type === 'usluga' ) {
                return;
            } 

        } else {
            $args = [
                'name' => $table_args['service'],
                'post_type' => 'usluga'
            ];
    
            $current_service = new \WP_Query( $args );
        }

        ob_start();

        include_once WW_ENGINE_DIR . 'app/Views/serviceTable.php';

        return ob_get_clean();

    }

    /**
     * Render service table using shortcode
     */
    public static function renderModelTable( $atts ) {

        $table_args = shortcode_atts( array(
            'model' => false,
        ), $atts );

        global $post;

        $current_post_ID = $post->ID;

        $args = [
            'post_type' => 'usluga'
        ];

        $current_service = new \WP_Query( $args );

        ob_start();

        include_once WW_ENGINE_DIR . 'app/Views/modelTable.php';

        return ob_get_clean();

    }

    public static function renderTableRow( $service_title, $model_title, $service_time, $replacement_price, $original_price ) {
        ?>

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

        <?php
    }
}