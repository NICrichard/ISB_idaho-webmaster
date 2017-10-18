<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Idaho_Webmaster
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">

				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<?php get_search_form(); ?>
						<!-- form class="mobile search-form home" method="get" accept-charset="UTF-8" action="http://search.usa.gov/search" role="search">
							<input name="utf8" type="hidden" value="&#x2713;" />
							<input name="affiliate" type="hidden" value="<?php echo esc_attr( get_theme_mod( 'idaho_search_affiliate', 'idahogov' ) ); ?>" />
							<div class="input-group">
								<input type="text" class="form-control input-lg" placeholder="Search" title="Search" name="query">
								<span class="input-group-btn">
									<button class="btn" type="submit" title="Search">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</span>
							</div>
						</form -->
					</div>
				</div>

				<div class="entry-content">
					<div class="row">
						<div class="col-sm-4">
							<h2 style="margin: 10px 0px">Page not found.</h2>
							<p>This page may have moved or is no longer available.<br>
							We apologize for the inconvenience.</p>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-default alt">
								<div class="panel-heading">
									<h3 class="panel-title">Try this:</h3>
								</div>
								<div class="panel-body">

									You may be able to find your information through our search above, or the navigation categories.

								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="panel panel-default alt">
								<div class="panel-heading">
									<h3 class="panel-title">Help us:</h3>
								</div>
								<div class="panel-body">

									Does this need to be fixed? Well, we would like to hear about that. Please contact us.

								</div>
							</div>
						</div>

					</div>
				</div>


			</section>
			<!-- .error-404 -->

		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

<?php get_footer(); ?>
