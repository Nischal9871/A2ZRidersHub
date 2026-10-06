/* =============================================================
   A2Z RIDERS HUB — Product detail page
   -------------------------------------------------------------
   Renders a product from ?id=, drives the gallery, injects
   Product structured data and updates document metadata.
   ============================================================= */

(function () {
  "use strict";

  const $ = (s) => document.querySelector(s);
  const esc = (s) => window.A2Z.escapeHtml(s);
  const H = window.PRODUCT_HELPERS;

  let current = null;

  /* ---------------------------------------------------------
     RENDER
     ------------------------------------------------------- */
  function renderCrumbs(p) {
    const host = $("#crumbs");
    const cat = SITE.categoryById(p.category);
    if (!host) return;
    host.innerHTML = [
      '<a href="' + window.A2Z_URLS.home + '">Home</a>',
      '<span aria-hidden="true">/</span>',
      '<a href="' + window.A2Z_URLS.catalogue + '">Catalogue</a>',
      '<span aria-hidden="true">/</span>',
      '<a href="' + window.A2Z_URLS.catalogue + "?cat=" + p.category + '">' + esc(cat ? cat.name : p.category) + "</a>",
      '<span aria-hidden="true">/</span>',
      "<span>" + esc(p.name) + "</span>",
    ].join("");
  }

  function renderGallery(p) {
    const thumbs = p.images
      .map(
        (id, i) =>
          '<button class="gallery__thumb" type="button" role="tab" aria-selected="' +
          (i === 0) +
          '" data-index="' +
          i +
          '" aria-label="Show image ' +
          (i + 1) +
          ' of ' +
          p.images.length +
          '">' +
          MEDIA.img(id, 480, 360, { sizes: "160px" }) +
          "</button>"
      )
      .join("");

    return (
      '<div class="gallery">' +
      '<div class="gallery__main" id="gallery-main" role="img" aria-label="' +
      esc(MEDIA.alt(p.images[0])) +
      '">' +
      MEDIA.img(p.images[0], 1200, 900, {
        sizes: "(max-width: 979px) 92vw, 54vw",
        eager: true,
      }) +
      '<span class="gallery__tag">' +
      esc(p.sku) +
      "</span>" +
      "</div>" +
      '<div class="gallery__thumbs" role="tablist" aria-label="Product images">' +
      thumbs +
      "</div>" +
      "</div>"
    );
  }

  function renderInfo(p) {
    const cat = SITE.categoryById(p.category);
    const avail = H.availabilityOf(p);
    const enquiry = "I would like details about the " + p.name + " (" + p.sku + ")";

    return (
      '<div class="pdp__info">' +
      '<p class="pdp__label">' +
      esc(cat ? cat.name : p.category) +
      " / " +
      esc(p.type) +
      "</p>" +
      '<h1 class="pdp__title">' +
      esc(p.name) +
      "</h1>" +
      '<p class="pdp__short">' +
      esc(p.short) +
      "</p>" +
      '<div class="pdp__pricebox">' +
      "<div>" +
      '<p class="pdp__price">' +
      esc(H.formatPrice(p.price)) +
      "</p>" +
      '<p class="pdp__sku">Ref ' +
      esc(p.sku) +
      " / " +
      esc(p.brand) +
      "</p>" +
      "</div>" +
      '<p class="pdp__avail ' +
      avail.cls +
      '">' +
      esc(avail.label) +
      "</p>" +
      "</div>" +
      '<div class="pdp__actions">' +
      '<a class="btn btn--primary" href="#" data-wa="' +
      esc(enquiry) +
      '"><span>WhatsApp Enquiry</span><span class="btn__arrow" aria-hidden="true"></span></a>' +
      '<a class="btn btn--ghost" href="' + window.A2Z_URLS.contact + '"><span>Request Details</span></a>' +
      "</div>" +
      '<p class="pdp__note">' +
      window.A2Z.ICONS.info +
      "<span>This is a catalogue, not a checkout. Message us with your size and we will " +
      "confirm fit, stock and price before you visit the shop in Biratnagar.</span>" +
      "</p>" +
      '<section class="pdp__block"><h2>Description</h2><p class="body-copy">' +
      esc(p.desc) +
      "</p></section>" +
      '<section class="pdp__block"><h2>Technical Specifications</h2>' +
      window.UI.renderSpecs(p.specs) +
      "</section>" +
      '<section class="pdp__block"><h2>Features</h2>' +
      window.UI.renderFeatures(p.features) +
      "</section>" +
      '<section class="pdp__block"><h2>Availability</h2><p class="body-copy">' +
      esc(availabilityCopy(p)) +
      "</p></section>" +
      "</div>"
    );
  }

  function availabilityCopy(p) {
    switch (p.availability) {
      case "limited":
        return "Limited stock is held at our Biratnagar shop. Availability changes quickly, so message us before travelling.";
      case "on-order":
        return "This item is ordered in from the supplier. Message us for the current lead time and expected arrival in Biratnagar.";
      case "pre-order":
        return "Available to pre-order with a deposit. Message us to confirm sizing and the expected arrival date.";
      default:
        return "In stock and available to collect from Biratnagar, or we can arrange handover in Koshi Province.";
    }
  }

  function render(p) {
    const host = $("#pdp");
    if (!host) return;
    host.innerHTML = renderGallery(p) + renderInfo(p);
    renderCrumbs(p);
    bindGallery(p);
    bindWaLinks(host);
  }

  /* the generic link binder in site.js runs on DOMContentLoaded,
     so anything injected afterwards is bound here */
  function bindWaLinks(scope) {
    scope.querySelectorAll("[data-wa]").forEach((el) => {
      el.setAttribute("href", SITE.waLink(el.dataset.wa));
      el.setAttribute("target", "_blank");
      el.setAttribute("rel", "noopener");
    });
  }

  function bindGallery(p) {
    const main = $("#gallery-main");
    if (!main) return;

    const img = main.querySelector("img");
    const thumbs = Array.from(document.querySelectorAll(".gallery__thumb"));

    thumbs.forEach((thumb) => {
      thumb.addEventListener("click", () => {
        const id = p.images[Number(thumb.dataset.index)];
        img.style.opacity = "0";
        setTimeout(() => {
          img.src = window.MEDIA.px(id, 1200, 900);
          img.alt = window.MEDIA.alt(id);
          main.setAttribute("aria-label", window.MEDIA.alt(id));
          img.style.opacity = "1";
        }, 180);
        thumbs.forEach((t) => t.setAttribute("aria-selected", String(t === thumb)));
      });
    });

    /* restrained click-to-zoom */
    main.addEventListener("click", () => {
      main.classList.toggle("is-zoomed");
    });
    main.addEventListener("mouseleave", () => main.classList.remove("is-zoomed"));
  }

  function renderRelated(p) {
    const host = $("#related");
    if (!host) return;
    const rel = H.related(p, 4);
    host.innerHTML = rel
      .map((x, i) => window.UI.renderCard(x, { index: i, sizes: "(max-width: 619px) 92vw, 23vw" }))
      .join("");
  }

  /* ---------------------------------------------------------
     METADATA + STRUCTURED DATA
     ------------------------------------------------------- */
  function applyMeta(p) {
    const cat = SITE.categoryById(p.category);
    const title =
      p.name +
      " — " +
      (cat ? cat.name : p.category) +
      " in Biratnagar, Nepal | A2Z Riders Hub";
    const desc =
      p.name +
      " (" +
      (cat ? cat.name : p.category) +
      "). " +
      p.short +
      ". " +
      H.formatPrice(p.price) +
      ". " +
      H.availabilityOf(p).label +
      ". From A2Z Riders Hub, motorcycle gear in Biratnagar, Nepal.";

    document.title = title;

    const setMeta = (sel, value) => {
      const el = document.head.querySelector(sel);
      if (el) el.setAttribute("content", value);
    };
    setMeta('meta[name="description"]', desc);
    setMeta('meta[property="og:title"]', title);
    setMeta('meta[property="og:description"]', desc);

    const img = document.head.querySelector('meta[property="og:image"]');
    if (img) img.setAttribute("content", window.MEDIA.px(p.images[0], 1200, 630));

    let canonical = document.head.querySelector('link[rel="canonical"]');
    if (!canonical) {
      canonical = document.createElement("link");
      canonical.setAttribute("rel", "canonical");
      document.head.appendChild(canonical);
    }
    canonical.setAttribute(
      "href",
      window.A2Z_URLS.product + "?id=" + encodeURIComponent(p.id)
    );

    injectJsonLd(p);
  }

  function injectJsonLd(p) {
    const cat = SITE.categoryById(p.category);
    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.textContent = JSON.stringify({
      "@context": "https://schema.org",
      "@type": "Product",
      name: p.name,
      sku: p.sku,
      description: p.desc,
      category: cat ? cat.name : p.category,
      brand: { "@type": "Brand", name: p.brand },
      image: p.images.map((id) => window.MEDIA.px(id, 1200, 900)),
      offers: {
        "@type": "Offer",
        price: p.price,
        priceCurrency: "NPR",
        availability:
          p.availability === "in-stock"
            ? "https://schema.org/InStock"
            : p.availability === "limited"
            ? "https://schema.org/LimitedAvailability"
            : "https://schema.org/PreOrder",
        url: window.A2Z_URLS.product + "?id=" + encodeURIComponent(p.id),
        seller: { "@type": "Organization", name: "A2Z Riders Hub" },
      },
    });
    document.head.appendChild(script);
  }

  /* ---------------------------------------------------------
     NOT FOUND
     ------------------------------------------------------- */
  function renderMissing() {
    const host = $("#pdp");
    if (host) {
      host.innerHTML =
        '<div class="empty-state" style="grid-column: 1 / -1">' +
        "<h2>Product not found</h2>" +
        '<p class="body-copy" style="max-width: 46ch">That reference does not match anything in the catalogue. Browse the full list or message us and we will check.</p>' +
        '<div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center">' +
        '<a class="btn btn--primary btn--sm" href="' + window.A2Z_URLS.catalogue + '"><span>View Catalogue</span></a>' +
        '<a class="btn btn--ghost btn--sm" href="#" data-wa="a product reference"><span>WhatsApp Enquiry</span></a>' +
        "</div></div>";
      bindWaLinks(host);
    }
    const related = $("#related");
    if (related) related.parentElement.parentElement.style.display = "none";
  }

  /* ---------------------------------------------------------
     BOOT
     ------------------------------------------------------- */
  function boot() {
    const id = new URLSearchParams(location.search).get("id");
    const p = id ? H.byId(id) : null;

    if (!p) {
      renderMissing();
      return;
    }

    current = p;
    render(p);
    renderRelated(p);
    applyMeta(p);
    window.A2Z.observeReveals();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }

  window.addEventListener("popstate", boot);
})();
