<?php
/**
 * Front page — exact port of index.html <main>.
 * Dynamic regions (#ticker, #cats, #featured, #why, [data-count]) are
 * rendered by assets/a2z/js/home.js, same as the static source.
 */
get_header();
$home      = esc_url( home_url( '/' ) );
$catalogue = esc_url( home_url( '/catalogue/' ) );
$about     = esc_url( home_url( '/about/' ) );
$contact   = esc_url( home_url( '/contact/' ) );
?>
    <main id="main">
      <!-- ==================== HERO ==================== -->
      <section class="hero grain" aria-labelledby="hero-title">
        <div class="hero__media">
          <img
            src="https://images.pexels.com/photos/33203561/pexels-photo-33203561.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1300"
            srcset="https://images.pexels.com/photos/33203561/pexels-photo-33203561.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1000&h=650 1000w, https://images.pexels.com/photos/33203561/pexels-photo-33203561.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1300 2000w"
            sizes="100vw"
            alt="Motorcyclist on a red sport bike beneath a streetlight at night"
            width="2000"
            height="1300"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          />
        </div>
        <div class="hero__veil" aria-hidden="true"></div>

        <!-- instrumentation decoration -->
        <div class="hero__hud hero__hud--arc" aria-hidden="true">
          <svg viewBox="0 0 400 400" aria-hidden="true" focusable="false">
            <circle cx="200" cy="200" r="148" stroke-dasharray="1 9" />
            <path d="M62 232a146 146 0 0 1 276 0" />
            <circle cx="200" cy="200" r="112" stroke-dasharray="3 14" />
            <g stroke-width="1">
              <line x1="200" y1="52" x2="200" y2="74" />
              <line x1="277" y1="70" x2="268" y2="90" />
              <line x1="330" y1="123" x2="311" y2="136" />
              <line x1="348" y1="200" x2="326" y2="200" />
              <line x1="330" y1="277" x2="311" y2="264" />
              <line x1="277" y1="330" x2="268" y2="310" />
              <line x1="200" y1="348" x2="200" y2="326" />
              <line x1="123" y1="330" x2="132" y2="310" />
              <line x1="70" y1="277" x2="89" y2="264" />
              <line x1="52" y1="200" x2="74" y2="200" />
              <line x1="70" y1="123" x2="89" y2="136" />
              <line x1="123" y1="70" x2="132" y2="90" />
            </g>
            <path d="M200 200 292 132" stroke="#e21b1b" stroke-width="2" />
            <circle cx="200" cy="200" r="5" stroke="#e21b1b" />
          </svg>
        </div>
        <div class="hero__hud hero__hud--ticks" aria-hidden="true"></div>

        <div class="hero__inner">
          <div class="wrap">
            <p class="hero__label label">
              <span class="label--red">A2Z Riders Hub</span>
              <span aria-hidden="true">/</span>
              <span>Biratnagar</span>
            </p>

            <h1 class="hero__title" id="hero-title">
              <span class="hero__title-line"><span>Built for</span></span>
              <span class="hero__title-line"><span>the ride.</span></span>
            </h1>

            <div class="hero__rule" aria-hidden="true"></div>

            <p class="hero__copy">
              Genuine motorcycle gear, riding equipment and performance essentials, curated
              for serious riders.
            </p>

            <div class="hero__cta">
              <a class="btn btn--primary" href="<?php echo $catalogue; ?>">
                <span>Explore Collection</span>
                <span class="btn__arrow" aria-hidden="true"></span>
              </a>
              <a class="btn btn--ghost" href="<?php echo $contact; ?>">
                <span>Contact Us</span>
              </a>
            </div>

            <dl class="hero__meta">
              <div class="hero__meta-item">
                <dt>Speciality</dt>
                <dd>Motorcycle Gear &amp; Parts</dd>
              </div>
              <div class="hero__meta-item">
                <dt>Based In</dt>
                <dd>Biratnagar, Koshi</dd>
              </div>
              <div class="hero__meta-item">
                <dt>Selection</dt>
                <dd data-count="30" data-suffix="">30</dd>
              </div>
              <div class="hero__meta-item">
                <dt>Enquiries</dt>
                <dd>WhatsApp / In Store</dd>
              </div>
            </dl>
          </div>
        </div>

        <p class="hero__scroll" aria-hidden="true">Scroll</p>
      </section>

      <!-- ==================== TICKER ==================== -->
      <div class="ticker" id="ticker" aria-hidden="true"></div>

      <!-- ==================== BRAND STATEMENT ==================== -->
      <section class="section" aria-labelledby="statement-title">
        <div class="wrap">
          <div class="sec-index" style="margin-bottom: clamp(24px, 3vw, 40px)">
            <b>01</b> / Statement
          </div>

          <div class="statement">
            <h2 class="statement__title" id="statement-title">
              <span class="reveal-lines"
                ><span><i>Gear for the road.</i></span
                ><span><i>Built for the rider.</i></span></span
              >
            </h2>

            <div class="statement__aside reveal">
              <p class="body-copy">
                A2Z Riders Hub is a motorcycle-focused catalogue based in Biratnagar, Nepal.
                We stock genuine riding equipment — race jackets, certified helmets, gloves,
                service parts and the gear that fills the gaps between them.
              </p>
              <p class="body-copy">
                Every item is selected on the same three questions: does it protect properly,
                does it fit the way a rider actually moves, and will it still be worth owning
                in three years.
              </p>

              <div class="statement__stats">
                <div>
                  <p class="stat__value"><span data-count="30">30</span></p>
                  <p class="stat__label">Products in catalogue</p>
                </div>
                <div>
                  <p class="stat__value"><span data-count="6">6</span></p>
                  <p class="stat__label">Equipment categories</p>
                </div>
              </div>

              <a class="link-line" href="<?php echo $about; ?>">
                About A2Z Riders Hub
                <span class="link-line__arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================== CATEGORY SHOWCASE ==================== -->
      <section class="section section--flush-top" aria-labelledby="cats-title">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>02</b> / Categories</p>
              <h2 class="display display--xl" id="cats-title">
                What we<br />carry
              </h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                Six categories, one standard. Racing apparel, certified protection, machine
                components and the small pieces that finish a setup.
              </p>
              <a class="link-line" href="<?php echo $catalogue; ?>">
                View full catalogue
                <span class="link-line__arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>

        <div class="wrap" style="padding-inline: 0">
          <div class="cats" id="cats"></div>
        </div>
      </section>

      <!-- ==================== FEATURED PRODUCTS ==================== -->
      <section class="section section--graphite" aria-labelledby="featured-title">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>03</b> / Featured</p>
              <h2 class="display display--xl" id="featured-title">
                Selected<br />equipment
              </h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                A short list of what riders ask for most. Prices in Nepali Rupees, availability
                checked against live stock, and no pressure to buy online.
              </p>
              <a class="link-line" href="<?php echo $catalogue; ?>">
                Browse all <span data-count="30">30</span> products
                <span class="link-line__arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>

        <div class="wrap">
          <div class="products products--featured" id="featured"></div>

          <div
            style="
              display: flex;
              justify-content: center;
              margin-top: clamp(34px, 4vw, 56px);
            "
          >
            <a class="btn btn--ghost" href="<?php echo $catalogue; ?>">
              <span>View Catalogue</span>
              <span class="btn__arrow" aria-hidden="true"></span>
            </a>
          </div>
        </div>
      </section>

      <!-- ==================== PERFORMANCE ==================== -->
      <section class="perf grain" aria-labelledby="perf-title">
        <div class="perf__media">
          <img
            src="https://images.pexels.com/photos/30330941/pexels-photo-30330941.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1200"
            srcset="https://images.pexels.com/photos/30330941/pexels-photo-30330941.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1000&h=600 1000w, https://images.pexels.com/photos/30330941/pexels-photo-30330941.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=2000&h=1200 2000w"
            sizes="100vw"
            alt="Motorcyclist leaning into a sharp turn on a winding road"
            width="2000"
            height="1200"
            loading="lazy"
            decoding="async"
            data-parallax="0.14"
          />
        </div>
        <div class="perf__veil" aria-hidden="true"></div>

        <div class="perf__inner">
          <div class="wrap">
            <div class="perf__content">
              <p class="eyebrow">Performance / Protection</p>

              <div class="perf__rules" aria-hidden="true">
                <span></span><span></span>
              </div>

              <h2 class="perf__title" id="perf-title">
                Ride with<br />confidence.
              </h2>

              <p class="lede">
                Premium gear selected for riders who take performance, protection and style
                seriously.
              </p>

              <dl class="perf__specs">
                <div>
                  <dt>Shell Rating</dt>
                  <dd>CE Level A / B</dd>
                </div>
                <div>
                  <dt>Certification</dt>
                  <dd>ECE 22.06 / ISI / DOT</dd>
                </div>
                <div>
                  <dt>Fitment</dt>
                  <dd>Checked Before Dispatch</dd>
                </div>
                <div>
                  <dt>Support</dt>
                  <dd>WhatsApp / In Store</dd>
                </div>
              </dl>

              <div>
                <a class="btn btn--primary" href="<?php echo $catalogue; ?>">
                  <span>Explore Collection</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================== WHY A2Z ==================== -->
      <section class="section" aria-labelledby="why-title">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>04</b> / Why Us</p>
              <h2 class="display display--xl" id="why-title">
                Why A2Z<br />Riders Hub
              </h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                A motorcycle catalogue run by people who ride, in a city where serious gear is
                still hard to find in person.
              </p>
            </div>
          </div>

          <div class="features" id="why"></div>
        </div>
      </section>

      <!-- ==================== CATALOGUE CTA ==================== -->
      <section class="cta-band" aria-labelledby="cta-title">
        <span class="cta-band__pattern" aria-hidden="true"></span>
        <div class="wrap">
          <div class="cta-band__inner">
            <div>
              <p class="eyebrow" style="margin-bottom: 22px">Catalogue / 2026</p>
              <h2 class="cta-band__title reveal-lines" id="cta-title">
                <span><i>Find your</i></span><span><i>gear.</i></span>
              </h2>
            </div>

            <div class="reveal reveal--delay-2">
              <p class="cta-band__copy">
                Explore our motorcycle jackets, helmets, gloves, parts and riding equipment.
                Send a WhatsApp message for size, fitment and stock — we answer directly.
              </p>
              <div class="cta-band__actions" style="margin-top: 26px">
                <a class="btn btn--primary" href="<?php echo $catalogue; ?>">
                  <span>View Catalogue</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </a>
                <a class="btn btn--ghost" href="#" data-wa="the full catalogue">
                  <span>WhatsApp Enquiry</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
