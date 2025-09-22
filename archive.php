<?php get_header(); ?>
  <main id="main" class="site-main" role="main">
    <h1><?php the_archive_title(''); ?></h1>
    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/content', 'posts'); ?>
    <?php endwhile; else : ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
    <?php echo paginate_links(); ?>
  </main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>