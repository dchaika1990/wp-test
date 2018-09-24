<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : 'yes';
$post_author     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_author' ) : 'yes';
$post_date       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_date' ) : 'yes';
$post_tags       = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : 'yes';

$post_thumbnail        = get_the_post_thumbnail( get_the_ID() );
$additional_post_class = ( $post_thumbnail ) ? 'bg_teaser after_cover darkgrey_bg overflow-hidden  ' : '';
?>
<article  id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item text-center content-padding ' . $additional_post_class ); ?>>
	<?php
	echo empty ( $post_thumbnail ) ? '<div class="bg_overlay"></div>' : '';
	echo wp_kses_post( $post_thumbnail );
	?>
    <div class="item-content">

        <div class="entry-avatar">
			<?php
			global $post;
			echo get_avatar( $post->post_author, $size = 120 ); ?>
        </div>

        <div class="entry-header flex-wrap v-center">
		    <?php if ( ! defined( 'FW' ) ) : ?>
                <div class="entry-date">
				    <?php if ( 'post' == get_post_type() ) {
					    umodel_posted_on();
				    } ?>
                </div>
		    <?php elseif ( defined( 'FW' ) && $post_date == 'yes' ) : ?>
                <div class="entry-date">
				    <?php if ( 'post' == get_post_type() ) {
					    umodel_posted_on();
				    } ?>
                </div>
		    <?php endif; ?>
            <!-- .entry-date -->
		    <?php if ( ! defined( 'FW' ) ) : ?>
                <div class="entry-author">
				    <?php if ( 'post' == get_post_type() ) {
					    umodel_posted_by();
				    } ?>
                </div>
		    <?php elseif ( defined( 'FW' ) && $post_author == 'yes' ) : ?>
            <div class="entry-author">
			    <?php if ( 'post' == get_post_type() ) {
				    umodel_posted_by();
			    } ?>
            </div>
		    <?php endif; ?><!-- .entry-author -->
		    <?php if ( ! defined( 'FW' ) ) : ?>
                <div class="categories-links color2">
				    <?php
				    echo '<span class="separator">/</span>';
				    echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'umodel' ) );
				    ?>
                </div>
		    <?php elseif ( defined( 'FW' ) && $post_categories == 'yes' ) : ?>
			    <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && umodel_categorized_blog() ) : ?>
                    <div class="categories-links color2">
					    <?php
					    echo '<span class="separator">/</span>';
					    echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'umodel' ) );
					    ?>
                    </div>
			    <?php endif; ?>
		    <?php endif; ?>
            <!-- .item cats -->
        </div><!-- .entry-header -->

        <div class="entry-content">
		    <?php
		    //hidding "more link" in content
		    the_content();
		    ?>
        </div><!-- .entry-content -->

	    <?php if ( is_search() ) : ?>
            <div class="entry-summary">
			    <?php
			    the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			    the_excerpt();
			    ?>
            </div><!-- .entry-summary -->
	    <?php endif; //is_search  ?>
        <div class="entry-footer">
		    <?php umodel_blog_adds() ?>
            <!-- eof .blog-adds -->
        </div>
    </div><!-- eof .item-content -->
</article><!-- #post-## -->