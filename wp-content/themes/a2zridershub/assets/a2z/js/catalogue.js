/* =============================================================
   A2Z RIDERS HUB — Catalogue page
   -------------------------------------------------------------
   Filtering by category, brand, price band, availability and
   product type, plus text search and sorting. State is mirrored
   into the URL so any view can be shared or bookmarked.
   ============================================================= */

(function () {
  "use strict";

  const $ = (s) => document.querySelector(s);
  const esc = (s) => window.A2Z.escapeHtml(s);

  const H = window.PRODUCT_HELPERS;

  /* ---------------------------------------------------------
     FILTER DEFINITIONS
     ------------------------------------------------------- */
  const PRICE_BANDS = [
    { id: "0-5000", label: "Under NPR 5,000", test: (p) => p.price < 5000 },
    { id: "5000-15000", label: "NPR 5,000 – 15,000", test: (p) => p.price >= 5000 && p.price < 15000 },
    { id: "15000-30000", label: "NPR 15,000 – 30,000", test: (p) => p.price >= 15000 && p.price < 30000 },
    { id: "30000+", label: "NPR 30,000+", test: (p) => p.price >= 30000 },
  ];

  const AVAILABILITY = [
    { id: "in-stock", label: "Available", test: (p) => p.availability === "in-stock" },
    { id: "limited", label: "Limited Stock", test: (p) => p.availability === "limited" },
    { id: "order", label: "On Order / Pre-Order", test: (p) => p.availability === "on-order" || p.availability === "pre-order" },
  ];

  const GROUPS = [
    {
      key: "category",
      title: "Category",
      multi: true,
      options: () =>
        SITE.CATEGORIES.map((c) => ({
          id: c.id,
          label: c.name,
          count: window.PRODUCTS.filter((p) => p.category === c.id).length,
        })),
    },
    {
      key: "brand",
      title: "Brand",
      multi: true,
      options: () => H.brands().map((b) => ({ id: b, label: b, count: window.PRODUCTS.filter((p) => p.brand === b).length })),
    },
    {
      key: "price",
      title: "Price",
      multi: false,
      options: () => PRICE_BANDS.map((b) => ({ id: b.id, label: b.label, test: b.test })),
    },
    {
      key: "availability",
      title: "Availability",
      multi: false,
      options: () => AVAILABILITY.map((a) => ({ id: a.id, label: a.label, test: a.test })),
    },
    {
      key: "type",
      title: "Product Type",
      multi: true,
      options: () => H.types().map((t) => ({ id: t, label: t, count: window.PRODUCTS.filter((p) => p.type === t).length })),
    },
  ];

  /* ---------------------------------------------------------
     STATE
     ------------------------------------------------------- */
  const state = {
    q: "",
    sort: "featured",
    category: [],
    brand: [],
    price: "",
    availability: "",
    type: [],
  };

  /* ---------------------------------------------------------
     URL SYNC
     ------------------------------------------------------- */
  function readUrl() {
    const params = new URLSearchParams(location.search);

    state.q = params.get("q") || "";
    state.sort = params.get("sort") || "featured";

    state.category = params.get("cat") ? [params.get("cat")] : (params.get("category") || "").split(",").filter(Boolean);
    state.brand = (params.get("brand") || "").split(",").filter(Boolean);
    state.type = (params.get("type") || "").split(",").filter(Boolean);
    state.price = params.get("price") || "";
    state.availability = params.get("availability") || "";
  }

  function writeUrl(push) {
    const params = new URLSearchParams();
    if (state.q) params.set("q", state.q);
    if (state.category.length === 1) params.set("cat", state.category[0]);
    else if (state.category.length > 1) params.set("category", state.category.join(","));
    if (state.brand.length) params.set("brand", state.brand.join(","));
    if (state.type.length) params.set("type", state.type.join(","));
    if (state.price) params.set("price", state.price);
    if (state.availability) params.set("availability", state.availability);
    if (state.sort !== "featured") params.set("sort", state.sort);

    const qs = params.toString();
    const base = location.pathname;
    const url = qs ? base + "?" + qs : base;
    if (push) history.pushState(null, "", url);
    else history.replaceState(null, "", url);
  }

  /* ---------------------------------------------------------
     FILTERING
     ------------------------------------------------------- */
  function matchesGroup(p, group) {
    const value = state[group.key];

    /* an empty array is truthy — treat it as "no filter" */
    if (!value || (Array.isArray(value) && value.length === 0)) return true;

    if (group.key === "price") {
      const band = PRICE_BANDS.find((b) => b.id === value);
      return band ? band.test(p) : true;
    }
    if (group.key === "availability") {
      const opt = AVAILABILITY.find((a) => a.id === value);
      return opt ? opt.test(p) : true;
    }
    return value.indexOf(p[group.key]) !== -1;
  }

  function filtered() {
    const term = state.q.trim().toLowerCase();

    let list = window.PRODUCTS.filter((p) => {
      if (!GROUPS.every((g) => matchesGroup(p, g))) return false;
      if (!term) return true;

      const cat = SITE.categoryById(p.category);
      const hay = [p.name, p.brand, p.type, p.sku, p.short, cat ? cat.name : "", p.desc]
        .join(" ")
        .toLowerCase();
      return hay.indexOf(term) !== -1;
    });

    list.sort((a, b) => {
      switch (state.sort) {
        case "price-asc":
          return a.price - b.price;
        case "price-desc":
          return b.price - a.price;
        case "name-asc":
          return a.name.localeCompare(b.name);
        case "name-desc":
          return b.name.localeCompare(a.name);
        default:
          /* featured first, then catalogue order */
          return (b.featured ? 1 : 0) - (a.featured ? 1 : 0);
      }
    });

    return list;
  }

  /* ---------------------------------------------------------
     RENDER
     ------------------------------------------------------- */
  function renderFilterGroups() {
    const host = $("#filter-groups");
    if (!host) return;

    /* preserve manually opened groups across re-renders */
    const openKeys = new Set();
    host.querySelectorAll("details.filter-group").forEach((d) => {
      if (d.open && d.dataset.key) openKeys.add(d.dataset.key);
    });
    const firstRender = host.children.length === 0;

    host.innerHTML = GROUPS.map((g, gi) => {
      const opts = g.options();
      const current = state[g.key];
      const hasActive = Array.isArray(current) ? current.length > 0 : !!current;

      const chips = opts
        .map((o) => {
          const on = Array.isArray(current) ? current.indexOf(o.id) !== -1 : current === o.id;
          const count = o.count != null ? `<span class="mono" style="margin-left:6px">${o.count}</span>` : "";
          return (
            '<button class="chip" type="button" aria-pressed="' +
            on +
            '" data-group="' +
            g.key +
            '" data-value="' +
            esc(o.id) +
            '">' +
            esc(o.label) +
            count +
            "</button>"
          );
        })
        .join("");

      const activeCount = Array.isArray(current)
        ? current.length
        : current
          ? 1
          : 0;
      const badge = activeCount
        ? '<span class="filter-group__count">' + activeCount + "</span>"
        : "";
      /* keep first group open on first paint, then respect user toggles + active filters */
      const shouldOpen = firstRender ? gi === 0 || hasActive : openKeys.has(g.key) || hasActive;
      const open = shouldOpen ? " open" : "";

      return (
        '<details class="filter-group"' +
        open +
        ' data-key="' +
        esc(g.key) +
        '">' +
        '<summary class="filter-group__title">' +
        "<span>" +
        esc(g.title) +
        "</span>" +
        '<span class="filter-group__meta">' +
        badge +
        '<span class="filter-group__chevron" aria-hidden="true"></span>' +
        "</span>" +
        "</summary>" +
        '<div class="chips">' +
        chips +
        "</div>" +
        "</details>"
      );
    }).join("");
  }

  function renderQuickCats() {
    const host = $("#quick-cats");
    if (!host) return;

    const all = { id: "", name: "All Equipment" };
    host.innerHTML = [all]
      .concat(SITE.CATEGORIES)
      .map((c) => {
        const active = state.category.length === 1 && state.category[0] === c.id;
        const allActive = state.category.length === 0;
        const on = c.id ? active : allActive;
        return (
          '<button class="chip" type="button" aria-pressed="' +
          on +
          '" data-quickcat="' +
          esc(c.id) +
          '">' +
          esc(c.name) +
          "</button>"
        );
      })
      .join("");
  }

  function renderGrid(list) {
    const grid = $("#grid");
    const empty = $("#empty");
    if (!grid) return;

    if (!list.length) {
      grid.innerHTML = "";
      grid.hidden = true;
      if (empty) empty.hidden = false;
      return;
    }

    grid.hidden = false;
    if (empty) empty.hidden = true;
    grid.innerHTML = list
      .map((p, i) => window.UI.renderCard(p, { index: i, sizes: "(max-width: 759px) 92vw, (max-width: 1099px) 32vw, 24vw" }))
      .join("");

    window.A2Z.observeReveals();
  }

  function renderCount(list) {
    const count = $("#count");
    if (!count) return;
    count.innerHTML =
      "<b>" + list.length + "</b> " + (list.length === 1 ? "product" : "products");

    const dirty =
      state.q ||
      state.category.length ||
      state.brand.length ||
      state.type.length ||
      state.price ||
      state.availability;

    const reset = $("#reset");
    if (reset) reset.hidden = !dirty;
  }

  function renderAll() {
    const list = filtered();
    renderFilterGroups();
    renderQuickCats();
    renderCount(list);
    renderGrid(list);
  }

  /* ---------------------------------------------------------
     PAGE HEAD reacts to a single-category view
     ------------------------------------------------------- */
  function renderHead() {
    const single = state.category.length === 1 ? SITE.categoryById(state.category[0]) : null;
    if (!single) return;

    document.title =
      single.name + " in Biratnagar, Nepal — A2Z Riders Hub Motorcycle Gear Catalogue";

    const title = $("#page-title");
    const lede = $("#page-lede");
    const crumbLabel = $("#crumb-cat-label");
    const crumbMark = $("#crumb-cat");
    const index = $("#head-index");
    const meta = $("#page-head-media img");

    if (title) title.textContent = single.name;
    if (lede) lede.textContent = single.blurb;
    if (index) index.textContent = single.name;
    if (crumbLabel) crumbLabel.textContent = single.name;
    if (crumbMark) crumbMark.hidden = false;
    if (meta) {
      meta.src = window.MEDIA.px(single.photo, 1800, 900);
      meta.srcset =
        window.MEDIA.px(single.photo, 900, 450) +
        " 900w, " +
        window.MEDIA.px(single.photo, 1800, 900) +
        " 1800w";
      meta.alt = single.photoAlt;
    }
  }

  /* ---------------------------------------------------------
     EVENTS
     ------------------------------------------------------- */
  function toggleValue(list, value) {
    const i = list.indexOf(value);
    if (i === -1) list.push(value);
    else list.splice(i, 1);
    return list;
  }

  function initEvents() {
    /* chips */
    document.addEventListener("click", (e) => {
      const chip = e.target.closest(".chip");
      if (!chip) return;

      if (chip.dataset.quickcat != null) {
        const id = chip.dataset.quickcat;
        state.category = id ? [id] : [];
        writeUrl(false);
        renderAll();
        return;
      }

      const group = chip.dataset.group;
      if (!group) return;
      const value = chip.dataset.value;
      const def = GROUPS.find((g) => g.key === group);

      if (def && def.multi) {
        state[group] = toggleValue(state[group], value);
      } else {
        state[group] = state[group] === value ? "" : value;
      }

      writeUrl(false);
      renderAll();
    });

    /* search */
    const q = $("#q");
    if (q) {
      q.value = state.q;
      let timer;
      q.addEventListener("input", () => {
        clearTimeout(timer);
        timer = setTimeout(() => {
          state.q = q.value;
          writeUrl(false);
          renderAll();
        }, 180);
      });
    }

    /* sort */
    const sort = $("#sort");
    if (sort) {
      sort.value = state.sort;
      sort.addEventListener("change", () => {
        state.sort = sort.value;
        writeUrl(false);
        renderAll();
      });
    }

    /* reset */
    const clear = () => {
      state.q = "";
      state.category = [];
      state.brand = [];
      state.price = "";
      state.availability = "";
      state.type = [];
      state.sort = "featured";
      if (q) q.value = "";
      if (sort) sort.value = "featured";
      writeUrl(false);
      renderAll();
    };
    const reset = $("#reset");
    if (reset) reset.addEventListener("click", clear);
    const emptyReset = $("#empty-reset");
    if (emptyReset) emptyReset.addEventListener("click", clear);

    /* mobile filters toggle */
    const toggle = $("#filters-toggle");
    const side = $("#filters-side");
    if (toggle && side) {
      const syncToggle = () => {
        const open = side.classList.contains("is-open");
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
        toggle.classList.toggle("is-active", open);
      };
      toggle.addEventListener("click", () => {
        side.classList.toggle("is-open");
        syncToggle();
      });
      /* close sidebar after picking a filter on mobile */
      side.addEventListener("click", (e) => {
        if (e.target.closest(".chip") && window.innerWidth < 1000) {
          side.classList.remove("is-open");
          syncToggle();
        }
      });
      syncToggle();
    }

    /* back / forward */
    window.addEventListener("popstate", () => {
      readUrl();
      if (q) q.value = state.q;
      if (sort) sort.value = state.sort;
      renderAll();
    });
  }

  /* ---------------------------------------------------------
     BOOT
     ------------------------------------------------------- */
  function boot() {
    readUrl();
    renderHead();
    initEvents();
    renderAll();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
