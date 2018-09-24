<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Used for blog page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8'; ?>

	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?> content">
		<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

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