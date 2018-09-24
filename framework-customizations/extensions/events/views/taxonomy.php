<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying Events Category pages
 *
 */

get_header();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';
?>

	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?>">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'event' );

			endwhile;
			?>

			<?php
			// Previous/next page navigation.
			umodel_paging_nav();

		else : // If no content, include the "No posts found" template.
		{
			get_template_part( 'content', 'none' );
		}

		endif;
		?>

	</div><!--eof #content -->

    <?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();