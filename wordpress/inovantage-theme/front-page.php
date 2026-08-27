<?php
/**
 * The homepage template — carries the approved B2B growth-partner copy: the
 * hero, connected-capability cards, business outcomes, the five-stage
 * delivery process, the oversight panel and latest insights sections. The
 * hero renders the orbital artwork as a decorative background layer; the
 * headline, body copy and calls to action stay as semantic markup.
 */

get_header();

$inovantage_hero_art        = INOVANTAGE_URI . '/assets/images/heroes/home-hero-orbital.webp';
$inovantage_hero_art_srcset = sprintf(
	'%1$s/assets/images/heroes/home-hero-orbital-760.webp 760w, %1$s/assets/images/heroes/home-hero-orbital-1180.webp 1180w, %1$s/assets/images/heroes/home-hero-orbital.webp 1672w',
	INOVANTAGE_URI
);
?>

<section class="hero hero-orbital" data-hero-parallax>
	<div class="hero-orbital-media" aria-hidden="true">
		<img class="hero-orbital-art" src="<?php echo esc_url( $inovantage_hero_art ); ?>" srcset="<?php echo esc_attr( $inovantage_hero_art_srcset ); ?>" sizes="(max-width: 760px) 156vw, (max-width: 900px) 142vw, (max-width: 1040px) 100vw, 78vw" width="1672" height="941" alt="" fetchpriority="high" decoding="async">
	</div>
	<div class="hero-orbital-veil" aria-hidden="true"></div>
	<div class="container hero-orbital-inner">
		<div class="hero-copy">
			<p class="eyebrow"><?php esc_html_e( 'AI automation · Digital experiences · Business growth', 'inovantage' ); ?></p>
			<h1><?php esc_html_e( 'Build a business that ', 'inovantage' ); ?><span><?php esc_html_e( 'needs less of you.', 'inovantage' ); ?></span></h1>
			<p><?php esc_html_e( 'Inovantage creates connected automation, high-converting websites, content operations and business applications that help B2B companies win more opportunities, reduce manual work and deliver consistently as they grow.', 'inovantage' ); ?></p>
			<div class="button-row">
				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Growth Consultation', 'inovantage' ); ?></a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Explore Solutions', 'inovantage' ); ?></a>
			</div>
			<p class="hero-proof"><span><?php esc_html_e( 'Built for B2B growth', 'inovantage' ); ?></span><span><?php esc_html_e( 'Human oversight where it matters', 'inovantage' ); ?></span><span><?php esc_html_e( 'Designed around measurable outcomes', 'inovantage' ); ?></span></p>
		</div>
	</div>
</section>

<section class="section" id="services">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Four connected capabilities', 'inovantage' ); ?></p><h2><?php esc_html_e( 'The systems behind a more scalable business.', 'inovantage' ); ?></h2></div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Explore All Solutions', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
		</div>
		<div class="section-intro">
			<p><?php esc_html_e( 'Growth becomes difficult when sales, marketing, customer service and delivery depend on disconnected tools and repetitive manual work.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'Inovantage connects the digital systems your customers experience with the workflows your team relies on, creating a stronger route from first enquiry to long-term customer value.', 'inovantage' ); ?></p>
		</div>
		<div class="services-grid">
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'automation' ); ?></span>
				<h3><?php esc_html_e( 'AI Automation', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Increase capacity without increasing repetitive workload. Automate lead handling, customer support, reporting, document processing and routine administration while keeping your team in control of important decisions.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/ai-automation/' ) ); ?>"><?php esc_html_e( 'Explore AI Automation', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'web' ); ?></span>
				<h3><?php esc_html_e( 'Website Design and Development', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Turn more of your website traffic into qualified opportunities. Build a fast, credible and conversion-focused website that explains your value, strengthens buyer confidence and guides prospects towards the right action.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/website-design/' ) ); ?>"><?php esc_html_e( 'Explore Website Design', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'social' ); ?></span>
				<h3><?php esc_html_e( 'Social Media Management', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Build visibility, credibility and demand through consistent content. Turn your expertise and business activity into a structured social media programme designed to reach the right audience and support commercial growth.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/social-media-management/' ) ); ?>"><?php esc_html_e( 'Explore Social Media Management', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
			<article class="service-card">
				<span class="service-icon"><?php inovantage_icon_e( 'app' ); ?></span>
				<h3><?php esc_html_e( 'App Development', 'inovantage' ); ?></h3>
				<p><?php esc_html_e( 'Create digital products that improve delivery and support growth. Develop customer portals, dashboards, internal tools and focused applications that simplify important tasks, connect information and create scalable customer experiences.', 'inovantage' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/app-development/' ) ); ?>"><?php esc_html_e( 'Explore App Development', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
			</article>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Business outcomes', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Technology should create measurable commercial value.', 'inovantage' ); ?></h2></div>
			<p><?php esc_html_e( 'Every Inovantage solution begins with the result the business needs, not the tool being considered.', 'inovantage' ); ?></p>
		</div>
		<div class="outcome-grid outcome-grid-5">
			<article class="outcome-card"><span>01</span><h3><?php esc_html_e( 'Increase revenue opportunities', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Capture, qualify and follow up with more potential customers before valuable opportunities are lost.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>02</span><h3><?php esc_html_e( 'Improve conversion', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Create clearer digital journeys that move buyers from interest to enquiry, consultation or purchase.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>03</span><h3><?php esc_html_e( 'Expand operational capacity', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Reduce repeated administration so your team can handle greater demand without the same increase in manual workload.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>04</span><h3><?php esc_html_e( 'Deliver more consistently', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Use connected workflows, clear ownership and dependable systems to improve the customer experience.', 'inovantage' ); ?></p></article>
			<article class="outcome-card"><span>05</span><h3><?php esc_html_e( 'Scale with greater visibility', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Bring information, activity and performance into clearer systems so leaders can make faster, better-informed decisions.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'A clear delivery process', 'inovantage' ); ?></p><h2><?php esc_html_e( 'From business challenge to measurable improvement.', 'inovantage' ); ?></h2></div>
			<p><?php esc_html_e( 'You always know what is being decided, built, reviewed and released.', 'inovantage' ); ?></p>
		</div>
		<div class="process-grid process-grid-5">
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Discover', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We identify the commercial goal, current barriers, users, systems and measures of success.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Design', 'inovantage' ); ?></h3><p><?php esc_html_e( 'We develop the customer journey, workflow, content or product direction needed to achieve the outcome.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Build', 'inovantage' ); ?></h3><p><?php esc_html_e( 'The solution is created and tested through visible milestones, with feedback gathered before final release.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Launch', 'inovantage' ); ?></h3><p><?php esc_html_e( 'The approved system is introduced with clear ownership, documentation and practical guidance.', 'inovantage' ); ?></p></article>
			<article class="process-card"><span class="process-number"></span><h3><?php esc_html_e( 'Improve', 'inovantage' ); ?></h3><p><?php esc_html_e( 'Performance and real usage guide the next round of optimisation, automation or development.', 'inovantage' ); ?></p></article>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container review-grid">
		<div class="review-copy">
			<p class="eyebrow"><?php esc_html_e( 'Control without slowing growth', 'inovantage' ); ?></p>
			<h2><?php esc_html_e( 'Move faster without losing oversight.', 'inovantage' ); ?></h2>
			<p class="lede"><?php esc_html_e( 'Automation and content systems should accelerate delivery while protecting important business decisions. Inovantage builds clear approval points into customer communication, content publishing and higher-impact workflows.', 'inovantage' ); ?></p>
			<p><?php esc_html_e( 'Your team can see what is being prepared, what requires review and what is ready to go live, creating speed, consistency and accountability without unnecessary bottlenecks.', 'inovantage' ); ?></p>
			<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/services/ai-automation/#responsible' ) ); ?>"><?php esc_html_e( 'See How We Build Responsible Systems', 'inovantage' ); ?></a></div>
		</div>
		<div class="approval-board" aria-label="<?php esc_attr_e( 'Example content approval board', 'inovantage' ); ?>">
			<div class="approval-columns">
				<div class="approval-column"><h3><?php esc_html_e( 'Draft', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Customer question carousel', 'inovantage' ); ?></strong><span><?php esc_html_e( 'In preparation', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-review"><h3><?php esc_html_e( 'In review', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Automation explainer', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Awaiting comments', 'inovantage' ); ?></span></div></div>
				<div class="approval-column is-ready"><h3><?php esc_html_e( 'Ready', 'inovantage' ); ?></h3><div class="approval-item"><strong><?php esc_html_e( 'Website planning guide', 'inovantage' ); ?></strong><span><?php esc_html_e( 'Approved to go live', 'inovantage' ); ?></span></div></div>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading">
			<div><p class="eyebrow"><?php esc_html_e( 'Insights for business leaders', 'inovantage' ); ?></p><h2><?php esc_html_e( 'Make stronger digital investment decisions.', 'inovantage' ); ?></h2></div>
			<a class="text-link" href="<?php echo esc_url( home_url( '/articles-and-guides/' ) ); ?>"><?php esc_html_e( 'View Articles and Guides', 'inovantage' ); ?> <?php inovantage_icon_e( 'arrow' ); ?></a>
		</div>
		<div class="section-intro">
			<p><?php esc_html_e( 'Explore practical guidance on business automation, conversion-focused websites, content operations and application development, written for leaders deciding where digital improvement can create the greatest value.', 'inovantage' ); ?></p>
		</div>
		<div class="insights-grid">
			<?php
			$inovantage_latest = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'no_found_rows'  => true,
					'ignore_sticky_posts' => true,
				)
			);
			if ( $inovantage_latest->have_posts() ) :
				while ( $inovantage_latest->have_posts() ) :
					$inovantage_latest->the_post();
					inovantage_insight_card( get_the_ID(), true );
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p><?php esc_html_e( 'No insights have been published yet.', 'inovantage' ); ?></p>
				<?php
			endif;
			?>
		</div>
	</div>
</section>

<section class="section section-tight">
	<div class="container">
		<div class="cta-panel">
			<div>
				<h2><?php esc_html_e( 'What is limiting the next stage of your growth?', 'inovantage' ); ?></h2>
				<p><?php esc_html_e( 'It may be slow lead follow-up, repeated administration, an underperforming website, inconsistent marketing or a customer journey that no longer scales.', 'inovantage' ); ?></p>
				<p><?php esc_html_e( 'Tell us what is happening today and what better performance should look like. We will help you identify a practical next step.', 'inovantage' ); ?></p>
				<p class="cta-tagline"><?php esc_html_e( 'Digital systems that move your business forward.', 'inovantage' ); ?></p>
			</div>
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Growth Consultation', 'inovantage' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
