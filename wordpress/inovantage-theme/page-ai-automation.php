<?php
/**
 * Template Name: Service — AI automation
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="hero service-detail-hero">
	<div class="container hero-grid">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'AI automation for business', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Scale output without scaling repetitive work.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'Inovantage builds practical AI and workflow automation that helps B2B teams respond faster, reduce administrative pressure and create capacity for higher-value work.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book an Automation Review', 'inovantage' ); ?></a><a class="button button-secondary" href="#opportunities"><?php esc_html_e( 'Explore Automation Opportunities', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Lead routing', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Support triage', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'Document processing', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Reporting', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'automation' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="opportunities">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Where automation creates value', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Start where volume, delay and repetition affect performance.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'Good automation removes predictable manual steps while keeping human judgement at the points where it matters.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Lead management', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Capture, qualify, route and follow up with enquiries faster, helping your business protect more revenue opportunities.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Customer support', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Categorise common requests, retrieve approved information, prepare responses and escalate complex cases to the right person.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Documents and data', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Extract, validate and move information between forms, documents and business systems with less repeated data entry.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Operations and reporting', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Consolidate information, generate recurring reports and notify decision-makers when attention is required.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content operations', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Accelerate content preparation and distribution while retaining approval before anything is published.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Internal administration', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Automate routine reminders, status updates, task creation and record management so teams can focus on work requiring judgement.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'The commercial case for automation', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Create more capacity from the team you already have.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Automation earns its place when it changes a commercial measure the business already cares about.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid outcome-grid-5">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Faster response', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Reduce the time between a customer action and an appropriate business response.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Lower operational friction', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Remove repeated handoffs, copying and manual status checking.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Greater consistency', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Ensure important routine steps happen reliably across customers and teams.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Improved visibility', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Create clearer records of activity, ownership and exceptions.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>05</span><h3><?php esc_html_e( 'Scalable delivery', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Handle increasing volumes without recreating every operational step manually.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'A dependable delivery method', 'inovantage' ); ?></p><h2><?php esc_html_e( 'From process audit to measured improvement.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Every workflow is designed around permissions, exception handling, data sensitivity and a clear owner.', 'inovantage' ); ?></p></div>
		<div class="card-grid-3">
			<article class="info-card"><h3><?php esc_html_e( '1. Process audit', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We document triggers, inputs, decisions, systems, handoffs, delays and failure points.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '2. Solution design', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We decide what should be automated, what needs approval and how errors will be detected and recovered.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '3. Build and test', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We connect the tools, test realistic cases, log outcomes and verify access controls.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '4. Controlled launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We begin with a limited workflow or audience, monitor results and adjust before wider use.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '5. Documentation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Your team receives a practical guide covering operation, ownership, exceptions and maintenance.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '6. Improvement', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We review real usage and prioritise changes that improve capacity, speed or customer experience.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark" id="responsible">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Responsible automation', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Automate the process. Keep people accountable.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Important decisions, sensitive communication and exceptional cases should remain visible to the right person.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid outcome-grid-6">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Defined human approval points', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Review steps are built in before external messages, publication or sensitive changes.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Clear ownership and escalation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Every workflow has a named owner and a route for cases that need a person.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Activity logs and status visibility', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Key events are recorded so the team can see what ran, when and why.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Exception handling', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Unusual or uncertain cases are flagged for judgement rather than forced through.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>05</span><h3><?php esc_html_e( 'Appropriate access controls', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Systems and data are used with the minimum access the workflow requires.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>06</span><h3><?php esc_html_e( 'Practical operating documentation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Your team receives clear guidance on running, checking and maintaining the system.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Before starting an automation project.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Do we need to replace our existing software?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Often, no. Many valuable automations connect the tools your team already uses. We first check the available integrations, permissions and data quality, then recommend a change only where it clearly improves the outcome.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can an AI system publish or contact customers automatically?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'It can, but that is not always the right choice commercially. For higher-impact messages or public content we normally recommend a review and approval step until the workflow has demonstrated reliable performance, so speed never comes at the cost of your reputation.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'How do we choose the first process?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Look for work that happens often, follows repeatable rules, causes delays and has a measurable commercial outcome, such as lead follow-up or recurring reporting. Avoid beginning with a rare process full of exceptions.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens when the automation fails?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The workflow logs the failure, notifies an owner and preserves enough context for a person to complete or retry the task. Failure handling is part of the design from the start, so a technical problem never becomes a lost customer.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( "Which repeated process is limiting your team's capacity?", 'inovantage' ); ?></h2><p><?php esc_html_e( 'Show us where time is being lost, responses are delayed or information is repeatedly moved by hand. We will help identify whether automation can create a worthwhile improvement.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request an Automation Review', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
