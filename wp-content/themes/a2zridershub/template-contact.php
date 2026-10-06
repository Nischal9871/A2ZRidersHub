<?php
/**
 * Template Name: Contact
 * Exact port of contact.html <main>. The enquiry form is driven by
 * assets/a2z/js/contact.js (WhatsApp handoff, nothing stored).
 */
get_header();
$home      = esc_url( home_url( '/' ) );
$catalogue = esc_url( home_url( '/catalogue/' ) );
?>
    <main id="main">
      <section class="page-head">
        <div class="page-head__media">
          <img
            src="https://images.pexels.com/photos/19870626/pexels-photo-19870626.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=900"
            srcset="https://images.pexels.com/photos/19870626/pexels-photo-19870626.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=900&h=450 900w, https://images.pexels.com/photos/19870626/pexels-photo-19870626.jpeg?auto=compress&cs=tinysrgb&fit=crop&w=1800&h=900 1800w"
            sizes="100vw"
            alt="Rider holding a helmet beside a motorcycle in a dimly lit garage"
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
              <span>Contact</span>
            </nav>
            <p class="sec-index"><b>Contact</b> / Biratnagar / Nepal</p>
            <h1 class="page-head__title">Talk to a rider</h1>
            <p class="lede">
              No shopping cart, no automated reply chain. Message us and you will get an answer
              from someone who knows the stock.
            </p>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="wrap">
          <div class="contact-grid">
            <!-- details -->
            <div>
              <p class="sec-index" style="margin-bottom: 24px"><b>01</b> / Details</p>

              <dl class="contact-list">
                <div class="contact-row">
                  <dt>Phone</dt>
                  <dd><a href="#" data-tel><span data-contact="phoneDisplay"></span></a></dd>
                  <small>Call during opening hours</small>
                </div>

                <div class="contact-row">
                  <dt>WhatsApp</dt>
                  <dd><a href="#" data-wa="motorcycle gear"><span data-contact="whatsappDisplay"></span></a></dd>
                  <small>Fastest way to confirm stock and sizes</small>
                </div>

                <div class="contact-row">
                  <dt>Location</dt>
                  <dd><a href="#" data-map><span data-contact="address"></span></a></dd>
                  <small>Opens in Google Maps</small>
                </div>

                <div class="contact-row">
                  <dt>Hours</dt>
                  <dd><span data-contact="hours"></span></dd>
                  <small>Closed on public holidays</small>
                </div>

                <div class="contact-row">
                  <dt>Email</dt>
                  <dd><a href="mailto:info@a2zridershub.com">info@a2zridershub.com</a></dd>
                </div>
              </dl>

              <div style="margin-top: 30px">
                <div class="socials" id="socials"></div>
              </div>
            </div>

            <!-- enquiry form -->
            <div>
              <p class="sec-index" style="margin-bottom: 24px"><b>02</b> / Enquiry</p>

              <form class="form" id="enquiry" novalidate>
                <div class="form__row form__row--two">
                  <div class="field">
                    <label for="f-name">Your name</label>
                    <input id="f-name" name="name" type="text" autocomplete="name" placeholder="Full name" required />
                  </div>
                  <div class="field">
                    <label for="f-phone">Phone / WhatsApp</label>
                    <input id="f-phone" name="phone" type="tel" autocomplete="tel" placeholder="+977 98…" required />
                  </div>
                </div>

                <div class="form__row form__row--two">
                  <div class="field">
                    <label for="f-cat">Category</label>
                    <select id="f-cat" name="category">
                      <option value="">Select a category</option>
                    </select>
                  </div>
                  <div class="field">
                    <label for="f-size">Size / Model</label>
                    <input id="f-size" name="size" type="text" placeholder="e.g. 42EU, or ZX-10R" />
                  </div>
                </div>

                <div class="field">
                  <label for="f-msg">What are you looking for?</label>
                  <textarea id="f-msg" name="message" placeholder="Product, budget, timeline — whatever helps."></textarea>
                </div>

                <button class="btn btn--primary btn--block" type="submit">
                  <span>Send via WhatsApp</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </button>

                <p class="form__note" id="form-note">
                  This opens WhatsApp with your message ready to send. Nothing is stored on this
                  site. Prefer email? Use <a href="mailto:info@a2zridershub.com" style="color: var(--red-bright)">info@a2zridershub.com</a>.
                </p>

                <p class="form__status" id="form-status" role="status">
                  WhatsApp is opening with your enquiry. If nothing happens, message us directly
                  on <span data-contact="whatsappDisplay"></span>.
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- map -->
      <section class="section section--flush-top">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>03</b> / Location</p>
              <h2 class="display display--xl">Find the<br />shop</h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                Biratnagar, Koshi Province. Message ahead and we will have the sizes you need out
                before you arrive.
              </p>
              <a class="btn btn--ghost btn--sm" href="#" data-map>
                <span>Open in Google Maps</span>
                <span class="btn__arrow" aria-hidden="true"></span>
              </a>
            </div>
          </div>

          <iframe
            class="map-embed"
            title="Map showing A2Z Riders Hub location in Biratnagar, Nepal"
            src="https://maps.google.com/maps?q=Biratnagar%2C%20Koshi%2C%20Nepal&t=&z=12&ie=UTF8&iwloc=&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
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
                Browse the full catalogue first, then send us the reference numbers you are
                interested in.
              </p>
              <div class="cta-band__actions" style="margin-top: 26px">
                <a class="btn btn--primary" href="<?php echo $catalogue; ?>">
                  <span>View Catalogue</span>
                  <span class="btn__arrow" aria-hidden="true"></span>
                </a>
                <a class="btn btn--ghost" href="#" data-wa="motorcycle gear">
                  <span>WhatsApp Enquiry</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
