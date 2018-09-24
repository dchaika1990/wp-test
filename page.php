<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8'; ?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</div><!--eof #content -->
    <?php umodel_sidebar(); ?>
	<!-- eof main aside sidebar -->
	<?php
get_footer();