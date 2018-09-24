<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div
	class="teaser-carousel owl-carousel"
	data-loop="true"
	data-nav="<?php echo esc_attr( $atts['show_nav'] ); ?>"
	data-margin="<?php echo esc_attr( $atts['margin'] ); ?>"
	data-responsive-xs="<?php echo esc_attr( $atts['responsive_xs'] ); ?>"
	data-responsive-sm="<?php echo esc_attr( $atts['responsive_sm'] ); ?>"
	data-responsive-md="<?php echo esc_attr( $atts['responsive_md'] ); ?>"
	data-responsive-lg="<?php echo esc_attr( $atts['responsive_lg'] ); ?>"
>
	<?php foreach ( $atts['teasers'] as $teaser ): ?>
		<div class="owl-carousel-item">
			<?php
			//get teaser shortcode to render teasers inside a carousel
			echo fw_ext( 'shortcodes' )->get_shortcode( 'teaser' )->render( $teaser );
			?>
		</div><!-- eof teaser -->
	<?php endforeach; //progress_teaser ?>
</div> <!-- eof teasers carousel -->