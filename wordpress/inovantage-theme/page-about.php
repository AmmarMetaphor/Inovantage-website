<?php
/**
 * Template Name: About
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'About Inovantage', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'A practical digital partner for businesses ready to work smarter.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'We bring automation, design, content operations and software development together around one principle: technology should make a useful difference to the people using it.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/about-hero.png" width="1536" height="1024" alt="<?php esc_attr_e( 'Collaboration, planning and practical digital delivery.', 'inovantage' ); ?>" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Why Inovantage', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Connected thinking for connected work.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'A website, content plan, automation and app often touch the same customer journey and the same internal data. Treating them as isolated tasks creates unnecessary gaps.', 'inovantage' ); ?></p></div>
		<div class="prose">
			<p><?php esc_html_e( 'Inovantage is built to look across those boundaries. We consider what the customer sees, what the team has to do behind the scenes, where information moves and where a decision needs a person.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'The goal is not to force every project into a large transformation programme. It is to identify the smallest coherent improvement that can be launched, measured and built upon.', 'inovantage' ); ?></p>
			<h3><?php esc_html_e( 'What that means in practice', 'inovantage' ); ?></h3>
			<ul>
				<li><?php esc_html_e( 'We ask about the current process before recommending technology.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'We distinguish facts, assumptions and decisions that still need evidence.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'We design review points into content and high-impact automations.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'We favour understandable, maintainable solutions over avoidable complexity.', 'inovantage' ); ?></li>
				<li><?php esc_html_e( 'We document ownership and the next steps after launch.', 'inovantage' ); ?></li>
			</ul>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Operating principles', 'inovantage' ); ?></p><h2><?php esc_html_e( 'How we want every project to feel.', 'inovantage' ); ?></h2></div></div>
		<div class="values-grid">
			<article class="value-card"><span>01 / <?php esc_html_e( 'USEFUL', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Start with the outcome', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A strong brief explains what should improve, for whom and how the business will know.', 'inovantage' ); ?></p></article>
			<article class="value-card"><span>02 / <?php esc_html_e( 'CLEAR', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Make decisions visible', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Scope, assumptions, responsibilities, review dates and trade-offs should be understandable.', 'inovantage' ); ?></p></article>
			<article class="value-card"><span>03 / <?php esc_html_e( 'HUMAN', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Keep judgement where it matters', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Automation and AI support people; they do not remove accountability for important decisions.', 'inovantage' ); ?></p></article>
			<article class="value-card"><span>04 / <?php esc_html_e( 'FOCUSED', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Build the essential first', 'inovantage' ); ?></h3><p><?php esc_html_e( 'A useful first release creates more learning than an oversized plan that never reaches users.', 'inovantage' ); ?></p></article>
			<article class="value-card"><span>05 / <?php esc_html_e( 'HONEST', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Use evidence, not invented proof', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Claims, case studies and results should be verified before they appear on a public website.', 'inovantage' ); ?></p></article>
			<article class="value-card"><span>06 / <?php esc_html_e( 'IMPROVING', 'inovantage' ); ?></span><h3><?php esc_html_e( 'Launch is a checkpoint', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Real usage reveals what to refine, remove, automate or build next.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container review-grid">
		<div><p class="eyebrow"><?php esc_html_e( 'Good collaboration', 'inovantage' ); ?></p><h2><?php esc_html_e( 'What we ask from clients.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'The best work happens when the right people provide context, make decisions and review progress at the agreed time.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid" style="grid-template-columns:repeat(2,minmax(0,1fr))">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'A decision owner', 'inovantage' ); ?></h3><p><?php esc_html_e( 'One person coordinates feedback and confirms the final direction.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Access to context', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Relevant systems, examples, content, constraints and subject experts are available.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Timely reviews', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Feedback arrives within the agreed window so momentum is not lost.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Verified claims', 'inovantage' ); ?></h3><p><?php esc_html_e( 'The client confirms legal details, statistics, testimonials and public statements.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Have a digital problem that crosses more than one service?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'That is often where connected thinking creates the most value.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Tell us about it', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
