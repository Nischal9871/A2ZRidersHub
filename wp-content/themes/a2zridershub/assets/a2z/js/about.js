/* =============================================================
   A2Z RIDERS HUB — About page
   ============================================================= */

(function () {
  "use strict";

  const $ = (s) => document.querySelector(s);
  const esc = (s) => window.A2Z.escapeHtml(s);

  function renderPrinciples() {
    const host = $("#principles");
    if (!host) return;

    const items = [
      {
        icon: "shield",
        title: "Protection first",
        text: "If a product cannot be traced to a stated armour or certification standard, it does not go on the shelf. Ratings are listed as-is, not rounded up.",
      },
      {
        icon: "rider",
        title: "Fit that works",
        text: "A jacket that fits beautifully on a mannequin will not fit the way you sit on a bike. We check cut, sleeve length and armour position against real riders.",
      },
      {
        icon: "diamond",
        title: "Parts that fit",
        text: "Components are matched to the machine — pitch, tooth count, thread and caliper type — because a wrong-size part is a wasted trip to Biratnagar.",
      },
      {
        icon: "pinMap",
        title: "Supplied locally",
        text: "Stocked and sold in Biratnagar. No international shipping, no customs guesswork, and someone local to answer the phone.",
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

  function renderCats() {
    const host = $("#cats");
    if (!host) return;
    host.innerHTML = SITE.CATEGORIES.map((c, i) => window.UI.renderCatTile(c, i)).join("");
  }

  function boot() {
    renderPrinciples();
    renderCats();
    window.A2Z.observeReveals();
    window.A2Z.initParallax();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
