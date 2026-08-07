<?php
/**
 * Generic page fallback for any page without a dedicated template.
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="section">
		<div class="container container-narrow">
			<h1><?php the_title(); ?></h1>
			<div class="prose">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
