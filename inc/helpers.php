<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Theme Google font.
 *
 * @return string
 */

if ( ! function_exists( 'umodel_google_font_url' ) ) :
	function umodel_google_font_url() {
		$fonts_url = '';
		$fonts     = array();

		/* Standard Theme Fonts */
		$fonts['Raleway'] = array(
			'google_font'    => true,
			'subset'         => 'latin-ext',
			'variation'      => '200',
			'variants'       => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
			'family'         => 'Raleway',
			'style'          => false,
			'weight'         => false,
			'size'           => '20',
			'line-height'    => '40',
			'letter-spacing' => '0',
			'color'          => false,
		);

		//checking fonts from customizer if Unyson exists
		if ( function_exists( 'fw_get_google_fonts' ) ) {
			//grabbing all available fonts
			$google_fonts = fw_get_google_fonts();

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			//including fonts from theme in main fonts array
			if ( $font_body_enabled ) {
				$fonts[ $font_body['family'] ] = $font_body;
				// adding font variations to main fonts array to create link to Google Fonts below
				if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
					$fonts[ $font_body['family'] ]['variants'] = $google_fonts[ $font_body['family'] ]['variants'];
				}
			}
			if ( $font_headings_enabled ) {
				$fonts[ $font_headings['family'] ] = $font_headings;
				if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
					$fonts[ $font_headings['family'] ]['variants'] = $google_fonts[ $font_headings['family'] ]['variants'];
				}
			}
		}

		$fonts_url = '//fonts.googleapis.com/css?family=';
		$subsets   = array();
		foreach ( $fonts as $font => $styles ) {
			if ( ! empty ( $styles['variants'] ) ) {

				$fonts_url .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
				$subsets[] = $styles['subset'];
			}

		}
		$fonts_url = substr( $fonts_url, 0, - 1 );
		$fonts_url .= '&subset=' . implode( ',', array_unique( $subsets ) );

		return urldecode( $fonts_url );
	}
endif;

if ( ! function_exists( 'umodel_add_font_styles_in_head' ) ) :
	function umodel_add_font_styles_in_head() {
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			$output = "";
			if ( $font_body_enabled ) {
				$output .= "body {
								font-family : \"{$font_body['family']}\", sans-serif;
								font-weight: {$font_body['variation']};
								font-size: {$font_body['size']}px;
								line-height: {$font_body['line-height']}px;
								letter-spacing: {$font_body['letter-spacing']}px;
							}";
			}
			if ( $font_headings_enabled ) {

				$output .= "h1, h2, h3, h4, h5, h6 {
								font-family : \"{$font_headings['family']}\", sans-serif;
								letter-spacing: {$font_headings['letter-spacing']}px;
							}";
			}

			return ( wp_kses( $output, false ) );

		} else {
			return false;
		}
	} //umodel_add_font_styles_in_head()

endif;

/**
 *
 * checking for Unyson installed and returning walker for change comments HTML
 */

if ( ! function_exists( 'umodel_return_comments_walker' ) ) :
	function umodel_return_comments_walker() {
		return new Umodel_Comments_Walker;
	}
endif;


if ( ! function_exists( 'umodel_the_attached_image' ) ) :
	/**
	 * Print the attached image with a link to the next attached image.
	 */
	function umodel_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'umodel_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	} //umodel_the_attached_image()

endif;

if ( ! function_exists( 'umodel_list_authors' ) ) :
	/**
	 * Print a list of all site authors who published at least one post.
	 */
	function umodel_list_authors($only_post_author = true) {
		if ( $only_post_author ) {
			$author_id = get_the_author_meta('ID');
			$author_ids = get_users( array(
				'fields'  => 'ID',
				'include' => array(
					$author_id
				)
			) );
		} else {
			// all authors with at least one post.
			$author_ids = get_users( array(
				'fields'  => 'ID',
				'orderby' => 'post_count',
				'order'   => 'DESC',
				'who'     => 'authors',
			) );
		}

		foreach ( $author_ids as $author_id ) :
			$post_count = count_user_posts( $author_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			$twitter_url     = get_the_author_meta( 'twitter', $author_id );
			$facebook_url    = get_the_author_meta( 'facebook', $author_id );
			$google_plus_url = get_the_author_meta( 'google_plus', $author_id );
			$youtube_url     = get_the_author_meta( 'youtube', $author_id );
			$instagram_url   = get_the_author_meta( 'instagram', $author_id );
			$linkedin_url    = get_the_author_meta( 'linkedin', $author_id );
			$author_position = get_the_author_meta( 'author_position', $author_id );
			$author_bio      = get_the_author_meta( 'description', $author_id );
			// Not showing meta if no author bio
			if ( ! $author_bio ) {
				continue;
			}
			?>
            <div class="author-meta side-item overflow-hidden">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="item-media cover-image">
							<?php echo get_avatar( $author_id, 500 ); ?>
                        </div><!-- eof .item-media -->
                    </div><!-- eof .col-md-* -->
                    <div class="col-sm-7 col-md-8">
                        <div class="item-content">
                            <h5 class="author-name"><?php echo get_the_author_meta( 'display_name', $author_id ); ?></h5>
							<?php if ( $author_position ) : ?>
                                <span class="author-position small-text highlight">
									<?php echo wp_kses_post( $author_position ); ?>
                                </span>
							<?php endif; ?>
							<?php if ( $author_bio ) : ?>
                                <p class="author-bio">
									<?php echo wp_kses_post( $author_bio ); ?>
                                </p>
							<?php endif; //author_bio
							if ( $twitter_url || $facebook_url || $google_plus_url || $youtube_url || $instagram_url || $linkedin_url ) :
								?>
                                <span class="author-social">
									<?php if ( $twitter_url ) : ?>
                                        <a href="<?php echo esc_url( $twitter_url ) ?>"
                                           class="social-icon soc-twitter color-icon border-icon rounded-icon" target="_blank"></a>
									<?php endif; ?>
									<?php if ( $facebook_url ) : ?>
                                        <a href="<?php echo esc_url( $facebook_url ) ?>"
                                           class="social-icon soc-facebook color-icon border-icon rounded-icon" target="_blank"></a>
									<?php endif; ?>
									<?php if ( $google_plus_url ) : ?>
                                        <a href="<?php echo esc_url( $google_plus_url ) ?>"
                                           class="social-icon soc-google color-icon border-icon rounded-icon" target="_blank"></a>
									<?php endif; ?>
									<?php if ( $youtube_url ) : ?>
                                        <a href="<?php echo esc_url( $youtube_url ) ?>"
                                           class="social-icon soc-youtube color-icon border-icon rounded-icon" target="_blank"></a>
									<?php endif; ?>
	                                <?php if ( $instagram_url ) : ?>
                                        <a href="<?php echo esc_url( $instagram_url ) ?>"
                                           class="social-icon soc-instagram color-icon border-icon rounded-icon" target="_blank"></a>
	                                <?php endif; ?>
	                                <?php if ( $linkedin_url ) : ?>
                                        <a href="<?php echo esc_url( $linkedin_url ) ?>"
                                           class="social-icon soc-linkedin color-icon border-icon rounded-icon" target="_blank"></a>
	                                <?php endif; ?>
								</span><!-- eof .author-social -->
								<?php
							endif; //author social
							?>
                        </div><!-- eof .item-content -->
                    </div><!-- eof .col-md-* -->
                </div>
                <!-- .author-info -->
            </div><!-- eof author-meta -->
			<?php
		endforeach;
	} //umodel_list_authors()

endif;


if ( ! function_exists( 'umodel_is_active_widgets_in_main_sidebar_exists' ) ) :
	/**
	 * Define is sidebar that must be shown has active widgets
	 */
	function umodel_is_active_widgets_in_main_sidebar_exists() {
		//default value
		$return = true;

		//if Unyson exists
		if ( function_exists( 'fw_ext_sidebars_show' ) ) {
			//if custom sidebar is set for current page
			if ( fw_ext_sidebars_show( 'blue' ) ) {
				//if custom sidebar is not empty - see theme/framework-customizations/extensions/sidebars/views/frontend-no-widgets.php
				if ( fw_ext_sidebars_show( 'blue' ) !== '1' ) {
					$return = true;
				} else {
					$return = false;
				}
				//if no custom sidebar but Unyson exists
			} else {
				//if no default sidebar
				if ( ! is_active_sidebar( 'sidebar-main' ) ) {
					$return = false;
				} else {
					$return = true;
				}
			}
			//no Unyson and empty sidebar
		} else {
			if ( ! is_active_sidebar( 'sidebar-main' ) ) {
				$return = false;
			} else {
				$return = true;
			}
		}
		return $return;
	}
endif;

/**
 * Calculate Column Sizes and return the value when called
 */
if (!function_exists( 'umodel_column_size' ) ) {
	function umodel_column_size($column = null) {
		$columnSizes = array(
			'sidebar' => '',
			'main'  => '',
		);
		if ($column != null && array_key_exists($column,$columnSizes)) {
			$current_position = false;
			if (function_exists('fw_ext_sidebars_get_current_position')) {
				$current_position = fw_ext_sidebars_get_current_position();
			}
			if ($current_position === 'full')  {
				$sidebarSize = 0;
			} elseif ( ! function_exists( 'fw_ext_sidebars_get_current_position' ) && ! is_active_sidebar( 'sidebar-main' ) ) {
				$sidebarSize = 0;
			} else {
				$sidebarSize = 4;
			}

			$columnSizes = array(
				'sidebar' => $sidebarSize,
			);
			$columnSizes['main'] = 12 - ($columnSizes['sidebar']);
			if ($current_position === 'full' && is_home() || $current_position === 'full' && is_single())  {
				$columnSizes['main'] = '10 col-md-push-1';
            }
			return $columnSizes[$column];
		}

		return;
	}
};

if ( ! function_exists( 'umodel_sidebar' ) ) :
	/**
	 * Sidebar echo function
	 */
	function umodel_sidebar() {
		if ( umodel_is_active_widgets_in_main_sidebar_exists() ) {
			if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
				$current_position = fw_ext_sidebars_get_current_position();
				if ( $current_position !== 'full' ) {
					get_sidebar();
				}
			} elseif ( ! function_exists( 'fw_ext_sidebars_get_current_position' ) && is_active_sidebar( 'sidebar-main' ) ) {
				get_sidebar();
			}
		}
	}
endif;

/**
 * Custom template tags
 */

/**
 * Retrieve paginated link for archive post pages.
 *
 * Modification of standard WordPress paginate_links function to create Twitter Bootstrap pagination
 *
 * @global WP_Query $wp_query
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments for generating paginated links for archives.
 *
 * @type string $base Base of the paginated url. Default empty.
 * @type string $format Format for the pagination structure. Default empty.
 * @type int $total The total amount of pages. Default is the value WP_Query's
 *                                      `max_num_pages` or 1.
 * @type int $current The current page number. Default is 'paged' query var or 1.
 * @type bool $show_all Whether to show all pages. Default false.
 * @type int $end_size How many numbers on either the start and the end list edges.
 *                                      Default 1.
 * @type int $mid_size How many numbers to either side of the current pages. Default 2.
 * @type bool $prev_next Whether to include the previous and next links in the list. Default true.
 * @type bool $prev_text The previous page text. Default '« Previous'.
 * @type bool $next_text The next page text. Default '« Previous'.
 * @type string $type Controls format of the returned value. Possible values are 'plain',
 *                                      'array' and 'list'. Default is 'plain'.
 * @type array $add_args An array of query args to add. Default false.
 * @type string $add_fragment A string to append to each link. Default empty.
 * @type string $before_page_number A string to appear before the page number. Default empty.
 * @type string $after_page_number A string to append after the page number. Default empty.
 * }
 * @return array|string|void String of page links or array of page links.
 */
if ( ! function_exists( 'umodel_bootstrap_paginate_links' ) ) {
	function umodel_bootstrap_paginate_links( $args = '' ) {
		global $wp_query, $wp_rewrite;

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );

		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

		// URL base depends on permalink settings.
		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		$defaults = array(
			'base'               => $pagenum_link,
			'format'             => $format,
			'total'              => $total,
			'current'            => $current,
			'show_all'           => false,
			'prev_next'          => true,
			'prev_text'          => esc_html__( 'Prev', 'umodel' ),
			'next_text'          => esc_html__( 'Next', 'umodel' ),
			'end_size'           => 1,
			'mid_size'           => 2,
			'type'               => 'plain',
			'add_args'           => array(),
			// array of query args to add
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! is_array( $args['add_args'] ) ) {
			$args['add_args'] = array();
		}

		// Merge additional query vars found in the original URL into 'add_args' array.
		if ( isset( $url_parts[1] ) ) {
			// Find the format argument.
			$format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
			$format_query = isset( $format[1] ) ? $format[1] : '';
			wp_parse_str( $format_query, $format_args );

			// Find the query args of the requested URL.
			wp_parse_str( $url_parts[1], $url_query_args );

			// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
			foreach ( $format_args as $format_arg => $format_arg_value ) {
				unset( $url_query_args[ $format_arg ] );
			}

			$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
		}

		// Who knows what else people pass in $args
		$total = (int) $args['total'];
		if ( $total < 2 ) {
			return;
		}
		$current  = (int) $args['current'];
		$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
		if ( $end_size < 1 ) {
			$end_size = 1;
		}
		$mid_size = (int) $args['mid_size'];
		if ( $mid_size < 0 ) {
			$mid_size = 2;
		}
		$add_args   = $args['add_args'];
		$r          = '';
		$page_links = array();
		$dots       = false;

		//PREV button
		if ( $args['prev_next'] && $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current - 1, $link );

			if ( $add_args && 1 < $current ) {
				$link = add_query_arg( $add_args, $link );
			}

			$link .= $args['add_fragment'];

			$link_html = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
			$disabled  = '';
			if ( 1 >= $current ) {
				$disabled  = ' active disabled';
				$link_html = '<span class="prev page-numbers">' . $args['prev_text'] . '</span>';
			}

			/**
			 * Filter the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			$page_links[] = '<li class="prev' . $disabled . '">' . $link_html . '</li>';
		endif;
		for ( $n = 1; $n <= $total; $n ++ ) :
			if ( $n == $current ) :
				$page_links[] = "<li class='active'><span class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span></li>";
				$dots         = true;
			else :
				if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
					$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
					$link = str_replace( '%#%', $n, $link );
					if ( $add_args ) {
						$link = add_query_arg( $add_args, $link );
					}
					$link .= $args['add_fragment'];

					/** This filter is documented in wp-includes/general-template.php */
					$page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a></li>";
					$dots         = true;
				elseif ( $dots && ! $args['show_all'] ) :
					$page_links[] = '<li class="disabled"><span class="page-numbers dots">&hellip;</span></li>';
					$dots         = false;
				endif;
			endif;
		endfor;

		//NEXT button
		if ( $args['prev_next'] && $current ) :
			$link = str_replace( '%_%', $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current + 1, $link );
			if ( $add_args ) {
				$link = add_query_arg( $add_args, $link );
			}
			$link .= $args['add_fragment'];
			$link_html = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
			$disabled  = '';
			if ( $current >= $total || - 1 == $total ) {
				$disabled  = ' disabled active';
				$link_html = '<span class="next page-numbers">' . $args['next_text'] . '</span>';
			}

			/** This filter is documented in wp-includes/general-template.php */
			$page_links[] = '<li class="next ' . $disabled . '"> ' . $link_html . ' </li>';
		endif;
		//ignoring type as bootstrap prints only in UL
		$r .= '<ul class="pagination">';
		$r .= join( "\n", $page_links );
		$r .= '</ul>';

		return $r;
	} //umodel_bootstrap_paginate_links()
}

if ( ! function_exists( 'umodel_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function umodel_paging_nav( $wp_query = null, $wrapper = null ) {

		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.

		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
			'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
			'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = umodel_bootstrap_paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'show_all'  => false,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'type'      => 'list',
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => esc_html__( 'Prev', 'umodel' ),
			'next_text' => esc_html__( 'Next', 'umodel' ),
		) );

		if ( $links ) :
			if ( $wrapper ) : ?>
				<div class="muted_background">
				<?php
			endif;
			?>
			<nav class="loop-pagination text-center">
				<?php
				echo wp_kses_post( $links );
				?>
			</nav><!-- .navigation -->
			<?php
			if ( $wrapper ) : ?>
				</div>
				<?php
			endif;
		endif;
	} //umodel_paging_nav()

endif;

if ( ! function_exists( 'umodel_paging_comments_nav ' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function umodel_paging_comments_nav( $args = array() ) {

		global $wp_rewrite;

		//for checker
		$comments_pagination = paginate_comments_links( array( 'echo' => false ) );

		if ( ! is_singular() ) {
			return;
		}

		$page = get_query_var( 'cpage' );
		if ( ! $page ) {
			$page = 1;
		}
		$max_page = get_comment_pages_count();
		$defaults = array(
			'base'         => add_query_arg( 'cpage', '%#%' ),
			'format'       => '',
			'total'        => $max_page,
			'current'      => $page,
			'echo'         => true,
			'add_fragment' => '#comments'
		);
		if ( $wp_rewrite->using_permalinks() ) {
			$defaults['base'] = user_trailingslashit( trailingslashit( get_permalink() ) . $wp_rewrite->comments_pagination_base . '-%#%', 'commentpaged' );
		}

		$args       = wp_parse_args( $args, $defaults );
		$page_links = umodel_bootstrap_paginate_links( $args );

		if ( $args['echo'] ) {
			echo wp_kses_post( $page_links );
		} else {
			return $page_links;
		}
	} //umodel_paging_comments_nav()

endif;

/**
 * Find out if blog has more than one category.
 *
 * @return boolean true if blog has more than 1 category
 */
if ( ! function_exists( 'umodel_categorized_blog' ) ) :
	function umodel_categorized_blog() {
		if ( false === ( $all_categories = get_transient( 'umodel_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_categories = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_categories = count( $all_categories );

			set_transient( 'umodel_category_count', $all_categories );
		}

		if ( 1 !== (int) $all_categories ) {
			// This blog has more than 1 category so umodel_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so umodel_categorized_blog should return false
			return false;
		}
	} //umodel_categorized_blog()
endif;


if ( ! function_exists( 'umodel_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function umodel_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
			true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
        <nav class="navigation post-navigation items-nav content-justify" role="navigation">
			<?php previous_post_link( '%link', '<span class="prev-item"><span class="nav">' . esc_html__( 'Prev', 'umodel' ) . '</span></span>' ); ?>
			<?php next_post_link( '%link', '<span class="next-item"><span class="nav">' . esc_html__( 'Next', 'umodel' ) . '</span></span>' ); ?>
        </nav><!-- .navigation -->
	<?php } //umodel_post_nav
endif;

if ( ! function_exists( 'umodel_posted_on' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
	function umodel_posted_on() {
		// Set up and print post meta information.
		printf( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s %4$s %5$s %6$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			wp_kses_post( '<span class="separator">/</span>' ),
			esc_html__( 'AT', 'umodel' ),
			esc_html( get_the_time() )
		);
	}

endif; //umodel_posted_on

if ( ! function_exists( 'umodel_posted_by' ) ) : /**
 * Print HTML with meta information for the current post-date/time and author.
 */
	function umodel_posted_by() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post"><i class="rt-icon2-clip highlight"></i>' . esc_html__( ' Sticky ', 'umodel' ) . '</span>';
		}
		// Get the author name; wrap it in a link.
		printf(
		/* translators: %s: post author */
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . '%1$s' . get_the_author() . '</a></span>',
			esc_html_x( '', 'Used before post author name.', 'umodel' )
		);
	}

endif; //umodel_posted_by


/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
if ( ! function_exists( 'umodel_post_thumbnail' ) ) :
	function umodel_post_thumbnail( $small_image = false ) {
		$pID = get_the_ID();

		//detecting featured video
		$embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'post-featured-video', '' ) : '';
		$iframe    = '';
		if ( $embed_url ) {
			global $wp_embed;

			$width  = '1170';
			$height = '780';
			$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $embed_url ) . '[/embed]' );

		}// embed_url

		//detecting gallery
		$is_gallery = false;
		if ( get_post_format( $pID ) == 'gallery' ) {

			umodel_shortcode_atts_gallery_trigger();
			$galleries_images = get_post_galleries_images( $pID );
			umodel_shortcode_atts_gallery_trigger( false );
			$galleries_images_count = count( $galleries_images );

			if ( $galleries_images_count ) {
				$is_gallery = true;
			}
		} //gallery post format

		if ( post_password_required() || is_attachment() || ( ! has_post_thumbnail() && ! $is_gallery && ! $iframe ) ) {
			return false;
		}

		//adding additional wrap for small image layout feed
		if ( ! is_singular() && $small_image ) :
			?>
			<div class="col-md-6">
			<?php
		endif; //!is_singular and small image
		?>
		<div class="item-media-wrap">
			<div
				class="item-media entry-thumbnail post-thumbnail with_background">
				<?php
				// info in corner only for feed view and only for posts
				if ( ! is_singular() && 'post' === get_post_type() ) : ?>
					<div class="entry-meta-corner">
						<?php
						// Set up and print post meta information.
						printf( '<span class="date">
									<time class="entry-date" datetime="%1$s">
										<strong>%2$s</strong>%3$s
									</time>
								</span>',
							esc_attr( get_the_date( 'c' ) ),
							esc_html( get_the_date( 'j' ) ),
							esc_html( get_the_date( 'M' ) )
						);

						// Set up and print post meta information.
						if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
							?>
							<span class="comments-link">
								<i class="rt-icon2-bubble highlight"></i>
								<?php comments_popup_link( esc_html__( '0', 'umodel' ), esc_html__( '1', 'umodel' ), esc_html__( '%', 'umodel' ) ); ?>
						</span>
							<?php
						endif; //post_password_required
						?>
					</div>
				<?php endif;
				//featured image only for post
				if ( ! $is_gallery ) :
					if ( $iframe ) : ?>
						<div class="embed-responsive embed-responsive-3by2">
						<?php if ( has_post_thumbnail() ): ?>
							<a href="" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="embed-placeholder">
							<?php
						else:
							echo wp_kses( $iframe, array(
								'iframe' => array(
									'width'           => true,
									'height'          => true,
									'src'             => true,
									'frameborder'     => true,
									'allowfullscreen' => true,
								),
							) );
						endif; //has_post_thumbnail inside iframe check
					endif; // iframe check

					if (
						! ( is_singular() && ! $small_image )
						|| ( 'fw-event' === get_post_type() )
						|| ( is_singular() && $iframe )
					) {
						the_post_thumbnail( 'umodel-full-width' );
					} elseif ( ! is_singular() && $small_image ) {
						the_post_thumbnail( 'umodel-small-width' );
					} else {
						the_post_thumbnail();
					} //$current_position

					// creating post link for whole featured image
					if ( ! is_singular() && ! $iframe && ! ( 'fw-portfolio' === get_post_type() ) ) : ?>
						<div class="media-links">
							<a class="abs-link" href="<?php the_permalink(); ?>"></a>
						</div>
					<?php endif;
					if ( $iframe ):
						if ( has_post_thumbnail() ) :
							?>
							</a><!-- eof image link -->
						<?php endif; //post thumbnail check for closing A tag
						?>
						</div>
					<?php endif; //iframe check

				// gallery
				else :
					//featured image url
					$post_featured_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
					?>
					<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
					     data-loop="true"
					     data-margin="0"
					     data-nav="false"
					     data-dots="true"
					     data-themeclass="owl-theme entry-thumbnail-carousel"
					     data-center="false"
					     data-items="1"
					     data-autoplay="true"
					     data-responsive-xs="1"
					     data-responsive-sm="1"
					     data-responsive-md="1"
					     data-responsive-lg="1"
					>
						<?php
						//adding featured image as a first element in carousel
						if ( $post_featured_image_src ) : ?>
							<div class="item">
								<img src="<?php echo esc_attr( $post_featured_image_src ); ?>"
								     alt="<?php echo esc_attr( get_the_title( $pID ) ); ?>">
							</div>
						<?php endif;
						$count = 1;
						foreach ( $galleries_images as $gallerie ) :
							foreach ( $gallerie as $src ) :
								//showing only 3 images from gallery
								if ( $count > 3 ) {
									break 2;
								}
								?>
								<div class="item">
									<img src="<?php echo esc_attr( $src ); ?>"
									     alt="<?php echo esc_attr( get_the_title( $pID ) ); ?>">
								</div>
								<?php
								$count ++;
							endforeach;
						endforeach; ?>
					</div>
					<?php
				endif;
				?>
			</div> <!-- .item-media -->
		</div> <!-- .item-media-wrap -->
		<?php
		//closing additional wrap for small image layout feed
		if ( ! is_singular() && $small_image ) : ?>
			</div> <!-- eof .col-md-6 -->
		<?php endif; ?>

	<?php }
endif;

// share buttons
if ( ! function_exists( 'umodel_share_this' ) ) :
	/**
	 * Share article through social networks.
	 * bool $only_buttons
	 */
	function umodel_share_this( $only_buttons = false ) {

		$share_buttons                      = array();
		$share_buttons['share_facebook']    = '<a href="https://www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-facebook" target="_blank"></a>';
		$share_buttons['share_twitter']     = '<a href="https://twitter.com/intent/tweet?url=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-twitter" target="_blank"></a>';
		$share_buttons['share_google_plus'] = '<a href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-google" target="_blank"></a>';
		$share_buttons['share_pinterest']   = '<a href="https://pinterest.com/pin/create/bookmarklet/?url=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-pinterest" target="_blank"></a>';
		$share_buttons['share_linkedin']    = '<a href="https://www.linkedin.com/shareArticle?url=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-linkedin" target="_blank"></a>';
		$share_buttons['share_tumblr']      = '<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-tumblr" target="_blank"></a>';
		$share_buttons['share_reddit']      = '<a href="https://reddit.com/submit?url=' . esc_url( get_permalink() ) . '" class="social-icon color-icon border-icon rounded-icon soc-reddit" target="_blank"></a>';

		if ( function_exists( 'fw_get_db_customizer_option' ) ) {
			if ( ! fw_get_db_customizer_option( 'share_facebook' ) ) {
				unset( $share_buttons['share_facebook'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_twitter' ) ) {
				unset( $share_buttons['share_twitter'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_google_plus' ) ) {
				unset( $share_buttons['share_google_plus'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_pinterest' ) ) {
				unset( $share_buttons['share_pinterest'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_linkedin' ) ) {
				unset( $share_buttons['share_linkedin'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_tumblr' ) ) {
				unset( $share_buttons['share_tumblr'] );
			}

			if ( ! fw_get_db_customizer_option( 'share_reddit' ) ) {
				unset( $share_buttons['share_reddit'] );
			}
		}

		if ( ! empty ( $share_buttons ) ) :
			$unique_id = uniqid();

			if ( ! $only_buttons ) :
				?>
				<div class="dropdown inline-block">
				<a href="#" data-target="#" class="theme_button" id="share_button_<?php echo esc_attr( $unique_id ); ?>"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
						class="fa fa-mail-forward"></i></a>
				<div class="dropdown-menu" aria-labelledby="share_button_<?php echo esc_attr( $unique_id ); ?>">
			<?php endif; //only_buttons
			?>
			<div class="share_buttons">
				<?php
				foreach ( $share_buttons as $share_button ) :
					echo wp_kses_post( $share_button );
				endforeach;
				?>
			</div><!-- eof .share_buttons -->
			<?php if ( ! $only_buttons ) : ?>
			</div><!-- eof .dropdown-menu -->
			</div><!-- eof .dropdown -->
		<?php endif; //only_buttons
		endif; // share_buttons

	} //umodel_share_this()
endif; //function_exists

//get predefined template part from theme options
if ( ! function_exists( 'umodel_get_predefined_template_part' ) ) :
	/**
	 * Return propper template part from options or default.
	 * string $template_part_name
	 */
	function umodel_get_predefined_template_part( $template_part_name ) {
		$template_part_name = sanitize_title_with_dashes( $template_part_name );
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {
			$option_value = fw_get_db_customizer_option( $template_part_name );
			if ( $option_value ) {
				$template_part = $template_part_name . '-' . $option_value;
			} else {
				$template_part = $template_part_name . '-1';
			}
			//no unyson - return default (1) template part
		} else {
			$template_part = $template_part_name . '-1';
		}

		//hide breadcrumbs and override header for certain page - for demo and custom pages
		if ( is_page() && function_exists( 'fw_get_db_post_option' ) ) {
			global $post;
			//show or hide breadcrumbs
			if ( 'breadcrumbs' == $template_part_name && fw_get_db_post_option( $post->ID, 'hide_breadcrumbs' ) ) {
				//non-existent part
				$template_part = $template_part_name . '-999';
			}
		}

		//get template part from ULR - for demo
		if ( isset( $_GET[ $template_part_name ] ) ) {
			$template_part = $template_part_name . '-' . ( int ) $_GET[ $template_part_name ];
		}

		return $template_part;
	} //umodel_get_predefined_template_part()

endif;//function_exists

//get ids of showing widgets
if ( ! function_exists( 'umodel_get_showing_widgets_ids' ) ) :
	/**
	 * Return array of id's of all widgets that are showing.
	 */

	function umodel_get_showing_widgets_ids() {
		$showing_widgets     = wp_get_sidebars_widgets();
		$showing_widgets_ids = array();
		foreach ( $showing_widgets as $sidebar_name => $sidebar_widgets ) {
			foreach ( $sidebar_widgets as $sidebar_widget_id ) {
				if ( $sidebar_name !== 'wp_inactive_widgets' ) {
					$showing_widgets_ids[] = $sidebar_widget_id;
				}
			}
		}

		return $showing_widgets_ids;
	}
endif;

//returning first taxonomy of displayed archive
if ( ! function_exists( 'umodel_get_posts_single_taxonomy_name' ) ) :
	function umodel_get_posts_single_taxonomy_name( $queried_object ) {
		$taxonomies_array = get_object_taxonomies( $queried_object->name );
		return $taxonomies_array[0];
	}
endif;

//get all unique categories for all showing posts
if ( ! function_exists( 'umodel_get_post_categories' ) ) :
	function umodel_get_post_categories( $taxonomy_name = 'category' ) {
		//get all terms for filter
		if ( have_posts() ) :

			$all_categories = array();
			$categories     = array();
			// Start the Loop.
			while ( have_posts() ) : the_post();
				$all_categories[] = get_the_terms( get_the_ID(), $taxonomy_name );
			endwhile;
			wp_reset_postdata();

			foreach ( $all_categories as $post_categories ) :
				foreach ( $post_categories as $category ) :
					$categories[] = $category;
				endforeach;
			endforeach;

			$categories = array_unique( $categories, SORT_REGULAR );

			return $categories;

		endif; //have_posts
	}
endif;

//get all taxonomies slug for single post. Used inside loop
if ( ! function_exists( 'umodel_get_categories_slugs_for_single_post' ) ) :
	function umodel_get_categories_slugs_for_single_post( $taxonomy_name = 'category' ) {
		$term_objects      = get_the_terms( get_the_ID(), $taxonomy_name );
		$item_filter_class = '';
		foreach ( $term_objects as $term_object ) {
			$item_filter_class .= ' ' . $term_object->slug;
		}

		return $item_filter_class;
	}
endif;


//get the excerpt for page on search page even if only Unyson builder used - using in loop
if ( ! function_exists( 'umodel_get_excerpt_for_page_with_unyson_builder' ) ) :
		function umodel_get_excerpt_for_page_with_unyson_builder() {
			$excerpt = get_the_excerpt();
			if ( empty( $excerpt ) ) {
					$content = get_the_content();
					$content = strip_tags( str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', get_the_content() ) ) );
					$excerpt = substr( $content, 0, 200) . '...';
				}
		return $excerpt;
	}
endif;

// FW icon type-v2 process
if ( ! function_exists( 'umodel_get_icon_type_v2_html' ) ) :
    function umodel_get_icon_type_v2_html($icon_array) {
//        fw_print($icon_array);
        $box_icon_type = ! empty( $icon_array['type']) ? $icon_array['type'] : '';
        if ( $box_icon_type === 'icon-font' ) {
            if ( $icon_array['icon-class'] !== '' ) {
                $icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
            }
//        } elseif ( $box_icon_type === 'custom-upload' ) {
        } else {
            $icon_html = '<img src="' . $icon_array['url'] . '" alt="' . $icon_array['attachment_id'] . '">';
        }
        return $icon_html;
    }
endif;
