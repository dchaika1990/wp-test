<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'umodel_blog_adds' ) ) :
	function umodel_blog_adds() {
		if ( function_exists( 'mwt_share_this' ) ) {
			echo '<div class="blog-adds">';

			echo '<span class="meta-block">';
			mwt_share_this();
			echo '</span>';

			echo '<span class="comment-count">';
			echo get_comments_number( get_the_ID() );
			echo '</span>';

			echo '</div>';
		}
	}
endif;
