<?php get_header(); ?>
    <main id="main" class="site-main" role="main">

      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content'); ?>
      <?php endwhile; else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
      <?php endif; ?>
    </main>

  <?php get_sidebar(); ?>
<?php get_footer(); ?>