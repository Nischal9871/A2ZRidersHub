/* =============================================================
   A2Z RIDERS HUB — Homepage
   ============================================================= */

(function () {
  "use strict";

  const $ = (s) => document.querySelector(s);
  const esc = (s) => window.A2Z.escapeHtml(s);

  /* ---------------------------------------------------------
     Ticker
     --------------------------------------------------------- */
  function renderTicker() {
    const host = $("#ticker");
    if (!host) return;
    host.innerHTML = window.UI.renderTicker([
      "CE-Rated Protection",
      "Genuine Products",
      "Performance Fit",
      "Biratnagar / Nepal",
      "Rider Focused",
      "Koshi Province",
      "Certified Equipment",
      "Enquire On WhatsApp",
    ]);
  }

  /* ---------------------------------------------------------
     Category showcase — the five editorial blocks
     --------------------------------------------------------- */
  function renderCategories() {
    const host = $("#cats");
    if (!host) return;
    const blocks = SITE.CATEGORIES.filter((c) => c.block);
    host.innerHTML = blocks.map((c, i) => window.UI.renderCatTile(c, i)).join("");
  }

  /* ---------------------------------------------------------
     Featured products
     --------------------------------------------------------- */
  function renderFeatured() {
    const host = $("#featured");
    if (!host) return;
    /* 8 keeps the 3-up grid full at every breakpoint */
    const picks = window.PRODUCT_HELPERS.featured().slice(0, 8);
    host.innerHTML = picks.map((p, i) => window.UI.renderCard(p, { index: i })).join("");
  }

  /* ---------------------------------------------------------
     Why A2Z — four feature blocks
     --------------------------------------------------------- */
  function renderWhy() {
    const host = $("#why");
    if (!host) return;

    const items = [
      {
        icon: "shield",
        title: "Genuine Products",
        text: "Quality-focused product selection with verified supply, not guesswork on fitment or specification.",
      },
      {
        icon: "rider",
        title: "Rider Focused",
        text: "Products selected with real riders in mind — cut, protection and comfort that survive a full day in the saddle.",
      },
      {
        icon: "diamond",
        title: "Premium Gear",
        text: "Focused on quality, protection and performance across every category we carry.",
      },
      {
        icon: "pinMap",
        title: "Biratnagar",
        text: "Local motorcycle gear destination in Koshi, Nepal — visit the shop or message us directly.",
      },
    ];

    host.innerHTML = items
      .map(
        (it, i) =>
          '<div class="feature reveal reveal--delay-' +
          (i + 1) +
          '">' +
          '<span class="feature__index">' +
          String(i + 1).padStart(2, "0") +
          "</span>" +
          (window.A2Z.ICONS[it.icon] || "") +
          "<h3 class='feature__title'>" +
          esc(it.title) +
          "</h3>" +
          "<p class='feature__text'>" +
          esc(it.text) +
          "</p>" +
          "</div>"
      )
      .join("");
  }

  /* ---------------------------------------------------------
     BOOT
     --------------------------------------------------------- */
  function boot() {
    renderTicker();
    renderCategories();
    renderFeatured();
    renderWhy();

    /* pick up the freshly injected reveal + parallax nodes */
    window.A2Z.observeReveals();
    window.A2Z.initParallax();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
