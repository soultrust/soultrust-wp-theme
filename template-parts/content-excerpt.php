<article id="post-<?php the_ID(); ?>" <?php post_class('entry excerpt'); ?>>
   <a href="<?php echo esc_url(get_permalink()); ?>">
  <header class="entry-header">
    <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
  </header>
 
  <div class="entry-content">
    
    <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail( 'post-thumbnail', array( 'class' => 'entry-featured-img' ) );
    }
    ?>
    
    <?php the_excerpt(); ?>
    
  </div>
  </a>
</article>