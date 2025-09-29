<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
  
  
    <header class="entry-header">
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <div class="byline">
        <?php esc_html_e('Author: '); ?> <?php the_author(); ?>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
</article>