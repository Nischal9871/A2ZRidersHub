/* =============================================================
   A2Z RIDERS HUB — Global site configuration
   -------------------------------------------------------------
   Single source of truth for contact details, navigation,
   categories and imagery helpers.

   >>> REPLACE THE CONTACT BLOCK BELOW WITH REAL DETAILS <<<
   Everything else on the site (header, footer, WhatsApp
   buttons, product enquiries) reads from this file.
   ============================================================= */

window.SITE = (function () {
  /* ---------------------------------------------------------
     CONTACT — edit these five values and the whole site updates
     --------------------------------------------------------- */
  const CONTACT = {
    brand: "A2Z Riders Hub",
    tagline: "Motorcycle Gear & Riding Equipment",
    phoneDisplay: "+977 981-0000000",   // TODO: real phone
    phoneDial: "+9779810000000",        // TODO: real phone (digits only)
    whatsapp: "9779810000000",          // TODO: real WhatsApp number (country code + number, digits only)
    whatsappDisplay: "+977 981-0000000", // TODO: pretty version shown in the footer
    email: "info@a2zridershub.com",     // TODO: real email
    street: "Biratnagar",               // TODO: add street / landmark
    city: "Biratnagar",
    region: "Koshi Province",
    country: "Nepal",
    countryCode: "NP",
    postal: "",                         // TODO: postal code if any
    hours: "Sun–Fri, 10:00 – 19:00 (NPT)",
    mapQuery: "Biratnagar,Koshi,Nepal",
  };

  /* Full postal address as one line */
  const ADDRESS =
    `${CONTACT.street}, ${CONTACT.city}, ${CONTACT.region}, ${CONTACT.country}`
      .replace(/,\s*,/g, ",")
      .replace(/^,\s*/, "");

  CONTACT.address = ADDRESS;

  /* ---------------------------------------------------------
     SOCIAL
     --------------------------------------------------------- */
  const SOCIAL = [
    { label: "Facebook", icon: "facebook", url: "https://facebook.com/" }, // TODO
    { label: "Instagram", icon: "instagram", url: "https://instagram.com/" }, // TODO
    { label: "YouTube", icon: "youtube", url: "https://youtube.com/" }, // TODO
    { label: "TikTok", icon: "tiktok", url: "https://tiktok.com/" }, // TODO
  ];

  /* ---------------------------------------------------------
     CATEGORIES
     `block` controls whether the category gets a large editorial
     tile on the homepage category showcase.
     --------------------------------------------------------- */
  const CATEGORIES = [
    {
      id: "jackets",
      name: "Racing Jackets",
      nav: "Jackets",
      short: "Premium protection and riding apparel",
      blurb:
        "CE-rated leather and textile race jackets built for abrasion resistance, impact buffering and a precise performance fit.",
      block: true,
      photo: 36813309, // rider in leather jacket, foggy forest road
      photoAlt:
        "Rider wearing a helmet and leather jacket on a foggy forest road",
    },
    {
      id: "helmets",
      name: "Premium Helmets",
      nav: "Helmets",
      short: "Protection, comfort and performance",
      blurb:
        "Full-face, modular and open-face helmets with certified shell construction, visor systems and interior fitment.",
      block: true,
      photo: 9827688, // helmet + gloves on bike at night
      photoAlt:
        "Motorcycle helmet and riding gloves resting on a motorcycle at night",
    },
    {
      id: "gloves",
      name: "Riding Gloves",
      nav: "Gloves",
      short: "Grip, control and protection",
      blurb:
        "Gauntlet, short-cuff and mesh gloves with knuckle armour, reinforced palm grip and season-matched liners.",
      block: true,
      photo: 8158546, // black leather gloves on red bike
      photoAlt:
        "Motorcyclist wearing black leather riding gloves gripping a red motorcycle handlebar",
    },
    {
      id: "parts",
      name: "Bike Parts",
      nav: "Bike Parts",
      short: "Selected motorcycle components",
      blurb:
        "Service consumables, braking, drivetrain and engine components selected for correct fit and dependable road use.",
      block: true,
      photo: 1410448, // engine component metallic
      photoAlt:
        "Motorcycle engine component showing machined metallic surfaces",
    },
    {
      id: "gears",
      name: "Riding Gears",
      nav: "Riding Gears",
      short: "Essential equipment for riders",
      blurb:
        "Boots, knee protection, rain systems and back protectors that complete a serious riding setup.",
      block: true,
      photo: 31250425, // two riders in full gear
      photoAlt:
        "Two riders wearing full protective gear posing beside motorcycles outdoors",
    },
    {
      id: "accessories",
      name: "Accessories",
      nav: "Accessories",
      short: "Rider and machine essentials",
      blurb:
        "Locks, tank bags, chargers, visors and workshop consumables that keep a bike and rider road-ready.",
      block: false,
      photo: 18213071,
      photoAlt: "Motorcycle helmet and black riding boots against a city wall",
    },
  ];

  const categoryById = (id) => CATEGORIES.find((c) => c.id === id);

  /* ---------------------------------------------------------
     NAVIGATION
     --------------------------------------------------------- */
  const NAV = [
    { label: "Home", href: window.A2Z_URLS.home },
    { label: "Shop", href: window.A2Z_URLS.catalogue },
    { label: "Jackets", href: window.A2Z_URLS.catalogue + "?cat=jackets" },
    { label: "Helmets", href: window.A2Z_URLS.catalogue + "?cat=helmets" },
    { label: "Gloves", href: window.A2Z_URLS.catalogue + "?cat=gloves" },
    { label: "Bike Parts", href: window.A2Z_URLS.catalogue + "?cat=parts" },
    { label: "Riding Gears", href: window.A2Z_URLS.catalogue + "?cat=gears" },
    { label: "About", href: window.A2Z_URLS.about },
  ];

  const FOOTER_NAV = [
    { label: "Home", href: window.A2Z_URLS.home },
    { label: "Catalogue", href: window.A2Z_URLS.catalogue },
    { label: "Categories", href: window.A2Z_URLS.catalogue },
    { label: "About", href: window.A2Z_URLS.about },
    { label: "Contact", href: window.A2Z_URLS.contact },
  ];

  const FOOTER_CATEGORIES = CATEGORIES.map((c) => ({
    label: c.nav,
    href: window.A2Z_URLS.catalogue + `?cat=${c.id}`,
  }));

  /* ---------------------------------------------------------
     WHATSAPP / ENQUIRY LINKS
     --------------------------------------------------------- */
  function waLink(message) {
    const msg = encodeURIComponent(
      `Hello A2Z Riders Hub, I would like details about: ${message}`
    );
    return `https://wa.me/${CONTACT.whatsapp}?text=${msg}`;
  }

  function telLink() {
    return `tel:${CONTACT.phoneDial}`;
  }

  function mapLink() {
    return `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(
      CONTACT.mapQuery
    )}`;
  }

  return {
    CONTACT,
    ADDRESS,
    SOCIAL,
    CATEGORIES,
    categoryById,
    NAV,
    FOOTER_NAV,
    FOOTER_CATEGORIES,
    waLink,
    telLink,
    mapLink,
    logo: window.A2Z_URLS.logo,
    logoAlt: "A2Z Riders Hub logo",
  };
})();
