<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();
?>
<?php
// Start the Loop.
while ( have_posts() ) : the_post(); ?>
	<div class="col-md-6">
		<div class="vertical-item topmargin_20 bottommargin_30 with_background  content-padding overflow-hidden text-center">
			<?php the_post_thumbnail('umodel-square'); ?>
			<div class="item-content">
				<?php the_title( '<h4 class="bottommargin_10 item-title text-transform-none">', '</h4>' ); ?>
				<?php if ( ! empty( $atts['position'] ) ) : ?>
					<p class="position"><?php echo wp_kses_post( $atts['position'] ); ?></p>
				<?php endif; //position ?>

				<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
					<div class="team-social-icons">
						<?php
						if ( ! empty( $shortcodes_extension ) ) {
							echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
						}
						?>
					</div><!-- eof social icons -->
				<?php endif; //social icons ?>

			</div>
		</div><!-- .vertical-item -->
	</div><!-- .col-md-6 -->
	<div class="col-md-6">
		<div class="item-content topmargin_10 bottommargin_10 entry-content">
			<!-- .entry-header -->
			<?php the_content(); ?>

			<?php
			//member meta tabs start
			if (
				! empty( $atts['bio'] )
				||
				! empty( $atts['skills'] )
				||
				! empty( json_decode( $atts['form']['json'] )[1] )
			) :
				$tab_num = 0;
				?>
				<div class="bootstrap-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<?php
						if ( ! empty( $atts['bio'] ) ) :
							?>
							<li class="<?php echo esc_attr( $tab_num === 0  ? 'active' : ''); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Biography', 'umodel' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //bio check

						if ( ! empty( $atts['skills'] ) ) :
							?>
							<li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : ''); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Skills', 'umodel' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //bio check

						if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) :
							?>
							<li class="<?php echo esc_attr( $tab_num === 0 ? 'active' : ''); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Message', 'umodel' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //form check
						?>
					</ul>
					<div class="tab-content big-padding top-color-border">
						<?php
						$tab_num = 0;
						if ( ! empty( $atts['bio'] ) ) :
							?>
							<div
								class="tab-pane tab-member-bio fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : ''); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php echo wp_kses_post( $atts['bio'] ); ?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //bio check

						if ( ! empty( $atts['skills'] ) ) :
							?>
							<div
								class="tab-pane tab-member-skills fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : ''); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php
								foreach ( $atts['skills'] as $skill ) :
									echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
								endforeach;
								?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //skills check

						if ( ! empty( json_decode( $atts['form']['json'] )[1] ) ) :
							?>
							<div
								class="tab-pane tab-member-form fade <?php echo esc_attr( $tab_num === 0 ? 'in active' : ''); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //form check
						?>
					</div>
				</div>
			<?php endif; //tab content check ?>

			<?php if ( ! empty( $atts['additional_content'] ) ) : ?>
				<div class="member-additional-content topmargin_30">
					<?php echo wp_kses_post( $atts['additional_content'] ); ?>
				</div>
			<?php endif; //additional content ?>
		</div>
		<!-- .entry-content -->
	</div>
<?php endwhile; ?>
<?php
get_footer();