<?php
/**
 * The Template for displaying all single posts
 */

get_header();
$mainColumnSize = umodel_column_size( 'main' ) ? umodel_column_size( 'main' ) : '8';
?>
    <div id="content" class="col-md-<?php echo esc_attr( $mainColumnSize ); ?>">
		<?php

		// Start the Loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

			// Previous/next post navigation. Uncomment following line if you need post navigation
			umodel_post_nav();

			// Authors info
			umodel_list_authors();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile; ?>
    </div><!--eof #content -->

<?php umodel_sidebar(); ?>
    <!-- eof main aside sidebar -->
<?php
get_footer();