<?php
/**
 * Template Name: About
 *
 * One continuous editorial canvas: the story, the principles and the closing
 * call to action share a single fixed field that runs from below the header
 * to the footer. The markup is kept in step with the static build's
 * src/pages/about.html.
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<div class="about-canvas" data-about-canvas>

  <!-- The field. One fixed, negatively-stacked group covering the whole page.
       Everything luminous (plates, display words, grain) lives inside it, so
       the single opacity cap on .about-field bounds the brightest pixel this
       page can ever paint. Decorative throughout, hidden from assistive tech. -->
  <div class="about-field" data-about-field aria-hidden="true">
    <div class="about-plate about-plate-far"></div>
    <div class="about-plate about-plate-mid"></div>
    <div class="about-plate about-plate-near"></div>
    <div class="about-marks">
      <span class="ed-mark ed-mark-open" data-ed-mark="open">CONNECTED</span>
      <span class="ed-mark ed-mark-story" data-ed-mark="story">GROWTH</span>
      <span class="ed-mark ed-mark-values" data-ed-mark="values">PRINCIPLES</span>
      <span class="ed-mark ed-mark-close" data-ed-mark="close">SCALE</span>
    </div>
    <div class="about-grain"></div>
  </div>

  <div class="about-flow">

    <section class="about-movement about-overture" data-ed-anchor="open" aria-labelledby="about-overture-h">
      <p class="ed-label"><?php esc_html_e( 'About Inovantage', 'inovantage' ); ?></p>
      <h1 class="ed-statement ed-statement-lead" id="about-overture-h"><?php esc_html_e( 'A connected digital partner for ambitious B2B businesses.', 'inovantage' ); ?></h1>
      <p class="ed-lede"><?php esc_html_e( 'Inovantage helps companies create stronger customer journeys, more efficient operations and scalable digital services through automation, websites, content systems and application development.', 'inovantage' ); ?></p>
      <p class="ed-lede ed-tagline"><?php esc_html_e( 'Digital systems that move your business forward.', 'inovantage' ); ?></p>
    </section>

    <section class="about-movement about-story" data-ed-anchor="story" aria-labelledby="about-story-h">
      <p class="ed-label"><?php esc_html_e( 'Connected thinking creates better growth', 'inovantage' ); ?></p>
      <h2 class="ed-statement" id="about-story-h"><?php esc_html_e( 'Customers experience one business, not separate departments.', 'inovantage' ); ?></h2>
      <p class="ed-lede"><?php esc_html_e( 'That is why Inovantage looks beyond individual tools.', 'inovantage' ); ?></p>
      <div class="ed-body">
        <p><?php esc_html_e( 'We consider how prospects discover the business, how enquiries are handled, how information moves, how teams deliver the service and where digital systems can remove friction or create new value.', 'inovantage' ); ?></p>
        <p><?php esc_html_e( 'This connected approach helps businesses improve customer experience and operational capacity at the same time.', 'inovantage' ); ?></p>
      </div>
    </section>

    <section class="about-movement about-values" data-ed-anchor="values" aria-labelledby="about-values-h">
      <p class="ed-label"><?php esc_html_e( 'Operating principles', 'inovantage' ); ?></p>
      <h2 class="ed-statement" id="about-values-h"><?php esc_html_e( 'How we approach every project.', 'inovantage' ); ?></h2>
      <ol class="value-stack">
        <li><article class="value-brief" style="--v-i:1">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3><?php esc_html_e( 'Outcome-led', 'inovantage' ); ?></h3>
            <p><?php esc_html_e( 'Every project begins with the commercial or operational improvement the business needs.', 'inovantage' ); ?></p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">01</span><span class="value-index-word">OUTCOMES</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:2">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3><?php esc_html_e( 'Connected', 'inovantage' ); ?></h3>
            <p><?php esc_html_e( 'Customer-facing experiences and internal workflows are considered as parts of the same system.', 'inovantage' ); ?></p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">02</span><span class="value-index-word">CONNECTED</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:3">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3><?php esc_html_e( 'Human', 'inovantage' ); ?></h3>
            <p><?php esc_html_e( 'Automation supports people while keeping appropriate judgement and accountability visible.', 'inovantage' ); ?></p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">03</span><span class="value-index-word">HUMAN</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:4">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3><?php esc_html_e( 'Scalable', 'inovantage' ); ?></h3>
            <p><?php esc_html_e( 'Solutions are built to create immediate value and provide a clear foundation for future growth.', 'inovantage' ); ?></p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">04</span><span class="value-index-word">SCALABLE</span></p>
        </article></li>
      </ol>
    </section>

    <section class="about-movement about-close" data-ed-anchor="close" aria-labelledby="about-close-h">
      <p class="ed-label"><?php esc_html_e( 'Next step', 'inovantage' ); ?></p>
      <h2 class="ed-statement" id="about-close-h"><?php esc_html_e( 'Build the systems your next stage of growth requires.', 'inovantage' ); ?></h2>
      <p class="ed-lede"><?php esc_html_e( 'Tell us what is preventing the business from moving faster, converting more opportunities or delivering at greater scale.', 'inovantage' ); ?></p>
      <p class="ed-action"><a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Growth Consultation', 'inovantage' ); ?></a></p>
    </section>

    <div class="about-dissolve" aria-hidden="true"></div>
  </div>
</div>

	<?php
endwhile;

get_footer();
