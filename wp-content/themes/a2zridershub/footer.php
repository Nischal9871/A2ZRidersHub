<!-- ==================== FOOTER ==================== -->
<footer class="site-footer">
  <div class="wrap">
    <div class="footer__top">
      <div class="footer__brand">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/a2z/images/logo.png' ); ?>"
          alt="A2Z Riders Hub"
          width="500"
          height="480"
          loading="lazy"
        />
        <p>
          Premium motorcycle products and riding equipment catalogue. Genuine gear for
          serious riders, stocked and supplied in Biratnagar.
        </p>
        <address class="address">
          <span data-contact="address"></span><br />
          <span data-contact="hours"></span>
        </address>
      </div>

      <nav class="footer__col" aria-label="Footer navigation">
        <h3>Navigation</h3>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/' ) ); ?>">Catalogue</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=jackets' ) ); ?>">Categories</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
        </ul>
      </nav>

      <nav class="footer__col" aria-label="Footer categories">
        <h3>Categories</h3>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=jackets' ) ); ?>">Jackets</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=helmets' ) ); ?>">Helmets</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=gloves' ) ); ?>">Gloves</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=parts' ) ); ?>">Bike Parts</a></li>
          <li><a href="<?php echo esc_url( home_url( '/catalogue/?cat=gears' ) ); ?>">Riding Gears</a></li>
        </ul>
      </nav>

      <div class="footer__col">
        <h3>Contact</h3>
        <ul>
          <li>
            <a href="#" data-tel><span data-contact="phoneDisplay"></span></a>
          </li>
          <li>
            <a href="#" data-wa="motorcycle gear">
              <span data-contact="whatsappDisplay"></span>
            </a>
          </li>
          <li>
            <a href="#" data-map><span data-contact="address"></span></a>
          </li>
          <li><a href="mailto:info@a2zridershub.com">info@a2zridershub.com</a></li>
        </ul>
        <div class="socials" id="socials"></div>
      </div>
    </div>

    <div class="footer__bottom">
      <p class="footer__line">A2Z Riders Hub / Biratnagar / Nepal</p>
      <p class="footer__legal">
        © <span id="year">2026</span> A2Z Riders Hub. All rights reserved.
      </p>
    </div>
  </div>
</footer>

<!-- ==================== SEARCH OVERLAY ==================== -->
<div class="search" id="search" role="dialog" aria-modal="true" aria-label="Search the catalogue">
  <div class="search__bar">
    <div class="search__field">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <circle cx="11" cy="11" r="7" />
        <path d="M16.5 16.5 21 21" />
      </svg>
      <input
        class="search__input"
        id="search-input"
        type="search"
        placeholder="Search gear…"
        autocomplete="off"
        aria-label="Search products"
      />
      <button class="search__close" type="button" data-search-close>Esc / Close</button>
    </div>
    <div class="search__hint">
      <span class="mono">Tip</span>
      <span class="mono">Press “/” to search · Enter to open catalogue</span>
    </div>
  </div>
  <div class="search__results" id="search-results"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>
