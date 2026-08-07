<?php
/**
 * Single Insight article template.
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_id     = get_the_ID();
	$categories  = get_the_category( $post_id );
	$category    = ! empty( $categories ) ? $categories[0]->name : __( 'Digital Growth', 'inovantage' );
	$reading     = inovantage_reading_time( get_post_field( 'post_content', $post_id ) );
	$author_name = get_the_author_meta( 'display_name' ) ?: inovantage_company( 'name' );
	?>

	<section class="article-hero">
		<div class="container container-narrow">
			<a class="back-link" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>">&larr; <?php esc_html_e( 'Back to insights', 'inovantage' ); ?></a>
			<div class="insight-meta"><span><?php echo esc_html( $category ); ?></span><span><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span><span><?php echo esc_html( $reading ); ?> <?php esc_html_e( 'min read', 'inovantage' ); ?></span></div>
			<h1><?php the_title(); ?></h1>
			<?php if ( get_the_excerpt() ) : ?>
				<p class="article-deck"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<p class="article-author"><?php esc_html_e( 'By', 'inovantage' ); ?> <?php echo esc_html( $author_name ); ?></p>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="article-hero-image"><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>
		</div>
	</section>

	<section class="section article-section">
		<div class="container container-article">
			<article class="prose">
				<?php the_content(); ?>
			</article>
			<aside class="article-cta">
				<div>
					<p class="eyebrow"><?php esc_html_e( 'Make it practical', 'inovantage' ); ?></p>
					<h2><?php esc_html_e( 'Turn the idea into a working system.', 'inovantage' ); ?></h2>
					<p><?php esc_html_e( 'Tell us what is taking too long, underperforming, or ready to be built.', 'inovantage' ); ?></p>
				</div>
				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a conversation', 'inovantage' ); ?></a>
			</aside>
		</div>
	</section>

	<?php
	$related_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => 2,
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);
	if ( ! empty( $categories ) ) {
		$related_args['category__in'] = array( $categories[0]->term_id );
	}
	$related = new WP_Query( $related_args );
	if ( ! $related->have_posts() && ! empty( $categories ) ) {
		$related = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 2,
				'post__not_in'        => array( $post_id ),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
	}
	if ( $related->have_posts() ) :
		?>
		<section class="section section-soft">
			<div class="container">
				<div class="section-heading">
					<div><p class="eyebrow"><?php esc_html_e( 'Keep learning', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Related insights', 'inovantage' ); ?></h2></div>
					<a class="text-link" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'View all insights', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
				</div>
				<div class="insights-grid">
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						inovantage_insight_card( get_the_ID(), true );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<?php
	endif;

endwhile;

get_footer();
