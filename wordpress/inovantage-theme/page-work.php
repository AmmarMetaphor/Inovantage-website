<?php
/**
 * Template Name: Solutions (Work)
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="page-hero">
	<div class="container page-hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Solution blueprints', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Examples of the systems Inovantage can design and build.', 'inovantage' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'These are representative solution patterns, not claims about named client results. Replace or expand them with verified case studies as your portfolio grows.', 'inovantage' ); ?></p>
		</div>
		<div class="page-hero-visual">
			<img src="<?php echo esc_url( INOVANTAGE_URI ); ?>/assets/images/heroes/solutions-hero.png" width="1536" height="1024" alt="<?php esc_attr_e( 'Connected business workflows coordinated through one digital system.', 'inovantage' ); ?>" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="section">
	<div class="container blueprint-grid">
		<article class="blueprint">
			<div class="blueprint-visual">
				<span class="blueprint-label"><?php esc_html_e( 'AI automation + website', 'inovantage' ); ?></span>
				<ol class="workflow-rail">
					<li class="workflow-step"><span class="workflow-step-marker">1</span><span class="workflow-step-card"><?php esc_html_e( 'Enquiry captured', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">2</span><span class="workflow-step-card"><?php esc_html_e( 'Qualification', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">3</span><span class="workflow-step-card"><?php esc_html_e( 'Routing', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">4</span><span class="workflow-step-card"><?php esc_html_e( 'CRM and response', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">5</span><span class="workflow-step-card"><?php esc_html_e( 'Human review', 'inovantage' ); ?></span></li>
				</ol>
			</div>
			<div class="blueprint-copy">
				<p class="eyebrow"><?php esc_html_e( 'Blueprint 01', 'inovantage' ); ?></p>
				<h2><?php esc_html_e( 'Automated lead operations', 'inovantage' ); ?></h2>
				<p><?php esc_html_e( 'A connected enquiry journey that reduces manual triage while keeping an owner responsible for the opportunity.', 'inovantage' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Capture structured information from a high-converting form.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Classify the service, urgency and fit against agreed rules.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Create or update a CRM record and assign the right person.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Draft an acknowledgement using approved language.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Escalate incomplete or unusual enquiries for human review.', 'inovantage' ); ?></li>
				</ul>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'Explore AI automation', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</div>
		</article>

		<article class="blueprint">
			<div class="blueprint-visual">
				<span class="blueprint-label"><?php esc_html_e( 'Content + approval', 'inovantage' ); ?></span>
				<ol class="workflow-rail">
					<li class="workflow-step"><span class="workflow-step-marker">1</span><span class="workflow-step-card"><?php esc_html_e( 'Content drafted', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">2</span><span class="workflow-step-card"><?php esc_html_e( 'Brand and policy checks', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">3</span><span class="workflow-step-card"><?php esc_html_e( 'Stakeholder review', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">4</span><span class="workflow-step-card"><?php esc_html_e( 'Approval recorded', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">5</span><span class="workflow-step-card"><?php esc_html_e( 'Scheduled publication', 'inovantage' ); ?></span></li>
				</ol>
			</div>
			<div class="blueprint-copy">
				<p class="eyebrow"><?php esc_html_e( 'Blueprint 02', 'inovantage' ); ?></p>
				<h2><?php esc_html_e( 'Content Approval & Publishing Workflow', 'inovantage' ); ?></h2>
				<p><?php esc_html_e( 'A repeatable system for producing consistent social posts without losing brand control or publishing unapproved work.', 'inovantage' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Set content themes, platforms, formats and monthly priorities.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Prepare copy and visuals in a visible production queue.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Request consolidated comments from authorised reviewers.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Record approval before content enters the scheduling queue.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Use performance learning to shape the next cycle.', 'inovantage' ); ?></li>
				</ul>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'Explore social media management', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</div>
		</article>

		<article class="blueprint">
			<div class="blueprint-visual">
				<span class="blueprint-label"><?php esc_html_e( 'App + automation', 'inovantage' ); ?></span>
				<ol class="workflow-rail">
					<li class="workflow-step"><span class="workflow-step-marker">1</span><span class="workflow-step-card"><?php esc_html_e( 'Customer submits request', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">2</span><span class="workflow-step-card"><?php esc_html_e( 'Team reviews and updates stage', 'inovantage' ); ?></span></li>
					<li class="workflow-step"><span class="workflow-step-marker">3</span><span class="workflow-step-card"><?php esc_html_e( 'Portal status + notifications', 'inovantage' ); ?></span></li>
				</ol>
			</div>
			<div class="blueprint-copy">
				<p class="eyebrow"><?php esc_html_e( 'Blueprint 03', 'inovantage' ); ?></p>
				<h2><?php esc_html_e( 'Customer request portal', 'inovantage' ); ?></h2>
				<p><?php esc_html_e( 'A focused web application that replaces scattered emails with a clear status, accountable ownership and relevant notifications.', 'inovantage' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Secure sign-in and role-based access.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Structured request form with supporting files.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Internal workflow stages, notes and assignment.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Customer-visible progress and approved documents.', 'inovantage' ); ?></li>
					<li><?php esc_html_e( 'Automated reminders and exception alerts.', 'inovantage' ); ?></li>
				</ul>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'Explore app development', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</div>
		</article>
	</div>
</section>

<section class="section section-soft">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Add real case studies later', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Turn completed work into credible evidence.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'A strong case study is specific enough to be useful and careful enough to be accurate.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Context', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Who the client serves, what was happening and why the issue mattered.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Challenge', 'inovantage' ); ?></strong><span><?php esc_html_e( 'The verified bottleneck, risk or opportunity without exaggerating the starting point.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Approach', 'inovantage' ); ?></strong><span><?php esc_html_e( 'The important decisions, work completed and how stakeholders were involved.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Outcome', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Only publish metrics, quotes and claims that the client has checked and approved.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Next step', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Explain what continued after launch and what the project enabled.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Which blueprint is closest to the system you need?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'We can adapt the pattern around your users, tools, policies and priorities.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss a solution', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
