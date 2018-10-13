<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$teaser_type   = isset( $atts['teaser_types']['teaser_type'] ) ? $atts['teaser_types']['teaser_type'] : false;
$teaser_image  = isset( $atts['teaser_types'][ $teaser_type ]['teaser_image'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_image'] : false;
$icon          = isset( $atts['teaser_types'][ $teaser_type ]['icon'] ) ? $atts['teaser_types'][ $teaser_type ]['icon'] : false;
$icon_size     = isset( $atts['teaser_types'][ $teaser_type ]['icon_size'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_size'] : 'size_small';
$icon_style    = isset( $atts['teaser_types'][ $teaser_type ]['icon_style'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_style'] : false;
$icon_color    = isset( $atts['teaser_types'][ $teaser_type ]['icon_color'] ) ? $atts['teaser_types'][ $teaser_type ]['icon_color'] : false;
//$teaser_center = isset( $atts['teaser_types'][ $teaser_type ]['teaser_center'] ) ? $atts['teaser_types'][ $teaser_type ]['teaser_center'] : false;

//for counter teaser
$number                  = isset( $atts['teaser_types'][ $teaser_type ]['number'] ) ? ( int ) $atts['teaser_types'][ $teaser_type ]['number'] : false;
$counter_additional_text = isset( $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] ) ? $atts['teaser_types'][ $teaser_type ]['counter_additional_text'] : false;
$speed                   = isset( $atts['teaser_types'][ $teaser_type ]['speed'] ) ? $atts['teaser_types'][ $teaser_type ]['speed'] : false;

//common teaser properties for all teaser types
$title        = $atts['title'];
$link         = $atts['link'];
$content      = $atts['content'];

switch ( $teaser_type ) :

	case 'image_top':
		?>
	<div class="teaser text-center">
		<?php if ( $teaser_image ) : ?>
		<div class="teaser_image">
            <?php echo umodel_get_icon_type_v2_html( $teaser_image ); ?>
		</div>
	<?php endif; //teaser_image 
		?>
		<?php if ( $title ): ?>
        <h5 class="media-heading">
		<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php endif; //$link ?>
		<?php echo wp_kses_post( $title ); ?>
		<?php if ( $link ): ?>
			</a>
		<?php endif; //$link ?>
		</h5>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<div>
			<?php echo wp_kses_post( $content ); ?>
		</div>
	<?php endif; //$content 
		?>
		</div>

		<?php
		break; //image_top


	//left image layout
	case 'image_left':
		?>
		<div class="teaser media">
			<?php if ( $teaser_image ) : ?>
				<div class="media-left">
					<div class="teaser_image">
                        <?php echo umodel_get_icon_type_v2_html( $teaser_image ); ?>
					</div>
				</div>
			<?php endif; //teaser_image 
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
				<h5 class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</h5>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content 
			?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //image_left

	//right image layout
	case 'image_right':
		?>
		<div class="teaser media text-right">

			<div class="media-body">
				<?php if ( $title ): ?>
				<h5 class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</h5>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content 
			?>
		</div><!-- eof .media-body -->
		<?php if ( $teaser_image ) : ?>
		<div class="media-right">
			<div class="teaser_image">
                <?php echo umodel_get_icon_type_v2_html( $teaser_image ); ?>
			</div>
		</div>
	<?php endif; //teaser_image 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //image_right


	//left icon layout
	case 'icon_left':
		?>
		<div class="teaser media">
			<?php if ( $icon ) : ?>
				<div class="media-left media-top">
					<div class="teaser_icon">
						<?php echo umodel_get_icon_type_v2_html( $icon ); ?>
					</div>
				</div>
			<?php endif; //$icon_style check
			?>
			<div class="media-body">
				<?php if ( $title ): ?>
				<h5 class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</h5>
		<?php endif; //$title 
		?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content 
			?>
		</div><!-- eof .media-body -->
		</div><!-- eof .teaser -->
		<?php
		break; //icon_left

	//right icon layout
	case 'icon_right':
		?>
		<div class="teaser media text-right">

			<div class="media-body">
				<?php if ( $title ): ?>
				<h5 class="media-heading">
				<?php if ( $link ): ?>
				<a href="<?php echo esc_url( $link ); ?>">
					<?php endif; //$link ?>

					<?php echo wp_kses_post( $title ); ?>

					<?php if ( $link ): ?>
				</a>
			<?php endif; //$link ?>
			</h5>
			<?php endif; //$title 
			?>
			<?php if ( $content ) : ?>
				<div>
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; //$content 
			?>
		</div><!-- eof .media-body -->
		<?php if ( $icon ) : ?>
		<div class="media-right media-top">
			<div class="teaser_icon">
                <?php echo umodel_get_icon_type_v2_html( $icon ); ?>
			</div>
		</div>
	<?php endif; //icon_style 
		?>
		</div><!-- eof .teaser -->

		<?php
		break; //icon_right

	//default layout - icon_top
	default:
		?>
	<div class="teaser icon_top text-center">
		<?php if ( $icon ) : ?>
		<div class="teaser_icon">
            <?php echo umodel_get_icon_type_v2_html( $icon ); ?>
		</div>
	<?php endif; //icon_style 
		?>
		<?php if ( $title ): ?>
        <h5 class="media-heading">
		<?php if ( $link ): ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php endif; //$link ?>

		<?php echo wp_kses_post( $title ); ?>

		<?php if ( $link ): ?>
			</a>
		<?php endif; //$link ?>
		</h5>
	<?php endif; //$title 
		?>
		<?php if ( $content ) : ?>
		<p>
			<?php echo wp_kses_post( $content ); ?>
		</p>
	<?php endif; //$content 
		?>
		</div>
	<?php endswitch; ?>