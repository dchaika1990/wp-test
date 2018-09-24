<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

switch ( $atts['testimonials_group']['testimonials_layout'] ):
	//flexslider layout
	case 'testimonials_carousel':
		$autoplay = isset($atts['testimonials_group']['testimonials_carousel']['carousel_autoplay']) ? $atts['testimonials_group']['testimonials_carousel']['carousel_autoplay'] : true;
		$autoplay_timeout = isset($atts['testimonials_group']['testimonials_carousel']['autoplay_timeout']) ? $atts['testimonials_group']['testimonials_carousel']['autoplay_timeout'] : 3000;
		?>
		<div class="testimonials owl-carousel testimonials-carousel"
             data-nav="1"
             data-loop="1"
             data-autoplay="<?php echo esc_html( $autoplay ); ?>"
             data-autoplaytimeout="<?php echo esc_html( $autoplay_timeout ); ?>"
             data-responsive-xs="1"
             data-responsive-sm="1"
		     data-responsive-md="1"
             data-responsive-lg="1">
			<?php
			$testimonials = $atts['testimonial_details'];
			foreach ( $testimonials as $testimonial ): ?>
                <blockquote class="blockquote-big">
					<?php
					$author_image_url = ! empty( $testimonial['author_avatar']['url'] )
						? $testimonial['author_avatar']['url']
						: fw_get_framework_directory_uri( '/static/img/no-image.png' );
					?>
					<div class="avatar">
						<img src="<?php echo esc_attr( $author_image_url ); ?>"
						     alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
					</div>
					<h4	class="author-name"><?php echo esc_html( $testimonial['author_name'] ); ?></h4>
					<span class="blockqoute-meta">
						<span
							class="author-job"><?php echo esc_html( $testimonial['author_job'] || $testimonial['site_name'] ) ? '' : ''; ?>
							<?php echo esc_html( $testimonial['author_job'] ); ?>
							<?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
							<?php if ( $testimonial['site_url'] ) : ?>
							<a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
								<?php endif; //site_url
								?>
								<?php echo esc_html( $testimonial['site_name'] ); ?>
								<?php if ( $testimonial['site_url'] ) : ?>
							</a>
							<?php endif; //site_url ?>
						</span>
					</span>
                    <div class="blockqoute-content">
						<?php echo esc_html( $testimonial['content'] ); ?>
                    </div>
				</blockquote>
			<?php endforeach; ?>
		</div>
		<?php
		break; //eof big owl-carousel testimonials layout

	//grid layout
	case 'testimonials_grid':
		?>
		<div class="testimonials testimonials-grid row columns_padding_30">
			<?php
			$testimonials = $atts['testimonial_details'];
			foreach ( $testimonials as $testimonial ): ?>
				<div class="fw-testimonials-item col-xs-12 col-sm-6 text-center bottommargin_40">
						<?php
						$author_image_url = ! empty( $testimonial['author_avatar']['url'] )
							? $testimonial['author_avatar']['url']
							: fw_get_framework_directory_uri( '/static/img/no-image.png' );
						?>
						<div class="avatar">
							<img src="<?php echo esc_attr( $author_image_url ); ?>"
							     alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
						</div>
						<h4 class="author-name"><?php echo esc_html( $testimonial['author_name'] ); ?></h4>
						<span class="blockqoute-meta">
							<span
								class="author-job"><?php echo esc_html( $testimonial['author_job'] || $testimonial['site_name'] ) ? '' : ''; ?>
								<?php echo esc_html( $testimonial['author_job'] ); ?>
								<?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
								<?php if ( $testimonial['site_url'] ) : ?>
								<a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
									<?php endif; //site_url
									?>
									<?php echo esc_html( $testimonial['site_name'] ); ?>
									<?php if ( $testimonial['site_url'] ) : ?>
								</a>
							<?php endif; //site_url ?>
							</span>
						</span>
                        <div class="blockqoute-content">
							<?php echo esc_html( $testimonial['content'] ); ?>
                        </div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
		break; //eof testimonials grid layout
endswitch;

