<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#0b0b0b" />
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/a2z/images/favicon.svg' ); ?>" type="image/svg+xml" />
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/a2z/images/logo.png' ); ?>" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preconnect" href="https://images.pexels.com" />
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@400;500;600&family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to main content</a>

<!-- ==================== HEADER ==================== -->
<header class="site-header">
  <div class="site-header__inner">
    <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="A2Z Riders Hub — home">
      <img
        class="brand__mark"
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/a2z/images/logo.png' ); ?>"
        alt="A2Z Riders Hub"
        width="500"
        height="480"
        loading="eager"
        fetchpriority="high"
        decoding="async"
      />
      <span class="brand__meta">
        <span class="brand__name">A2Z Riders Hub</span>
        <span class="brand__loc">Biratnagar / Nepal</span>
      </span>
    </a>

    <nav class="nav" aria-label="Primary navigation" data-nav>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/' ) ); ?>">Shop</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/?cat=jackets' ) ); ?>">Jackets</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/?cat=helmets' ) ); ?>">Helmets</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/?cat=gloves' ) ); ?>">Gloves</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/?cat=parts' ) ); ?>">Bike Parts</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/catalogue/?cat=gears' ) ); ?>">Riding Gears</a>
      <a class="nav__link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
    </nav>

    <div class="header-actions">
      <button class="icon-btn" type="button" data-search-open aria-label="Search the catalogue">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <circle cx="11" cy="11" r="7" />
          <path d="M16.5 16.5 21 21" />
        </svg>
      </button>

      <a class="header-contact" href="#" data-wa="motorcycle gear">
        <span class="header-contact__dot" aria-hidden="true"></span>
        WhatsApp
      </a>

      <button
        class="menu-toggle"
        type="button"
        aria-label="Open menu"
        aria-expanded="false"
        aria-controls="drawer"
      >
        <span class="menu-toggle__lines" aria-hidden="true">
          <span></span><span></span><span></span>
        </span>
      </button>
    </div>
  </div>
</header>

<!-- ==================== MOBILE DRAWER ==================== -->
<div class="drawer" id="drawer" aria-hidden="true">
  <div class="drawer__top">
    <span class="label">Menu</span>
    <button class="icon-btn" type="button" data-drawer-close aria-label="Close menu">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M5 5l14 14M19 5L5 19" />
      </svg>
    </button>
  </div>

  <nav class="drawer__nav" aria-label="Mobile navigation" data-nav>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home <span>01</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/' ) ); ?>">Shop <span>02</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/?cat=jackets' ) ); ?>">Jackets <span>03</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/?cat=helmets' ) ); ?>">Helmets <span>04</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/?cat=gloves' ) ); ?>">Gloves <span>05</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/?cat=parts' ) ); ?>">Bike Parts <span>06</span></a>
    <a href="<?php echo esc_url( home_url( '/catalogue/?cat=gears' ) ); ?>">Riding Gears <span>07</span></a>
    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About <span>08</span></a>
  </nav>

  <div class="drawer__foot">
    <a class="btn btn--primary btn--block" href="#" data-wa="motorcycle gear">
      <span>WhatsApp Enquiry</span>
    </a>
    <p class="drawer__contact">
      <a href="#" data-tel><span data-contact="phoneDisplay"></span></a><br />
      <span data-contact="address"></span>
    </p>
  </div>
</div>
