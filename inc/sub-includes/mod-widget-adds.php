<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

//additional fields to widgets
if (!function_exists('umodel_action_in_widget_form') ) :
	function umodel_action_in_widget_form( $t, $return, $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'float' => 'none' ) );

		if ( ! isset( $instance['text_align'] ) ) {
			$instance['text_align'] = null;
		}
		?>
        <p class="widget_text_align">
            <label
                    for="<?php echo esc_attr( $t->get_field_id( 'text_align' ) ); ?>"><?php esc_html_e( 'Widget Text Align:', 'umodel' ); ?>
            </label>
            <select id="<?php echo esc_attr( $t->get_field_id( 'text_align' ) ); ?>"
                    name="<?php echo esc_attr( $t->get_field_name( 'text_align' ) ); ?>" class="widefat">
                <option <?php selected( $instance['text_align'], '' ); ?> value=""><?php esc_html_e( 'Left', 'umodel' ); ?></option>
                <option <?php selected( $instance['text_align'], 'text-center' ); ?>value="text-center"><?php esc_html_e( 'Center', 'umodel' ); ?></option>
                <option <?php selected( $instance['text_align'], 'text-right' ); ?> value="text-right"><?php esc_html_e( 'Right', 'umodel' ); ?></option>
            </select>
        </p>

		<?php
		$return = null;

		return array( $t, $return, $instance );
	} //umodel_action_in_widget_form()
endif;

if( !function_exists('umodel_filter_in_widget_form_update') ) :
	function umodel_filter_in_widget_form_update( $instance, $new_instance ) {
		$instance['text_align']   = $new_instance['text_align'];
		return $instance;
	} //umodel_filter_in_widget_form_update()
endif;

if( !function_exists( 'umodel_filter_dynamic_sidebar_params' ) ):
	function umodel_filter_dynamic_sidebar_params( $params ) {

		//only for frontend
		if ( is_admin() ) {
			return $params;
		}
		global $wp_registered_widgets;

		//widget options
		$widget_id  = $params[0]['widget_id'];
		$widget_obj = $wp_registered_widgets[ $widget_id ];
		$widget_opt = get_option( $widget_obj['callback'][0]->option_name );
		$widget_num = $widget_obj['params'][0]['number'];

		$text_align  = ( !empty( $widget_opt[ $widget_num ]['text_align'] ) ) ? $widget_opt[ $widget_num ]['text_align'] : '';
		$params[0]['before_widget'] = '<div class="widget widget-theme-wrapper  ' . esc_attr( $text_align ) . '">' . $params[0]['before_widget'];
		$params[0]['after_widget']  = $params[0]['after_widget'] . '</div>';

		return $params;
	} //umodel_filter_dynamic_sidebar_params()
endif;

//Add input fields(priority 5, 3 parameters)
add_action( 'in_widget_form', 'umodel_action_in_widget_form', 5, 3 );
//Callback function for options update (priority 5, 3 parameters)
add_filter( 'widget_update_callback', 'umodel_filter_in_widget_form_update', 5, 3 );
//add class names (default priority, one parameter)
add_filter( 'dynamic_sidebar_params', 'umodel_filter_dynamic_sidebar_params', 1 );

//eof widgets additional fields