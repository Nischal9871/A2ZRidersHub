<?php
/**
 * Template Name: Product
 * Exact port of product.html <main>. Detail + related are rendered by
 * assets/a2z/js/product.js from ?id= against the demo catalogue.
 */
get_header();
$catalogue = esc_url( home_url( '/catalogue/' ) );
?>
    <main id="main">
      <section class="pdp">
        <div class="wrap">
          <nav class="crumbs pdp__crumbs" aria-label="Breadcrumb" id="crumbs"></nav>
          <div class="pdp__layout" id="pdp"></div>
        </div>
      </section>

      <section class="related" aria-labelledby="related-title">
        <div class="wrap">
          <div class="sec-head">
            <div class="sec-head__left">
              <p class="sec-index"><b>Next</b> / Related</p>
              <h2 class="display display--lg" id="related-title">Related equipment</h2>
            </div>
            <div class="sec-head__right">
              <p class="lede">
                Riders who consider this usually consider these next.
              </p>
              <a class="link-line" href="<?php echo $catalogue; ?>">
                View catalogue
                <span class="link-line__arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>
        <div class="wrap">
          <div class="products" id="related"></div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
