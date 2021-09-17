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
                'post_type' => 'usluga',
                'posts_per_page'   => -1,
            ];

            $current_service = new \WP_Query( $args );
        }

        ob_start();

        include WW_ENGINE_DIR . 'app/Views/serviceTable.php';

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
            'posts_per_page'   => -1,
            'post_type' => 'usluga',
            
        ];

        $current_service = new \WP_Query( $args );

        ob_start();

        include WW_ENGINE_DIR . 'app/Views/modelTable.php';

        return ob_get_clean();

    }

    public static function renderTableRow( $service_title, $model_title, $service_time, $replacement_price, $original_price, $service_description = false, $post_ID ) {
        ?>

        <tr>
            <td>
                <div class="ww-service-title">

                    <?php echo '<a class="ww-service-title-link" href="' . get_permalink( $post_ID ) . '">' . $service_title . ' ' . $model_title . '</a>'; ?>

                </div>

                <?php

                    if( $service_description ) {
                        ?>
                            <div class="ww-service-description">

                                <?php echo $service_description; ?>

                            </div>
                        <?php
                    }
                ?>
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