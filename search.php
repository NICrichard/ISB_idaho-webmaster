<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Idaho_Webmaster
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

    <?php if ( get_theme_mod( 'idaho_search_local', false ) ) : ?>
  		<?php if ( have_posts() ) : ?>

  			<header class="entry-header">
  				<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'idaho-webmaster' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
  			</header><!-- .page-header -->

        <div class="local-search-heading">
          <h4>Local Results</h4>
        </div>

  			<?php /* Start the Loop */ ?>
  			<?php while ( have_posts() ) : the_post(); ?>

  				<?php
  				/**
  				 * Run the loop for the search to output the results.
  				 * If you want to overload this in a child theme then include a file
  				 * called content-search.php and that will be used instead.
  				 */
  				get_template_part( 'template-parts/content', 'search' );
  				?>

  			<?php endwhile; ?>

  		<?php endif; ?>
    <?php endif; ?>

		<div class="search-web">
      <script>
        (function() {
          var cx = '<?php echo get_theme_mod( 'idaho_search_affiliate', '017559489489848514908:m2yuse5fxfq' ); ?>';
          var gcse = document.createElement('script');
          gcse.type = 'text/javascript';
          gcse.async = true;
          gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(gcse, s);
        })();
      </script>
      <gcse:searchresults-only queryParameterName="s"></gcse:searchresults-only>
    </div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
