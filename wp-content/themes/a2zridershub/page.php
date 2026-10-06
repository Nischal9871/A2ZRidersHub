<?php
/* Generic page fallback. The four catalogue pages use their own templates. */
get_header();
while ( have_posts() ) : the_post();
?>
<main id="main">
  <section class="section">
    <div class="wrap prose">
      <h1 class="page-head__title"><?php the_title(); ?></h1>
      <div class="body-copy"><?php the_content(); ?></div>
    </div>
  </section>
</main>
<?php endwhile; get_footer(); ?>
