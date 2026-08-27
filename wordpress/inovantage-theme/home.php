<?php
/**
 * The Articles & Guides archive.
 *
 * WordPress automatically routes here whenever the "Posts page" set in
 * Settings -> Reading is requested, which is configured to be the
 * "Articles & Guides" page at /articles-and-guides/ by inc/content-setup.php.
 * The hero deliberately carries no image: the copy takes a single readable
 * column (.page-hero-solo) instead of the two-column page-hero grid.
 */

get_header();
?>

<section class="page-hero">
	<div class="container">
		<div class="page-hero-solo">
			<p class="eyebrow"><?php esc_html_e( 'Guidance for digital growth', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Articles & Guides', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Explore clear, commercially focused thinking on automation, website conversion, content operations and application development. Each article is designed to help business leaders identify opportunities, avoid unnecessary complexity and make more confident digital investments.', 'inovantage' ); ?></p>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php inovantage_insight_filters(); ?>
		<div class="insights-grid">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					inovantage_insight_card( get_the_ID(), false );
				endwhile;
				?>
			<?php else : ?>
				<p><?php esc_html_e( 'No articles have been published yet.', 'inovantage' ); ?></p>
			<?php endif; ?>
		</div>

		<?php
		the_posts_pagination(
			array(
				'prev_text' => __( 'Newer', 'inovantage' ),
				'next_text' => __( 'Older', 'inovantage' ),
			)
		);
		?>
	</div>
</section>

<section class="section section-tight">
	<div class="container">
		<div class="cta-panel">
			<div><h2><?php esc_html_e( 'Ready to apply these ideas to your business?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Share the opportunity, bottleneck or digital investment you are considering. We will help you identify a practical way forward.', 'inovantage' ); ?></p></div>
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a Conversation', 'inovantage' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
