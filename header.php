<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


    <header id="masthead" class="header">
      <div class="header-content">
        <div class="site-title-group">
          <div class="site-title">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
              <?php bloginfo('name'); ?>
            </a>
          </div>
          <p class="site-description">
            <?php bloginfo('description'); ?>
          </p>
        </div>
      </div>

      <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php 
          $args = [
            'theme_location' => 'main-menu'
          ];
          wp_nav_menu($args);
        ?>
      </nav>
    </header>

    <div id="content" class="site-content">


  