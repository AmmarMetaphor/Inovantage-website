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
			<p class="eyebrow"><?php esc_html_e( 'Social media management', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Consistent content, with your approval before it goes live.', 'inovantage' ); ?></h1>
			<p><?php esc_html_e( 'We turn your expertise, offers and real business activity into a structured social media plan with visible drafts, clear review dates and dependable scheduling.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss social media support', 'inovantage' ); ?></a><a class="button button-secondary" href="#workflow"><?php esc_html_e( 'See the approval workflow', 'inovantage' ); ?></a></div>
		</div>
		<div class="service-orbit" aria-hidden="true">
			<span class="orbit-tag orbit-tag-one"><?php esc_html_e( 'Strategy', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-two"><?php esc_html_e( 'Copy', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-three"><?php esc_html_e( 'Design', 'inovantage' ); ?></span><span class="orbit-tag orbit-tag-four"><?php esc_html_e( 'Approval', 'inovantage' ); ?></span>
			<span class="orbit-core"><?php inovantage_icon_e( 'social' ); ?></span>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'What we manage', 'inovantage' ); ?></p><h2><?php esc_html_e( 'A repeatable content operation, not a last-minute posting habit.', 'inovantage' ); ?></h2><p class="lede"><?php esc_html_e( 'The service can be tailored by platform and volume, while keeping strategy, production, approval and reporting connected.', 'inovantage' ); ?></p></div>
		<ul class="feature-list">
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Channel and audience strategy', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Choose the platforms, themes, formats and posting rhythm that suit your goals and capacity.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Content calendar', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Plan topics, campaigns, business moments and calls to action before production starts.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Copy and creative', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Prepare captions, graphics, carousels, short-form concepts and platform-specific variations.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Review and approval', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Present drafts in an organised queue, capture comments and obtain approval before scheduling.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Scheduling and publishing', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Schedule approved posts at agreed times and check that assets, links and tags are correct.', 'inovantage' ); ?></span></div></li>
			<li><?php inovantage_icon_e( 'check' ); ?><div><strong><?php esc_html_e( 'Performance reporting', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Review reach, engagement, clicks, enquiries and content patterns to guide the next cycle.', 'inovantage' ); ?></span></div></li>
		</ul>
	</div>
</section>

<section class="section section-soft" id="workflow">
	<div class="container review-grid">
		<div class="review-copy">
			<p class="eyebrow"><?php esc_html_e( 'Approval workflow', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'Review posts before publication.', 'inovantage' ); ?></h2>
			<p class="lede"><?php esc_html_e( 'Every post follows a visible path, so stakeholders know what needs attention and nothing is scheduled without the required approval.', 'inovantage' ); ?></p>
			<ol>
				<li><strong><?php esc_html_e( 'Draft:', 'inovantage' ); ?></strong> <?php esc_html_e( 'copy and creative are prepared against the agreed calendar.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'In review:', 'inovantage' ); ?></strong> <?php esc_html_e( 'your team receives a review window and leaves comments in one place.', 'inovantage' ); ?></li>
				<li><strong><?php esc_html_e( 'Ready:', 'inovantage' ); ?></strong> <?php esc_html_e( 'requested changes are complete and an authorised reviewer approves the post.', 'inovantage' ); ?></li>
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
		<div class="section-heading"><div><p class="eyebrow"><?php esc_html_e( 'A useful content mix', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Build familiarity, credibility and action over time.', 'inovantage' ); ?></h2></div><p><?php esc_html_e( 'Not every post needs to sell. A balanced programme gives people reasons to pay attention and remember your business.', 'inovantage' ); ?></p></div>
		<div class="outcome-grid">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Teach', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Answer real questions, explain decisions and make complex subjects easier to understand.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Show', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Share process, examples, product details and evidence of how the work is done.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Connect', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Highlight people, partnerships, events, opinions and relevant moments in the business.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Invite', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Make the next step clear when an audience member is ready to enquire, book or learn more.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split-grid">
		<div class="sticky-copy"><p class="eyebrow"><?php esc_html_e( 'Frequently asked questions', 'inovantage' ); ?></p><h2><?php esc_html_e( 'How the service works.', 'inovantage' ); ?></h2></div>
		<div class="faq-list">
			<details class="faq-item"><summary><?php esc_html_e( 'Can we approve every post?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Yes. The standard process includes a review stage before scheduling. You can nominate one or more authorised reviewers and agree how quickly comments should be returned.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'What happens if we miss the review deadline?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The post remains unpublished unless a different rule has been agreed. We can move it to a later slot rather than publish an unapproved version.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Do you respond to comments and messages?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'Community management can be included with clear response guidance and escalation rules. Sensitive, contractual or unusual conversations should be passed to an appropriate person in your team.', 'inovantage' ); ?></p></div></details>
			<details class="faq-item"><summary><?php esc_html_e( 'Which platforms do you support?', 'inovantage' ); ?></summary><div><p><?php esc_html_e( 'The exact mix depends on your audience and objectives. Common programmes include LinkedIn, Instagram, Facebook and short-form video platforms, but we avoid recommending channels without a clear reason.', 'inovantage' ); ?></p></div></details>
		</div>
	</div>
</section>

<?php if ( get_the_content() ) : ?>
	<section class="section"><div class="container"><div class="prose"><?php the_content(); ?></div></div></section>
<?php endif; ?>

<section class="section section-tight"><div class="container"><div class="cta-panel"><div><h2><?php esc_html_e( 'Build a social media rhythm your team can trust.', 'inovantage' ); ?></h2><p><?php esc_html_e( 'Tell us which channels matter, what content you already have and who needs to approve posts.', 'inovantage' ); ?></p></div><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan your content workflow', 'inovantage' ); ?></a></div></div></section>

	<?php
endwhile;

get_footer();
?>
