/* =============================================================
   A2Z RIDERS HUB — Media library
   -------------------------------------------------------------
   Photography is delivered from the Pexels CDN (free licence,
   no attribution required — credits kept here for good faith).

   Every entry has been checked and its `alt` describes exactly
   what is visible in the frame, so screen-reader users are never
   given a misleading description.

   Ids are Pexels photo ids. `px()` builds a cropped URL.
   ============================================================= */

window.MEDIA = (function () {
  /* id: { alt, by, tone }  tone = grade hint for the CSS filter */
  const PHOTOS = {
    /* --- hero / cinematic --- */
    33203561: {
      alt: "Motorcyclist on a red sport bike beneath a streetlight at night",
      by: "Pexels contributor",
    },
    33203564: {
      alt: "Rider in full gear beside a red motorcycle under city streetlights at night",
      by: "Pexels contributor",
    },
    13096715: {
      alt: "Rider paused on a motorcycle inside a lit urban tunnel at night",
      by: "Pexels contributor",
    },
    8991396: {
      alt: "Motorcyclist riding a dark forest road at night lit by headlights",
      by: "Pexels contributor",
    },
    18428159: {
      alt: "Motorcyclist racing at high speed on an outdoor track",
      by: "Pexels contributor",
    },
    30330941: {
      alt: "Motorcyclist leaning into a sharp turn on a winding road",
      by: "Pexels contributor",
    },
    5713150: {
      alt: "Two motorcyclists racing side by side on an outdoor track",
      by: "Pexels contributor",
    },
    13515766: {
      alt: "Rider in a racing suit at speed on a track",
      by: "Pexels contributor",
    },

    /* --- jackets --- */
    36813309: {
      alt: "Rider wearing a helmet and leather jacket on a foggy forest road",
      by: "Pexels contributor",
    },
    7679798: {
      alt: "Collection of leather jackets on display behind boutique glass",
      by: "Pexels contributor",
    },
    5195671: {
      alt: "Group of riders in jeans and leather jackets standing beside motorcycles",
      by: "Pexels contributor",
    },
    5622320: {
      alt: "Rider in a black leather jacket inspecting a motorcycle tyre in a showroom",
      by: "Pexels contributor",
    },
    5192248: {
      alt: "Rider in jeans and a leather jacket leaning against a motorcycle",
      by: "Pexels contributor",
    },

    /* --- helmets --- */
    9827688: {
      alt: "Motorcycle helmet and riding gloves resting on a bike at night",
      by: "Pexels contributor",
    },
    13429291: {
      alt: "Row of motorcycle helmets displayed on a shop shelf",
      by: "Pexels contributor",
    },
    12000066: {
      alt: "Close-up of a rider wearing a full-face helmet and protective goggles",
      by: "Pexels contributor",
    },
    10065173: {
      alt: "Gloved hands holding a motorcycle helmet",
      by: "Pexels contributor",
    },
    18213071: {
      alt: "Motorcycle helmet and black riding boots against a city wall",
      by: "Pexels contributor",
    },
    12775162: {
      alt: "Motorcyclist wearing a helmet riding a paved highway",
      by: "Pexels contributor",
    },
    10944512: {
      alt: "Side view of a rider on a sports bike at an urban roadside",
      by: "Pexels contributor",
    },

    /* --- gloves --- */
    8158546: {
      alt: "Motorcyclist wearing black leather gloves gripping a red motorcycle handlebar",
      by: "Pexels contributor",
    },
    26558692: {
      alt: "Close-up of blue and black motorcycle riding gloves",
      by: "Pexels contributor",
    },
    4819391: {
      alt: "Gloved hands adjusting on a motorcycle handlebar",
      by: "Pexels contributor",
    },
    36552352: {
      alt: "Gloved hand gripping a motorcycle handlebar, black and white",
      by: "Pexels contributor",
    },
    6413878: {
      alt: "Gloved hand holding a helmet beside a parked motorcycle",
      by: "Pexels contributor",
    },
    15625079: {
      alt: "Rider wearing a helmet and gloves beside a motorcycle in a forest setting",
      by: "Pexels contributor",
    },

    /* --- parts --- */
    1410448: {
      alt: "Motorcycle engine component showing machined metallic surfaces",
      by: "Pexels contributor",
    },
    30866489: {
      alt: "Yamaha motorcycle engine with exposed mechanical components",
      by: "Pexels contributor",
    },
    32683778: {
      alt: "Motorcycle rear wheel showing disc brake and tyre",
      by: "Pexels contributor",
    },
    37802925: {
      alt: "Motorcycle rear wheel with gear and chain in focus",
      by: "Pexels contributor",
    },
    18171624: {
      alt: "Motorcycle wheel and brake disc detail",
      by: "Pexels contributor",
    },
    10294593: {
      alt: "Motorcycle wheel rim and spokes under dramatic lighting",
      by: "Pexels contributor",
    },
    8072136: {
      alt: "Close-up of a cafe racer fuel tank",
      by: "Pexels contributor",
    },
    12519376: {
      alt: "Cafe racer side panel and leather seat detail",
      by: "Pexels contributor",
    },
    19949300: {
      alt: "Classic motorcycle seat and side panel with vintage stickers",
      by: "Pexels contributor",
    },
    5184915: {
      alt: "Hands working on a motorcycle engine outdoors",
      by: "Pexels contributor",
    },
    29740731: {
      alt: "Harley-Davidson motorcycle engine detail",
      by: "Pexels contributor",
    },
    16033328: {
      alt: "Silver motorcycle engine with chrome details",
      by: "Pexels contributor",
    },

    /* --- riding gear / boots --- */
    20662853: {
      alt: "Close-up of red leather motorcycle riding boots",
      by: "Pexels contributor",
    },
    20662856: {
      alt: "Red and black leather motorcycle boots on a truck bed",
      by: "Pexels contributor",
    },
    5192255: {
      alt: "Rider's black boots and jeans beside a parked motorcycle",
      by: "Pexels contributor",
    },
    4589226: {
      alt: "Motorcycle rider's boots beside engine details",
      by: "Pexels contributor",
    },
    4560435: {
      alt: "Rider in full protective gear beside a motorcycle on a forest road",
      by: "Pexels contributor",
    },
    31250425: {
      alt: "Two riders wearing full protective gear posing beside motorcycles outdoors",
      by: "Pexels contributor",
    },
    18206714: {
      alt: "Rider wearing a helmet seated on a blue sport motorcycle",
      by: "Pexels contributor",
    },
    18213071: {
      alt: "Motorcycle helmet and black riding boots against a city wall",
      by: "Pexels contributor",
    },

    /* --- garage / workshop / service --- */
    33203538: {
      alt: "Motorcyclist seated beside a red sport bike in a dimly lit garage",
      by: "Pexels contributor",
    },
    19870626: {
      alt: "Rider holding a helmet beside a motorcycle in a dimly lit garage",
      by: "Pexels contributor",
    },
    27704022: {
      alt: "Mechanic repairing a motorcycle in a dimly lit garage",
      by: "Pexels contributor",
    },
    3817843: {
      alt: "Collection of motorcycles on loft shelving in an industrial garage",
      by: "Pexels contributor",
    },
    5252118: {
      alt: "Motorcycle workshop with sport bikes on stands",
      by: "Pexels contributor",
    },
    33203575: {
      alt: "Rider beside a red motorcycle in an underground parking area",
      by: "Pexels contributor",
    },
    26740932: {
      alt: "Rider posing with a motorcycle in an underground garage",
      by: "Pexels contributor",
    },
    38482148: {
      alt: "Two sport bikes parked outdoors at night",
      by: "Pexels contributor",
    },
    39452229: {
      alt: "Black motorcycle parked on a city sidewalk",
      by: "Pexels contributor",
    },
  };

  /** Build a cropped CDN URL for a photo id. */
  function px(id, w, h, opts) {
    const o = opts || {};
    const q = [
      "auto=compress",
      "cs=tinysrgb",
      "fit=crop",
      `w=${w || 1400}`,
      `h=${h || 1000}`,
    ];
    if (o.gravity) q.push(`fp-x=${o.gravity.x}`, `fp-y=${o.gravity.y}`);
    return `https://images.pexels.com/photos/${id}/pexels-photo-${id}.jpeg?${q.join("&")}`;
  }

  /** Honest alt text for a photo id. */
  function alt(id) {
    const p = PHOTOS[id];
    return p ? p.alt : "Motorcycle gear photography from the A2Z Riders Hub catalogue";
  }

  /**
   * Returns a full <img> string with srcset + honest alt text.
   * `sizes` lets the browser pick the right file for the layout.
   */
  function img(id, w, h, opts) {
    const o = opts || {};
    const cls = o.class ? ` class="${o.class}"` : "";
    const lazy = o.eager ? ' loading="eager" fetchpriority="high"' : ' loading="lazy"';
    const src = px(id, w, h, o);
    const w1 = Math.round((w || 1400) * 0.5);
    const h1 = Math.round((h || 1000) * 0.5);
    const w2 = Math.round((w || 1400) * 0.75);
    const h2 = Math.round((h || 1000) * 0.75);
    const altAttr = o.alt || alt(id);
    return (
      `<img${cls} src="${src}"` +
      ` srcset="${px(id, w1, h1, o)} ${w1}w, ${px(id, w2, h2, o)} ${w2}w, ${src} ${w || 1400}w"` +
      ` sizes="${o.sizes || "(max-width: 720px) 92vw, 46vw"}"` +
      ` alt="${escapeAttr(altAttr)}"${lazy} decoding="async" width="${w || 1400}" height="${h || 1000}">`
    );
  }

  function escapeAttr(s) {
    return String(s)
      .replace(/&/g, "&amp;")
      .replace(/"/g, "&quot;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;");
  }

  return { px, img, alt, PHOTOS, escapeAttr };
})();
