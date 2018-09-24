<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name         = $ext_services_settings['taxonomy_name'];
$icon_array            = fw_ext_services_get_icon_array();
?>
<div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail( 'umodel-services' );
			?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
	<?php elseif ( $icon_array['icon_type'] === 'image' ) : ?>
        <div class="service_icon">
            <a class="permalink" href="<?php the_permalink(); ?>">
                <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
            </a>
        </div>
	<?php else: //icon ?>
        <div class="service_icon highlight size_big">
            <a class="permalink" href="<?php the_permalink(); ?>">
			    <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
            </a>
        </div>
	<?php endif; ?>
    <div class="item-content">
        <h5 class="entry-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
        <div class="excerpt">
			<?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="theme_button inverse color2 read-more"><?php echo esc_html__('More', 'umodel'); ?></a>
    </div><!-- eof .item-content -->
</div><!-- eof .teaser -->