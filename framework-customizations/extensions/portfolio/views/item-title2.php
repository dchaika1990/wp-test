<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */

//wrapping in div for carousel layout
?>
<div class="widget_portfolio-item gallery-item item-with-title with_background">
	<div class="vertical-item">
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			the_post_thumbnail('umodel-square');
			?>
			<div class="media-links">
				<div class="links-wrap">
					<a class="p-view prettyPhoto "
					   data-gal="prettyPhoto[gal-<?php echo esc_attr( $unique_id ); ?>]"
					   href="<?php echo esc_attr( $full_image_src ); ?>"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="item-content text-center">
        <h3 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h3>
	</div><!-- eof vertical-item -->
</div><!-- eof widget item -->