<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
?>
<article <?php post_class( "vertical-item content-padding big-padding with_background text-left overflow-hidden" . $filter_classes ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
        <div class="item-media">
			<?php
			echo get_the_post_thumbnail();
			?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
	<?php endif; //eof thumbnail check ?>
    <div class="item-content">
        <div class="entry-meta content-justify greylinks">
            <div>
				<?php umodel_posted_on(); ?>
            </div>
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && umodel_categorized_blog() ) : ?>
                <div
                        class="categories-links color1"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'umodel' ) ); ?></div>
			<?php endif; ?>
        </div>
        <h5 class="item-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h5>
		<?php the_excerpt(); ?>
	    <?php umodel_blog_adds() ?>
        <!-- eof .blog-adds -->
    </div>
</article><!-- eof vertical-item -->