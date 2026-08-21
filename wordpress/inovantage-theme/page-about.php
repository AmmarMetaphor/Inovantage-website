<?php
/**
 * Template Name: About
 *
 * One continuous editorial canvas: the story, the values and the success
 * stories share a single fixed field that runs from below the header to the
 * footer. The markup is kept byte-for-byte in step with the static build's
 * src/pages/about.html; only the success-stories block differs, because it is
 * rendered from approved testimonial content at request time.
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

<div class="about-canvas" data-about-canvas>

  <!-- The field. One fixed, negatively-stacked group covering the whole page.
       Everything luminous — plates, display words, grain — lives inside it, so
       the single opacity cap on .about-field bounds the brightest pixel this
       page can ever paint. Decorative throughout, hidden from assistive tech. -->
  <div class="about-field" data-about-field aria-hidden="true">
    <div class="about-plate about-plate-far"></div>
    <div class="about-plate about-plate-mid"></div>
    <div class="about-plate about-plate-near"></div>
    <div class="about-marks">
      <span class="ed-mark ed-mark-open" data-ed-mark="open">PRACTICAL</span>
      <span class="ed-mark ed-mark-story" data-ed-mark="story">CONNECTED</span>
      <span class="ed-mark ed-mark-asks" data-ed-mark="asks">COLLABORATION</span>
      <span class="ed-mark ed-mark-values" data-ed-mark="values">PRINCIPLES</span>
      <span class="ed-mark ed-mark-stories" data-ed-mark="stories">WORTH</span>
      <span class="ed-mark ed-mark-close" data-ed-mark="close">VALUE</span>
    </div>
    <div class="about-grain"></div>
  </div>

  <div class="about-flow">

    <section class="about-movement about-overture" data-ed-anchor="open" aria-labelledby="about-overture-h">
      <p class="ed-label">About Inovantage</p>
      <h1 class="ed-statement ed-statement-lead" id="about-overture-h">A practical digital partner for businesses ready to work smarter.</h1>
      <p class="ed-lede">We bring automation, design, content operations and software development together around one principle: technology should make a useful difference to the people using it.</p>
    </section>

    <section class="about-movement about-story" data-ed-anchor="story" aria-labelledby="about-story-h">
      <p class="ed-label">Why Inovantage</p>
      <h2 class="ed-statement" id="about-story-h">Connected thinking for connected work.</h2>
      <p class="ed-lede">A website, content plan, automation and app often touch the same customer journey and the same internal data. Treating them as isolated tasks creates unnecessary gaps.</p>
      <div class="ed-body">
        <p>Inovantage is built to look across those boundaries. We consider what the customer sees, what the team has to do behind the scenes, where information moves and where a decision needs a person.</p>
        <p>The goal is not to force every project into a large transformation programme. It is to identify the smallest coherent improvement that can be launched, measured and built upon.</p>
      </div>
      <h3 class="ed-subhead">What that means in practice</h3>
      <ol class="ed-enumeration">
        <li><span class="ed-enum-index" aria-hidden="true">01</span><p>We ask about the current process before recommending technology.</p></li>
        <li><span class="ed-enum-index" aria-hidden="true">02</span><p>We distinguish facts, assumptions and decisions that still need evidence.</p></li>
        <li><span class="ed-enum-index" aria-hidden="true">03</span><p>We design review points into content and high-impact automations.</p></li>
        <li><span class="ed-enum-index" aria-hidden="true">04</span><p>We favour understandable, maintainable solutions over avoidable complexity.</p></li>
        <li><span class="ed-enum-index" aria-hidden="true">05</span><p>We document ownership and the next steps after launch.</p></li>
      </ol>
    </section>

    <section class="about-movement about-asks" data-ed-anchor="asks" aria-labelledby="about-asks-h">
      <p class="ed-label">Good collaboration</p>
      <h2 class="ed-statement" id="about-asks-h">What we ask from clients.</h2>
      <p class="ed-lede">The best work happens when the right people provide context, make decisions and review progress at the agreed time.</p>
      <ol class="ed-asks">
        <li class="ed-ask"><span class="ed-ask-index" aria-hidden="true">01</span><h3>A decision owner</h3><p>One person coordinates feedback and confirms the final direction.</p></li>
        <li class="ed-ask"><span class="ed-ask-index" aria-hidden="true">02</span><h3>Access to context</h3><p>Relevant systems, examples, content, constraints and subject experts are available.</p></li>
        <li class="ed-ask"><span class="ed-ask-index" aria-hidden="true">03</span><h3>Timely reviews</h3><p>Feedback arrives within the agreed window so momentum is not lost.</p></li>
        <li class="ed-ask"><span class="ed-ask-index" aria-hidden="true">04</span><h3>Verified claims</h3><p>The client confirms legal details, statistics, testimonials and public statements.</p></li>
      </ol>
    </section>

    <section class="about-movement about-values" data-ed-anchor="values" aria-labelledby="about-values-h">
      <p class="ed-label">Operating principles</p>
      <h2 class="ed-statement" id="about-values-h">How we want every project to feel.</h2>
      <ol class="value-stack">
        <li><article class="value-brief" style="--v-i:1">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Start with the outcome</h3>
            <p>A strong brief explains what should improve, for whom and how the business will know.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">01</span><span class="value-index-word">USEFUL</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:2">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Make decisions visible</h3>
            <p>Scope, assumptions, responsibilities, review dates and trade-offs should be understandable.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">02</span><span class="value-index-word">CLEAR</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:3">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Keep judgement where it matters</h3>
            <p>Automation and AI support people; they do not remove accountability for important decisions.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">03</span><span class="value-index-word">HUMAN</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:4">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Build the essential first</h3>
            <p>A useful first release creates more learning than an oversized plan that never reaches users.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">04</span><span class="value-index-word">FOCUSED</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:5">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Use evidence, not invented proof</h3>
            <p>Claims, case studies and results should be verified before they appear on a public website.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">05</span><span class="value-index-word">HONEST</span></p>
        </article></li>
        <li><article class="value-brief" style="--v-i:6">
          <div class="value-body">
            <span class="value-mark" aria-hidden="true"></span>
            <h3>Launch is a checkpoint</h3>
            <p>Real usage reveals what to refine, remove, automate or build next.</p>
          </div>
          <span class="value-rule" aria-hidden="true"></span>
          <p class="value-index"><span class="value-index-num">06</span><span class="value-index-word">IMPROVING</span></p>
        </article></li>
      </ol>
    </section>

    <!-- Built from src/data/case-studies.json at build time. The token always
         emits the h2 this section is labelled by, in both branches. -->
    <section class="about-movement about-stories" data-ed-anchor="stories" aria-labelledby="about-stories-h">
<?php inovantage_about_success_stories(); ?>
    </section>

    <section class="about-movement about-close" data-ed-anchor="close" aria-labelledby="about-close-h">
      <p class="ed-label">Next step</p>
      <h2 class="ed-statement" id="about-close-h">Have a digital problem that crosses more than one service?</h2>
      <p class="ed-lede">That is often where connected thinking creates the most value.</p>
      <p class="ed-action"><a class="button" href="/contact/">Tell us about it</a></p>
    </section>

    <div class="about-dissolve" aria-hidden="true"></div>
  </div>
</div>

	<?php
endwhile;

get_footer();
