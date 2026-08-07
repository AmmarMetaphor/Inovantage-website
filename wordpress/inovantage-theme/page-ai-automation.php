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
			<p class="eyebrow"><?php esc_html_e( 'AI automation', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Automate the repetitive work that slows good teams down.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'We map the process, choose appropriate tools, build the workflow, keep people in control and document how the system works.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss an automation opportunity', 'inovantage' ); ?></a><a class="button button-secondary" href="#examples"><?php esc_html_e( 'See what can be automated', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Lead routing', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Support triage', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'Document processing', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Reporting', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'automation' ); ?></span>
		</div>
	</div>
</section>

<section class="section" id="examples">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'High-value opportunities', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Start where volume, delay and repetition meet.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'Good automation removes predictable manual steps while keeping human judgement at the points where it matters.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Enquiry handling', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Capture form, email or chat enquiries; extract key details; qualify the request; assign an owner; and trigger a timely response.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Customer support', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Classify common requests, retrieve approved information, draft replies and escalate exceptions to a person.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Documents and data', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Read structured information from invoices, forms or reports and move validated data into the right system.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Operations and reporting', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Combine data, create recurring summaries, notify the right people and keep an audit trail of what happened.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content operations', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Generate first drafts from approved inputs, route work for review and prevent publication until an authorised person approves it.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Our approach', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Automation with safeguards, not blind autopilot.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Every workflow is designed around permissions, exception handling, data sensitivity and a clear owner.', 'inovantage' ); ?></p></div>
		<div class="card-grid-3">
			<article class="info-card"><h3><?php esc_html_e( '1. Process audit', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We document triggers, inputs, decisions, systems, handoffs, delays and failure points.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '2. Solution design', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We decide what should be automated, what needs approval and how errors will be detected and recovered.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '3. Build and test', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We connect the tools, test realistic cases, log outcomes and verify access controls.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '4. Controlled launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We begin with a limited workflow or audience, monitor results and adjust before wider use.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '5. Documentation', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Your team receives a practical guide covering operation, ownership, exceptions and maintenance.', 'inovantage' ); ?></p></article>
			<article class="info-card"><h3><?php esc_html_e( '6. Improvement', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We review real usage and prioritise changes that improve reliability, speed or customer experience.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Responsible delivery', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Keep people accountable for important decisions.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Automation should support your team, not create an invisible process nobody understands.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Human approval', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Require review before external messages, sensitive changes or publication.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Clear logs', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Record key events so the team can understand what ran and why.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Exception paths', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Escalate uncertain or unusual cases rather than forcing a poor answer.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Data restraint', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Use the minimum data required and avoid exposing confidential information unnecessarily.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Before starting an automation project.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Do we need to replace our existing software?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Often, no. Many useful automations connect tools you already use. We first check the available APIs, permissions and data quality before recommending a change.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Can an AI system publish or contact customers automatically?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'It can, but that is not always wise. For higher-risk messages or public content, we normally recommend a review and approval step until the workflow has demonstrated reliable performance.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'How do we choose the first process?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Look for work that happens often, follows repeatable rules, causes delays and has a measurable outcome. Avoid beginning with a rare process full of exceptions.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens when the automation fails?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The workflow should log the failure, notify an owner and preserve enough context for a person to complete or retry the task. Failure handling is part of the design, not an afterthought.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Which repeated task would you most like to remove?', 'inovantage' ); ?></h2><p><?php esc_html_e( 'We can assess the workflow and recommend a safe, practical first automation.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request an automation review', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
