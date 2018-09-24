<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$class = fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );

$class .= ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? ' to_animate' : '';
$class .= ( ! empty( $atts['column_align'] ) ) ? ' ' . $atts['column_align'] : '';
$class .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$data_animation = ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? 'data-animation="' . esc_attr( $atts['column_animation'] ) . '"' : '';

/* Add custom class */
if( $atts['custom_class'] ) {
	$class .= ' '. $atts['custom_class'];
}

?>
<div <?php echo ( !empty( $atts['column_id'] )  ) ? ' id="column-' . esc_attr( $atts['column_id'] ) . '"' : '' ;?> class="<?php echo esc_attr( $class ); ?> fw-column" <?php echo wp_kses_post( $data_animation ); ?>>
	<?php
	if ( ! empty( $atts['column_padding'] ) ) :
	?>
	<div class="<?php echo esc_attr( $atts['column_padding']); ?>">
		<?php endif; //column_padding
		//shoing column content
		echo do_shortcode( $content );
		if ( ! empty( $atts['column_padding'] ) ) : //closing optional column_padding div
		?>
	</div>
<?php endif; ?>
</div>
