<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1><?php the_title(); ?></h1>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <?php if (comments_open()) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</article>