<?php
/* Fallback for blog/archive views — catalogue theme is page-based. */
get_header();
?>
<main id="main">
  <section class="section">
    <div class="wrap">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1 class="display display--lg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="body-copy"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; else : ?>
        <p class="body-copy">Nothing here yet. Try the <a class="link-line" href="<?php echo esc_url( home_url( '/catalogue/' ) ); ?>">catalogue</a>.</p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
