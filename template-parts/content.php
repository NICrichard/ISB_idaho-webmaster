<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idaho_Webmaster
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'panel panel-default alt' ); ?>>
	<header class="entry-header panel-heading">
		<?php the_title( sprintf( '<h4 class="entry-title panel-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php idaho_webmaster_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="panel-body">

		<div class="panel-image">
			<?php the_post_thumbnail( 'panel-image', array( 'class' => 'visible-md visible-lg' ) ); ?>
			<?php the_post_thumbnail( array( 150, 150 ), array( 'class' => 'hidden-md hidden-lg' ) ); ?>
		</div>

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'idaho-webmaster' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'idaho-webmaster' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer panel-footer">
		<?php idaho_webmaster_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
