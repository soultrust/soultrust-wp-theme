<?php get_header(); ?>
    <main id="main" class="site-main" role="main">
      <?php
        $blog_version = get_theme_mod( 'blog_home_version', 'full' );
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            if ( $blog_version === 'excerpt' ) {
              get_template_part( 'template-parts/content', 'excerpt' );
            } else {
              get_template_part( 'template-parts/content' );
            }
          endwhile;
        endif;?>
    </main>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>