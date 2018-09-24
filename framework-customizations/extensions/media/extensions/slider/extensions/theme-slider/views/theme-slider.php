<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<?php
if ( isset( $data['slides'] ) ):
	$autoplay = isset( $data['settings']['extra']['slider_autoplay'] ) ? $data['settings']['extra']['slider_autoplay'] : true;
	$slider_speed = isset( $data['settings']['extra']['slider_speed'] ) ? $data['settings']['extra']['slider_speed'] : '3000';
	?>
	<section class="intro_section page_mainslider">
		<div class="flexslider"  data-slideshow="<?php echo esc_attr( $autoplay ); ?>" data-slideshowspeed="<?php echo esc_attr( $slider_speed ); ?>">
			<ul class="slides">
				<?php foreach ( $data['slides'] as $id => $slide ):
				$slide_background = isset( $slide['extra']['slide_background'] ) ? $slide['extra']['slide_background'] : false;
				$slide_align      = isset( $slide['extra']['slide_align'] ) ? $slide['extra']['slide_align'] : false;
				$slide_layers     = isset( $slide['extra']['slide_layers'] ) ? $slide['extra']['slide_layers'] : false;

				$slide_button           = isset( $slide['extra']['slide_button'] ) ? $slide['extra']['slide_button'] : false;
				$slide_button_text      = isset( $slide['extra']['slide_button_text'] ) ? $slide['extra']['slide_button_text'] : false;
				$slide_button_animation = isset( $slide['extra']['slide_button_animation'] ) ? $slide['extra']['slide_button_animation'] : false;
				$slide_button_link      = isset( $slide['extra']['slide_button_link'] ) ? $slide['extra']['slide_button_link'] : false;
				?>
				<li class="<?php echo esc_attr( $slide_background ); ?> <?php echo esc_attr( $slide_align ); ?>">
					<img src="<?php echo esc_attr( $slide['src'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ) ?>">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="slide_description_wrapper">
									<?php if ( $slide_layers || $slide_button ) : ?>
									<div class="slide_description">
										<?php
										foreach ( $slide_layers as $layer ):
										?>
										<div class="intro-layer <?php echo esc_attr( $layer['custom_class'] ); ?>"
										     data-animation="<?php echo esc_attr( $layer['layer_animation'] ); ?>">
											<<?php echo esc_attr( $layer['layer_tag'] ); ?>
											class="<?php echo esc_attr(( $layer['layer_tag'] == 'p' ) ? 'small' : ''); ?> <?php echo esc_attr( $layer['layer_text_color'] ); ?> <?php echo esc_attr( $layer['layer_text_weight'] ); ?> <?php echo esc_attr( $layer['layer_text_transform'] ); ?>
											">
											<?php echo wp_kses_post( $layer['layer_text'] ) ?>
										</<?php echo esc_attr( $layer['layer_tag'] ); ?>>
									</div>
								<?php
								endforeach;
								?>
									<div class="intro-layer button button_1"
									     data-animation="<?php echo esc_attr( $slide_button_animation ); ?>">
										<a href="<?php echo esc_url( $slide_button_link ); ?>"
										   class="<?php echo esc_attr( $slide_button ); ?>"><?php echo wp_kses( $slide_button_text, umodel_kses_list() ); ?></a>
									</div>

								</div> <!-- eof .slide_description -->
								<?php endif; ?>
							</div> <!-- eof .slide_description_wrapper -->
						</div> <!-- eof .col-* -->
					</div><!-- eof .row -->
		</div><!-- eof .container -->
		</li>
		<?php endforeach; ?>
		</ul>
		</div> <!-- eof flexslider -->
	</section> <!-- eof intro_section -->
<?php endif; ?>