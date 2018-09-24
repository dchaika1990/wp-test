<?php
$sidebarSize = umodel_column_size('sidebar');
?>
<div class="col-md-<?php echo esc_attr($sidebarSize); ?> sidebar">
	<?php if ( function_exists( 'fw_ext_sidebars_show' ) ) {
		if ( fw_ext_sidebars_show( 'blue' ) ) {
			echo fw_ext_sidebars_show( 'blue' );
		} else {
			dynamic_sidebar( 'sidebar-main' );
		}
	} else {
		dynamic_sidebar( 'sidebar-main' );
	} ?>
</div>