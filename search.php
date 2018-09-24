<?php
/**
 * The template for displaying Search Results pages
 */

get_header();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8'; ?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?>">
		<?php if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				if ( 'page' === get_post_type() ) {
					get_template_part( 'template-parts/content', 'page' );
				} elseif ( 'fw-event' === get_post_type() ) {
					get_template_part( 'template-parts/content', 'event' );
				} else {
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				}

			endwhile;
			// Previous/next post navigation.
			umodel_paging_nav();
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div><!--eof #content -->
    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();