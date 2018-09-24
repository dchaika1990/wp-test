<?php
/**
 * The template for default displaying portfolio taxonomy
 */
get_header();
//no columns on single gallery page - giving true as a parameter to get column classes function
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';

//get all terms for filter
if ( have_posts() ) :

	$all_categories = array();
	$categories     = array();
	// Start the Loop.
	while ( have_posts() ) : the_post();
		$post_categories = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
		if ( !empty( $post_categories ) ) {
				$all_categories[] = $post_categories;
		}
	endwhile;
	wp_reset_postdata();
	if ( !empty($all_categories) ) {
		foreach ( $all_categories as $post_categories ) :
			foreach ( $post_categories as $category ) :
				$categories[] = $category;
			endforeach;
		endforeach;
	}

	$categories = array_unique( $categories, SORT_REGULAR );

endif; //have_posts

$unique_id = uniqid();
?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?>">
		<?php
		if ( count( $categories ) > 1 ) : ?>
			<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
				<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'umodel' ); ?></a>
				<?php foreach ( $categories as $category ) : ?>
					<a href="#"
					   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php endforeach; ?>
			</div><!-- eof isotope_filters -->
		<?php endif; //count subcategories check ?>
		<div class="isotope_container isotope row masonry-layout"
		     data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
			<?php if ( have_posts() ) : ?>
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					$term_objects      = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
					$item_filter_class = '';
					if( !empty($term_objects) ) :
						foreach ( $term_objects as $term_object ) {
							$item_filter_class .= ' ' . $term_object->slug;
						}
					endif;
					?>
					<div
						class="isotope-item col-lg-4 col-md-6 col-sm-12 <?php echo esc_attr( $item_filter_class ); ?>">
						<?php
						//include item layout view file
						if ( has_post_thumbnail() ) {
							include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-regular' ) );
						} else {
							include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
						}
						?>
					</div><!-- eof isotope-item -->
					<?php
				endwhile;
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div><!-- eof .isotope_container -->
		<?php // Pagination.
		umodel_paging_nav();
		?>
	</div><!--eof #content -->

    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();