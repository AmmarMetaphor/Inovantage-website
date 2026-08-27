<?php
/**
 * Template Name: Service — Social media management
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<section class="hero service-detail-hero">
	<div class="container hero-grid">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'B2B social media management', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Turn consistent content into credibility, conversations and demand.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'Inovantage transforms your expertise, services and business activity into a structured social media programme that keeps your brand visible and supports meaningful commercial engagement.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan Your Content Strategy', 'inovantage' ); ?></a><a class="button button-secondary" href="#workflow"><?php esc_html_e( 'See the Approval Workflow', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Strategy', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Copy', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'Design', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Approval', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'social' ); ?></span>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'A connected content operation', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Move from occasional posting to purposeful communication.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'The service can be tailored by platform and volume, while keeping strategy, production, approval and performance connected to your commercial goals.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Strategy and positioning', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Define the audience, commercial goals, channels, themes and content role of each platform.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content planning', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Build a calendar around customer questions, campaigns, expertise, proof and business priorities.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Copy and creative production', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Develop platform-appropriate captions, graphics, carousels and short-form content concepts.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Review and approval', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Give stakeholders one organised place to review, comment and approve before publication.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Scheduling and publishing', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Maintain a dependable publishing rhythm using approved copy, creative, links and calls to action.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Performance learning', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Review reach, engagement, clicks, enquiries and audience behaviour to improve future content.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft" id="workflow">
	<div class="container review-grid">
		<div class="review-copy">
			<p class="eyebrow"><?php esc_html_e( 'Approval workflow', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'Every post is reviewed before it represents your brand.', 'inovantage' ); ?></h2>
			<p class="lede"><?php esc_html_e( 'Each post follows a visible path, so stakeholders know what needs attention and nothing is scheduled without the required approval.', 'inovantage' ); ?></p>
			<ol>
				<li><strong><?php esc_html_e( 'Draft:', 'inovantage' ); ?></strong> <?php esc_html_e( 'copy and creative are prepared against the agreed calendar.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'In review:', 'inovantage' ); ?></strong> <?php esc_html_e( 'your team receives a review window and leaves comments in one place.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'Approved:', 'inovantage' ); ?></strong> <?php esc_html_e( 'requested changes are complete and an authorised reviewer approves the post.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'Scheduled:', 'inovantage' ); ?></strong> <?php esc_html_e( 'the approved version is placed in the publishing queue.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'Reported:', 'inovantage' ); ?></strong> <?php esc_html_e( 'results and useful learning feed into the next content cycle.', 'inovantage' ); ?></li>
			</ol>
		</div>
		<div class="approval-board" aria-label="<?php esc_attr_e( 'Social media approval board', 'inovantage' ); ?>">
			<div class="approval-columns">
				<div class="approval-column"><h3><?php esc_html_e( 'Draft', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Customer question carousel', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Copy being refined', 'inovantage' ); ?></span></div><div class="approval-item"><strong><?php esc_html_e( 'Behind-the-scenes video', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Awaiting edit', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-review"><h3><?php esc_html_e( 'In review', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Automation myth post', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Comments requested', 'inovantage' ); ?></span></div><div class="approval-item"><strong><?php esc_html_e( 'Website checklist', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Link check needed', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-ready"><h3><?php esc_html_e( 'Approved', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'App discovery explainer', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Ready to schedule', 'inovantage' ); ?></span></div></div>
			</div>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'Content that supports the buyer journey', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Build familiarity before the sales conversation begins.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Not every post needs to sell. A balanced programme earns attention first, then makes the next step obvious when a prospect is ready.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid outcome-grid-5">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Educate', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Answer real customer questions and simplify important decisions.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Demonstrate', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Show expertise, delivery methods, products and verified examples.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Build trust', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Highlight people, partnerships, credentials and credible business activity.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Create demand', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Connect relevant problems with the value of your services.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>05</span><h3><?php esc_html_e( 'Invite action', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Give interested prospects a clear route to learn more, enquire or begin a conversation.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'How the service works.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Can we approve every post?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. The standard process includes a review stage before scheduling. You can nominate one or more authorised reviewers and agree how quickly comments should be returned so the publishing rhythm stays dependable.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens if we miss the review deadline?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The post remains unpublished unless a different rule has been agreed. We move it to a later slot rather than publish an unapproved version, so your brand is never represented by content nobody signed off.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Do you respond to comments and messages?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Community management can be included with clear response guidance and escalation rules. Sensitive, contractual or unusual conversations are passed to an appropriate person in your team.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Which platforms do you support?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The exact mix depends on where your buyers spend attention. Common B2B programmes include LinkedIn, Instagram, Facebook and short-form video platforms, but we only recommend a channel when there is a clear commercial reason for it.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Build a social media presence that supports business development.', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Tell us which audiences matter, where your business needs greater visibility and what expertise your team can share.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan Your Social Media Programme', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
