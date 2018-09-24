<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();
$mainColumnSize       = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8'; ?>
	<div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?> content">
		<?php if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();

				$name_specialised_template = get_post_format();
				if ( 'fw-event' == $post->post_type ) {
					$name_specialised_template = 'event';

				}

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', $name_specialised_template );
			endwhile;
			// Previous/next page navigation.
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