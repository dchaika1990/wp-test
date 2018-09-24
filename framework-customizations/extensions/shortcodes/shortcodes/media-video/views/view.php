<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;
$unique_id = uniqid();


$link = $atts['media_link'];
$video = $atts['media_video'];
if ( $video ) {
	$link = $video;
}
?>
<div class="video-wrapper video-shortcode shortcode-container">
    <?php if ( $link ): ?>
        <a href="<?php echo esc_url( $link ); ?>" <?php echo wp_kses_post(( $video ) ? ' data-gal="prettyPhoto[gal-video-'. $unique_id .']"' : ''); ?>></a>
    <?php endif; //$link ?>
</div>
