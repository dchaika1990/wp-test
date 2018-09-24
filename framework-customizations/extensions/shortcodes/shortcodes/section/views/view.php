<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$section_name = ( isset( $atts['section_name'] ) && $atts['section_name'] ) ? ' ' . $atts['section_name'] : $atts['unique_id'];

$link = $atts['side_media_link'];
$video = $atts['side_media_video'];
if ( $video ) {
	$link = $video;
}

$section_extra_classes = '';
$section_extra_classes .= ( isset( $atts['top_padding'] ) && $atts['top_padding'] ) ? ' ' . $atts['top_padding'] : '';
$section_extra_classes .= ( isset( $atts['bottom_padding'] ) && $atts['bottom_padding'] ) ? ' ' . $atts['bottom_padding'] : '';
$section_extra_classes .= ( isset( $atts['columns_padding'] ) && $atts['columns_padding'] ) ? ' ' . $atts['columns_padding'] : '';
$section_extra_classes .= ( isset( $atts['parallax'] ) && $atts['parallax'] ) ? ' parallax' : '';
$section_extra_classes .= ( isset( $atts['section_overlay'] ) && $atts['section_overlay'] ) ? ' section_overlay' : '';
$section_extra_classes .= ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? ' fullwidth-section' : '';
$section_extra_classes .= ( isset( $atts['horizontal_paddings'] ) && $atts['horizontal_paddings'] ) ? ' ' . $atts['horizontal_paddings'] : '';
$section_extra_classes .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$section_extra_classes .= ( isset( $atts['is_table'] ) && $atts['is_table'] ) ? ' table_section table_section_md' : '';
$section_extra_classes .= ( isset( $atts['enable_onehalf_media'] ) && $atts['enable_onehalf_media'] ) ? ' half_section' : '';

/* Add section custom class */
if( $atts['custom_class'] ) {
	$section_extra_classes .= ' '. $atts['custom_class'];
}

$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'container-fluid' : 'container';
?>
<section <?php echo ( !empty( $atts['unique_id'] )  ) ? ' id="section-' . esc_attr( $atts['unique_id'] ) . '"' : '' ;?> class="fw-main-row <?php echo esc_attr( $section_extra_classes ) ?>">
	<h3 class="hidden"><?php echo esc_attr($section_name); ?></h3>
		<?php
			if ( ! empty( $atts['side_media_image'] ) ) :
			?>
				<!--<div class="cover_image" style="background-image:url('<?php echo esc_attr($atts['side_media_image']['url'] )?>')">-->
				<div class="image_cover <?php echo ( ! empty( $atts['side_media_position'] ) ) ? esc_attr( $atts['side_media_position'] ) : '' ; ?>" style="background-image:url('<?php echo esc_attr($atts['side_media_image']['url'] )?>')">
					<?php if ( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>" <?php echo wp_kses_post(( $video ) ? ' data-gal="prettyPhoto[gal-video-'. $atts['unique_id'] .']"' : ''); ?>></a>
						<?php endif; ?>
				</div>
			<?php
		endif;
	?>
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<div class="row">
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
</section>
