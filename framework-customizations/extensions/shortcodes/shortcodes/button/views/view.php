<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size'].' '. $atts['custom_class']); ?>">
	<?php echo wp_kses( $atts['label'], umodel_kses_list() ); ?>
</a>
