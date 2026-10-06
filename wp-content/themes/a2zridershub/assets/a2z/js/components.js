/* =============================================================
   A2Z RIDERS HUB — Shared renderers
   -------------------------------------------------------------
   Card and tile markup used by the homepage, catalogue, category
   and product detail pages. Pure string builders, no framework.
   ============================================================= */

(function () {
  "use strict";

  const esc = (s) => window.A2Z.escapeHtml(s);

  /* ---------------------------------------------------------
     PRODUCT CARD
     ------------------------------------------------------- */
  function renderCard(p, opts) {
    const o = opts || {};
    const H = window.PRODUCT_HELPERS;
    const cat = SITE.categoryById(p.category);
    const avail = H.availabilityOf(p);
    const delay = o.index != null ? " reveal--delay-" + Math.min(4, o.index % 5) : "";

    const badge = p.badge
      ? '<span class="card__badge">' + esc(p.badge) + "</span>"
      : "";

    return (
      '<article class="card reveal' +
      delay +
      '">' +
      '<div class="card__media">' +
      MEDIA.img(p.images[0], 800, 500, { sizes: o.sizes || "(max-width: 619px) 92vw, (max-width: 1099px) 46vw, 30vw" }) +
      badge +
      '<span class="card__cat">' +
      esc((cat ? cat.name : p.category) + " / " + p.type) +
      "</span>" +
      "</div>" +
      '<div class="card__body">' +
      '<h3 class="card__name">' +
      esc(p.name) +
      "</h3>" +
      '<p class="card__short">' +
      esc(p.short) +
      "</p>" +
      '<div class="card__foot">' +
      '<span class="card__price">' +
      esc(H.formatPrice(p.price)) +
      "</span>" +
      '<span class="card__avail ' +
      avail.cls +
      '">' +
      esc(avail.label) +
      "</span>" +
      "</div>" +
      '<span class="card__cta">View Product' +
      '<span class="card__cta-arrow" aria-hidden="true">→</span>' +
      "</span>" +
      "</div>" +
      '<a class="card__link" href="' +
      window.A2Z_URLS.product +
      "?id=" +
      encodeURIComponent(p.id) +
      '"><span>View product: ' +
      esc(p.name) +
      ", " +
      esc(H.formatPrice(p.price)) +
      "</span></a>" +
      "</article>"
    );
  }

  /* ---------------------------------------------------------
     CATEGORY TILE (editorial showcase)
     ------------------------------------------------------- */
  function renderCatTile(c, index) {
    const count = window.PRODUCTS.filter((p) => p.category === c.id).length;
    const n = String(index + 1).padStart(2, "0");

    return (
      '<a class="cat reveal" href="' +
      window.A2Z_URLS.catalogue +
      "?cat=" +
      c.id +
      '" aria-label="' +
      esc(c.name + " — " + c.short) +
      '">' +
      '<div class="cat__media">' +
      MEDIA.img(c.photo, 1200, 900, { alt: c.photoAlt, sizes: "(max-width: 699px) 92vw, (max-width: 999px) 46vw, 40vw" }) +
      '<span class="cat__index">' +
      n +
      " / " +
      String(SITE.CATEGORIES.length).padStart(2, "0") +
      "</span>" +
      '<span class="cat__count">' +
      count +
      " items</span>" +
      "</div>" +
      '<div class="cat__body">' +
      '<h3 class="cat__name">' +
      esc(c.name) +
      "</h3>" +
      '<p class="cat__desc">' +
      esc(c.short) +
      "</p>" +
      '<span class="cat__cta link-line">' +
      "View Category" +
      '<span class="link-line__arrow" aria-hidden="true">→</span>' +
      "</span>" +
      "</div>" +
      "</a>"
    );
  }

  /* ---------------------------------------------------------
     TICKER — duplicated track so the loop is seamless
     ------------------------------------------------------- */
  function renderTicker(items) {
    const run = items
      .map((t) => '<span class="ticker__item">' + esc(t) + "</span>")
      .join("");
    return '<div class="ticker__track">' + run + run + "</div>";
  }

  /* ---------------------------------------------------------
     SPEC TABLE
     ------------------------------------------------------- */
  function renderSpecs(specs) {
    return (
      '<dl class="spec-table">' +
      specs
        .map(
          (row) =>
            '<div class="spec-row"><dt>' +
            esc(row[0]) +
            "</dt><dd>" +
            esc(row[1]) +
            "</dd></div>"
        )
        .join("") +
      "</dl>"
    );
  }

  /* ---------------------------------------------------------
     FEATURE LIST
     ------------------------------------------------------- */
  function renderFeatures(features) {
    return (
      '<ul class="feature-list">' +
      features.map((f) => "<li>" + esc(f) + "</li>").join("") +
      "</ul>"
    );
  }

  window.UI = {
    renderCard,
    renderCatTile,
    renderTicker,
    renderSpecs,
    renderFeatures,
  };
})();
