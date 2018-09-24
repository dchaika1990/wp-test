<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$get_breadcrumbs_image = ( function_exists( 'fw_get_db_customizer_option' ) ) ? fw_get_db_customizer_option( 'breadcrumbs_image' ) : '';
if ( $get_breadcrumbs_image ) {
	$breadcrumbs_image =  $get_breadcrumbs_image['url'];
} else {
	$breadcrumbs_image = UMODEL_THEME_URI .'/img/parallax/breadcrumbs.jpg';
}
?>
<section class="page_breadcrumbs ds section_padding_40 background_cover section_overlay" style="background-image: url(<?php echo esc_url( $breadcrumbs_image ) ?>);">
	<div class="container">
		<div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="breadcrumbs-title">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
                </h3>
				<?php
                    if ( function_exists( 'fw_ext_breadcrumbs' ) ) {
                        fw_ext_breadcrumbs();
                    }
				?>
            </div>
		</div>
	</div>
</section>