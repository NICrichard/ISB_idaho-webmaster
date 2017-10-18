<?php
/**
 * Template part for displaying header carousel.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Idaho_Webmaster
 */

?>

<?php $carousel_images = get_post_meta( get_the_ID(), '_idaho_carousel_images', true ); ?>
<?php if ( ! empty( $carousel_images ) ) : ?>

	<?php if ( count( $carousel_images ) === 1 ) : ?>

			<?php echo wp_get_attachment_image( $carousel_images[0], 'full', false, array( 'class' => 'img-responsive' ) ); ?>

	<?php else : ?>

		<div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="false">

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php foreach ( $carousel_images as $index => $image ) : ?>
					<li data-target="#header-carousel" data-slide-to="<?php echo esc_attr( $index ) ?>" class="<?php echo esc_attr( idaho_webmaster_active( 0 === $index ) ); ?>" ></li>
				<?php endforeach; ?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php foreach ( $carousel_images as $index => $image ) : ?>
					<div class="item <?php echo esc_attr( idaho_webmaster_active( 0 === $index ) ); ?>">
						<?php echo wp_get_attachment_image( $image, 'full' ); ?>

						<?php $image_meta = wp_prepare_attachment_for_js( $image ); ?>
						<div class="carousel-caption">
							<?php if ( ! empty( $image_meta['title'] ) ) : ?>
								<h3><?php echo esc_attr( $image_meta['title'] ) ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $image_meta['caption'] ) ) : ?>
								<p><?php echo esc_attr( $image_meta['caption'] ) ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#header-carousel" role="button" data-slide="prev">
				<span class="glyphicons glyphicons-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#header-carousel" role="button" data-slide="next">
				<span class="glyphicons glyphicons-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	<?php endif; ?>

<?php endif; ?>
