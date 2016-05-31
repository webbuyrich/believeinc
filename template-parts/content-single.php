<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package believeinc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) : ?>
			</h3>
			<div class="entry-meta">
				<?php believeinc_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</div>
		<div class="entry-content panel-body">
			<?php if ( has_post_thumbnail() ) : ?>			    
			    <?php the_post_thumbnail( 'full', array('class' => 'img-responsive img-rounded')); ?>			    
			<?php endif; ?>
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'believeinc' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'believeinc' ),
				'after'  => '</div>',
				) );
				?>
		</div>
		<footer class="entry-footer">
			<?php believeinc_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>		

	
</article><!-- #post-## -->
