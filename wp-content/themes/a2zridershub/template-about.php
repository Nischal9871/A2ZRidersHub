<?php
/**
 * Template Name: About
 * Exact port of about.html <main>. Principles + category tiles are
 * rendered by assets/a2z/js/about.js.
 */
get_header();
$home      = esc_url( home_url( '/' ) );
$catalogue = esc_url( home_url( '/catalogue/' ) );
$contact   = esc_url( home_url( '/contact/' ) );
?>
    <main id="main">
      <section class="page-head">
        <div class="page-head__media">
          <img
            src="https://images.pexels.com/photos/3817843/pexels-photo-3817843.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=900"
            srcset="https://images.pexels.com/photos/3817843/pexels-photo-3817843.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=900&h=450 900w, https://images.pexels.com/photos/3817843/pexels-photo-3817843.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=900 1800w"
            sizes="100vw"
            alt="Collection of motorcycles on loft shelving in an industrial garage"
            width="1800"
            height="900"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          />
        </div>
        <div class="wrap">
          <div class="page-head__inner">
            <nav class="crumbs" aria-label="Breadcrumb">
              <a href="<?php echo $home; ?>">Home</a>
              <span aria-hidden="true">/</span>
              <span>About</span>
            </nav>
            <p class="sec-index"><b>About</b> / Biratnagar / Nepal</p>
            <h1 class="page-head__title">A catalogue built by riders</h1>
            <p class="lede">
              A2Z Riders Hub supplies genuine motorcycle gear and riding equipment from
              Biratnagar, in Koshi Province.
            </p>
          </div>
        </div>
      </section>

      <!-- intro -->
      <section class="section">
        <div class="wrap">
          <div class="split split--media-right">
            <div class="split__media">
              <div class="media grain">
                <img
                  src="https://images.pexels.com/photos/27704022/pexels-photo-27704022.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1100&h=1375"
                  srcset="https://images.pexels.com/photos/27704022/pexels-photo-27704022.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=550&h=687 550w, https://images.pexels.com/photos/27704022/pexels-photo-27704022.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1100&h=1375 1100w"
                  sizes="(max-width: 899px) 92vw, 52vw"
                  alt="Mechanic repairing a motorcycle in a dimly lit garage"
                  width="1100"
                  height="1375"
                  loading="lazy"
                  decoding="async"
                />
              </div>
              <p class="split__badge">
                <b data-count="6">6</b>
                <span>Categories stocked</span>
              </p>
            </div>

            <div class="split__body prose">
              <p class="eyebrow">Who we are</p>
              <h2 style="margin-top: 0">Gear for the road.<br />Built for the rider.</h2>
              <p class="body-copy">
                A2Z Riders Hub is a motorcycle-focused catalogue based in Biratnagar, Nepal.
                We sell genuine biker products — racing jackets, riding gloves, premium
                helmets, motorcycle parts, riding gears and motorcycle accessories — to riders
                across Koshi and beyond.
              </p>
              <p class="body-copy">
                We are not a supermarket of everything motorcycle. We carry a deliberately
                narrow selection, because a catalogue that lists forty near-identical helmets
                helps nobody choose. What we do carry, we can tell you about: the shell
                construction, the armour standard, whether the fit suits an upright commuter
                or a leaned-over track position.
              </p>
              <p class="body-copy">
                This site is a catalogue rather than a checkout. Browse, collect the reference
                numbers, then message us on WhatsApp or visit the shop. We will confirm size,
                stock and price before you commit to anything.
              </p>
              <a class="link-line" href="<?php echo $catalogue; ?>" style="margin-top: 10px">
                Browse the catalogue
                <span class="link-line__arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- how we choose -->
      <section class="section section--graphite">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>01</b> / Selection</p>
              <h2 class="display display--xl">How we<br />choose</h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                Three questions run through every product we add to the catalogue.
              </p>
            </div>
          </div>

          <div class="features" id="principles"></div>
        </div>
      </section>

      <!-- categories detail -->
      <section class="section">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>02</b> / Range</p>
              <h2 class="display display--xl">What we<br />stock</h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                Six categories covering protection, apparel, consumables and the components
                that keep a bike on the road.
              </p>
            </div>
          </div>
        </div>
        <div class="wrap" style="padding-inline: 0">
          <div class="cats" id="cats"></div>
        </div>
      </section>

      <!-- service band -->
      <section class="perf grain">
        <div class="perf__media">
          <img
            src="https://images.pexels.com/photos/5252118/pexels-photo-5252118.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1200"
            srcset="https://images.pexels.com/photos/5252118/pexels-photo-5252118.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1000&h=600 1000w, https://images.pexels.com/photos/5252118/pexels-photo-5252118.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1200 2000w"
            sizes="100vw"
            alt="Motorcycle workshop with sport bikes on stands"
            width="2000"
            height="1200"
            loading="lazy"
            decoding="async"
            data-parallax="0.12"
          />
        </div>
        <div class="perf__veil" aria-hidden="true"></div>
        <div class="perf__inner">
          <div class="wrap">
            <div class="perf__content">
              <p class="eyebrow">Visit / Enquire</p>
              <div class="perf__rules" aria-hidden="true"><span></span><span></span></div>
              <h2 class="perf__title">Come to the<br />shop.</h2>
              <p class="lede">
                Based in Biratnagar, Koshi. Message ahead and we will have the right sizes out
                before you arrive.
              </p>
              <dl class="perf__specs">
                <div>
                  <dt>Address</dt>
                  <dd><span data-contact="address"></span></dd>
                </div>
                <div>
                  <dt>Hours</dt>
                  <dd><span data-contact="hours"></span></dd>
                </div>
                <div>
                  <dt>Phone</dt>
                  <dd><span data-contact="phoneDisplay"></span></dd>
                </div>
              </dl>
              <div style="display: flex; flex-wrap: wrap; gap: 14px">
                <a class="btn btn--primary" href="<?php echo $contact; ?>">
                  <span>Contact Us</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </a>
                <a class="btn btn--ghost" href="#" data-wa="visiting the shop in Biratnagar">
                  <span>WhatsApp Enquiry</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA -->
      <section class="cta-band" aria-labelledby="cta-title">
        <span class="cta-band__pattern" aria-hidden="true"></span>
        <div class="wrap">
          <div class="cta-band__inner">
            <div>
              <p class="eyebrow" style="margin-bottom: 22px">Catalogue</p>
              <h2 class="cta-band__title reveal-lines" id="cta-title">
                <span><i>Find your</i></span><span><i>gear.</i></span>
              </h2>
            </div>
            <div class="reveal reveal--delay-2">
              <p class="cta-band__copy">
                Motorcycle jackets, helmets, gloves, parts and riding equipment — all in one
                catalogue, with honest availability.
              </p>
              <div class="cta-band__actions" style="margin-top: 26px">
                <a class="btn btn--primary" href="<?php echo $catalogue; ?>">
                  <span>View Catalogue</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </a>
                <a class="btn btn--ghost" href="<?php echo $contact; ?>"><span>Contact Us</span></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
