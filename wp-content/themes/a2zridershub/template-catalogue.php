<?php
/**
 * Template Name: Catalogue
 * Exact port of catalogue.html <main>. Grid, filters and counts are
 * rendered by assets/a2z/js/catalogue.js from the demo catalogue.
 */
get_header();
$home      = esc_url( home_url( '/' ) );
$catalogue = esc_url( home_url( '/catalogue/' ) );
$contact   = esc_url( home_url( '/contact/' ) );
?>
    <main id="main">
      <!-- ==================== PAGE HEAD ==================== -->
      <section class="page-head">
        <div class="page-head__media" id="page-head-media">
          <img
            id="head-img"
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
              <a href="<?php echo $catalogue; ?>">Catalogue</a>
              <span id="crumb-cat" hidden aria-hidden="true">/</span>
              <span id="crumb-cat-label"></span>
            </nav>

            <p class="sec-index"><b id="head-index">Catalogue</b> / Biratnagar / Nepal</p>

            <h1 class="page-head__title" id="page-title">The Catalogue</h1>

            <p class="lede" id="page-lede">
              Every product we stock, in one place. Filter by category, brand, price or
              availability — then send us a message for sizes and stock confirmation.
            </p>
          </div>
        </div>
      </section>

      <!-- ==================== CATALOGUE ==================== -->
      <section class="catalogue">
        <div class="wrap">
          <!-- quick category scroller (swipeable on mobile) -->
          <div
            class="scroller scroller--chips"
            id="quick-cats"
            style="margin-bottom: 22px; padding-inline: 2px"
            role="group"
            aria-label="Jump to category"
          ></div>

          <div class="catalogue-toolbar" role="search" aria-label="Search and sort products">
            <div class="filters__search">
              <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <circle cx="11" cy="11" r="7" />
                <path d="M16.5 16.5 21 21" />
              </svg>
              <input
                type="search"
                id="q"
                name="q"
                placeholder="Search by product, brand or reference…"
                aria-label="Search products"
                autocomplete="off"
              />
            </div>

            <div class="catalogue-toolbar__right">
              <p class="filters__count" id="count" aria-live="polite">
                <b>30</b> products
              </p>
              <div class="filters__sort">
                <label for="sort">Sort</label>
                <select id="sort" name="sort">
                  <option value="featured">Featured</option>
                  <option value="price-asc">Price: low to high</option>
                  <option value="price-desc">Price: high to low</option>
                  <option value="name-asc">Name: A to Z</option>
                  <option value="name-desc">Name: Z to A</option>
                </select>
              </div>
              <button
                class="filters-toggle"
                type="button"
                id="filters-toggle"
                aria-expanded="false"
                aria-controls="filters-side"
              >
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                  <path d="M4 6h16M7 12h10M10 18h4" />
                </svg>
                Filters
              </button>
            </div>
          </div>

          <div class="catalogue-layout">
            <aside class="filters-side" id="filters-side" aria-label="Filter products">
              <form class="filters" id="filters">
                <div class="filters-side__head">
                  <span class="filters-side__title">Filters</span>
                  <button class="filters__reset" type="button" id="reset" hidden>Clear</button>
                </div>
                <div class="filters__groups" id="filter-groups"></div>
              </form>
            </aside>

            <div class="catalogue-main">
              <div class="products products--catalogue" id="grid"></div>

              <div class="empty-state" id="empty" hidden>
                <h2>Nothing matches those filters</h2>
                <p class="body-copy" style="max-width: 46ch">
                  Try widening the price range or clearing a filter. If you are looking for
                  something we do not list, message us and we will check.
                </p>
                <div style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center">
                  <button class="btn btn--ghost btn--sm" type="button" id="empty-reset">
                    <span>Clear filters</span>
                  </button>
                  <a class="btn btn--primary btn--sm" href="#" data-wa="a product I cannot find">
                    <span>WhatsApp Enquiry</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================== CTA ==================== -->
      <section class="cta-band" aria-labelledby="cta-title">
        <span class="cta-band__pattern" aria-hidden="true"></span>
        <div class="wrap">
          <div class="cta-band__inner">
            <div>
              <p class="eyebrow" style="margin-bottom: 22px">Need help choosing?</p>
              <h2 class="cta-band__title reveal-lines" id="cta-title">
                <span><i>Request</i></span><span><i>details.</i></span>
              </h2>
            </div>
            <div class="reveal reveal--delay-2">
              <p class="cta-band__copy">
                Send us the product name and your usual size. We will confirm fit, stock and
                price on WhatsApp before you make the trip.
              </p>
              <div class="cta-band__actions" style="margin-top: 26px">
                <a class="btn btn--primary" href="#" data-wa="product details">
                  <span>WhatsApp Enquiry</span>
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
