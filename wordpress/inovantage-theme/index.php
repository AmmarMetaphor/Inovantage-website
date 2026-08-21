<?php
/**
 * Fallback template required by WordPress. In normal operation the
 * static front page (front-page.php), the Insights archive (home.php),
 * bespoke page templates and single.php handle every route on this site,
 * so this file is only reached for request types this theme does not
 * otherwise define a template for (for example an uncategorised
 * archive), and it degrades gracefully rather than erroring.
 */

get_header();
?>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="insights-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					if ( 'post' === get_post_type() ) {
						inovantage_insight_card( get_the_ID(), false );
					} else {
						?>
						<article class="prose">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</article>
						<?php
					}
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'inovantage' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
