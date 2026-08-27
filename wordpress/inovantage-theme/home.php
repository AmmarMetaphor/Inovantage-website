<?php
/**
 * The Insights (Articles & Guides) archive.
 *
 * WordPress automatically routes here whenever the "Posts page" set in
 * Settings -> Reading is requested, which is configured to be the
 * "Insights" page at /insights/ by inc/content-setup.php.
 */

get_header();
?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Insights for digital growth', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Practical guidance for better business decisions.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Explore clear, commercially focused thinking on automation, website conversion, content operations and application development. Each article is designed to help business leaders identify opportunities, avoid unnecessary complexity and make more confident digital investments.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/articles-guides-hero.png" width="1536" height="1024" alt="<?php esc_attr_e( 'Articles, practical guides and digital decision-making resources.', 'inovantage' ); ?>" loading="eager" decoding="async">
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
				<p><?php esc_html_e( 'No insights have been published yet.', 'inovantage' ); ?></p>
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
