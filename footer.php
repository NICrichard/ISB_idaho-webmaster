<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Idaho_Webmaster
 */

$idaho_webmaster_color_primary 	 = substr( get_theme_mod( 'idaho_color_ui_blue', '#214b82' ), 1 );
$idaho_webmaster_color_secondary = substr( get_theme_mod( 'idaho_color_light_blue', '#7696C9' ), 1 );


?>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container hidden-print">
			<div class="row footer-navigation">
				<div class="col-sm-2 hidden-xs hidden-sm" id="usa-map">
					<img src="<?php echo get_template_directory_uri(); ?>/img/inline-map.svg.php?primary=<?php echo esc_attr($idaho_webmaster_color_primary); ?>&amp;secondary=<?php echo esc_attr($idaho_webmaster_color_secondary); ?>" alt="Map of the USA." class="img-responsive">
				</div>

				<?php /** include footer file based on theme options (template-parts/footer-{type}). */ ?>
				<?php get_template_part( 'template-parts/footer', get_theme_mod( 'idaho_footer_layout', '5col' ) ); ?>


			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( get_theme_mod( 'idaho_google_analytics', '' ) !== '' ) : ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo esc_attr( get_theme_mod( 'idaho_google_analytics', '' ) ); ?>', 'auto');
    ga('send', 'pageview');

  </script>
<?php endif; ?>

<?php wp_footer(); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</body>
</html>
