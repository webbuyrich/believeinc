<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package believeinc
 */

if ( ! function_exists( 'believeinc_paging_nav') ) :
	# code...
	function believeinc_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="sr-only"><?php _e( 'Posts navigation', 'believeinc' ); ?></h1>
			<ul class="pager">

				<?php if ( get_next_posts_link() ) : ?>
				<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'believeinc' ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'believeinc' ) ); ?></li>
				<?php endif; ?>

			</ul><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'believeinc_post_nav') ) :
	# code...
	function believeinc_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
			?>
			<nav class="navigation post-navigation" role="navigation">
				<h1 class="sr-only"><?php _e( 'Post navigation', 'believeinc' ); ?></h1>
				<ul class="pager">
					<?php
						previous_post_link( '<li class="previous">%link</li>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'believeinc' ) );
						next_post_link(     '<li class="next">%link</li>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'believeinc' ) );
					?>
				</ul><!-- .nav-links -->
			</nav><!-- .navigation -->
			<?php
	}
endif;

if ( ! function_exists( 'believeinc_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function believeinc_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '<i class="fa fa-clock-o" aria-hidden="true"></i> %s', 'post date', 'believeinc' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '<i class="fa fa-user" aria-hidden="true"></i> %s', 'post author', 'believeinc' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'believeinc_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function believeinc_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'believeinc' ) );
		if ( $categories_list && believeinc_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'believeinc' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'believeinc' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'believeinc' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'believeinc' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link( __( 'edit', 'textdomain' ), '<p><span class="btn btn-danger">', '</span></p>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function believeinc_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'believeinc_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'believeinc_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so believeinc_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so believeinc_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in believeinc_categorized_blog.
 */
function believeinc_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'believeinc_categories' );
}
add_action( 'edit_category', 'believeinc_category_transient_flusher' );
add_action( 'save_post',     'believeinc_category_transient_flusher' );
