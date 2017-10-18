<?php
/**
 * Template Name: LRS
 *
 * @package WordPress
 * @subpackage Idaho_Webmaster
 */

get_header(); ?>

<script>
	var itodclient = { clientid: "155", clientdomain: "//isb.intouchondemand.com/" };

	window.jQuery || document.write('<script src="' + itodclient.clientdomain + 'js/jquery-2.0.3.min.js"><\/script>')

	if (document.getElementById("itodjs") == null) {
		document.write('<script id="itodjs" src="' + itodclient.clientdomain + "js/itodbridge/ib.js?" + new Date().getTime() + '"><\/script>')
	}
</script>


	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<script type="text/javascript">
    jQuery(document).ready(function () {
    itodloader.loadLRSInstantFrame();    	
    });
	</script>


<?php get_footer(); ?>
