<?php 

// Add theme support
add_theme_support('automatic-feed-links');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('custom-logo');
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('html5');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat']);
add_theme_support('starter-content');
add_theme_support('title-tag');

// Load in our CSS
function soultrust_enqueue_scripts_and_styles() {
  wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'));
  wp_enqueue_style('main-theme-file', get_stylesheet_uri() . '/style.css', [], '', 'all'); // time()
  wp_enqueue_style('main-style-index', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap',
    [], '', 'all'
  );
  wp_enqueue_style(
    'google-fonts2',
    'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap',
    [], '', 'all'
  );
}
add_action('wp_enqueue_scripts', 'soultrust_enqueue_scripts_and_styles');

// Register Menu Locations
register_nav_menus([
  'main-menu' => esc_html__('Main Menu', 'soultrust'),
]);

// Set Widget Areas
function soultrust_widgets_init() {
  register_sidebar([
    'name'          => esc_html__('Main Sidebar', 'soultrust'),
    'id'            => 'main-sidebar',
    'description'   => esc_html__('Add widgets for main sidebar here', 'soultrust'),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>', 
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);
}
add_action('widgets_init', 'soultrust_widgets_init');


// Color Customizer
function color_customize_register($wp_customize) {
  $wp_customize->add_setting('base_bg_color', array(
    'default' => '#ffffff',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('border_color', array(
    'default' => '#000000',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('header_overlay_color', array(
    'default' => '#dddddd',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('header_overlay_opacity', array(
    'default' => '0.5',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('site_title_color', array(
    'default' => '#000000',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('content_bg_color', array(
    'default' => '#dddddd',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('content_bg_opacity', array(
    'default' => 0.5,
    'transport' => 'refresh',
  ));
  $wp_customize->add_section('soultrust_colors', array(
    'title' => __('Colors', 'Soultrust'),
    'priority' => 30,
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'base_bg_color_control', array(
    'label' => __('Base Background Color', 'Soultrust'),
    'section' => 'soultrust_colors',
    'settings' => 'base_bg_color',
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'border_color_control', array(
    'label' => __('Border and Default Text Color', 'Soultrust'),
    'section' => 'soultrust_colors',
    'settings' => 'border_color',
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_overlay_color_control', array(
    'label' => __('Header Overlay Color', 'Soultrust'),
    'section' => 'soultrust_colors',
    'settings' => 'header_overlay_color',
  )));
  $wp_customize->add_control('header_overlay_opacity', array(
    'label' => __('Header Overlay Opacity', 'Soultrust'),
    'section' => 'soultrust_colors',
    'type' => 'range',
    'input_attrs' => array(
      'min' => 0,
      'max' => 1,
      'step' => .1,
    ),
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site-title-color-control', array(
    'label' => __('Site Title Color', 'Soultrust'),
    'section' => 'soultrust_colors',
    'settings' => 'site_title_color',
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg_color_control', array(
    'label' => __('Content Background Color', 'Soultrust'),
    'section' => 'soultrust_colors',
    'settings' => 'content_bg_color',
  )));
  $wp_customize->add_control( 'content_bg_opacity', array(
    'type' => 'range',
    'section' => 'soultrust_colors',
    'label' => __('Content Background Opacity', 'Soultrust'),
    'input_attrs' => array(
      'min' => 0,
      'max' => 1,
      'step' => .1,
    ),
  ));
  $wp_customize->remove_section( 'colors');
}
add_action('customize_register', 'color_customize_register');

function hexToRgb($hex, $alpha = false) {
  $hex      = str_replace('#', '', $hex);
  $length   = strlen($hex);
  $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
  $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
  $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
  if ($alpha) {
    $rgb['a'] = $alpha;
  }
  return $rgb['r'] . ', ' . $rgb['b'] . ', ' . $rgb['b'];
}

// Output Customize CSS
function soultrust_customize_color_css() { ?>
  <style type="text/css">
    :root {
      --border-color: <?php echo get_theme_mod('border_color') ?>;
    }
    body {
      background-color: <?php echo get_theme_mod('base_bg_color'); ?>;
      color: var(--border-color);
      box-shadow: inset 0 0 0 9px var(--border-color);
      background-image: linear-gradient(to right, rgba(<?php echo hexToRgb(get_theme_mod('content_bg_color')); ?>, <?php echo get_theme_mod('content_bg_opacity'); ?>));
    }
    body::before {
      border-color: var(--border-color);
    }
    .header {
      border-bottom: 3px solid var(--border-color);
    }
    .header::after {
      background-color: <?php echo get_theme_mod('header_overlay_color') ?>;
      opacity: <?php echo get_theme_mod('header_overlay_opacity') ?>;
    }
    body a {
      color: var(--border-color);
    }
    .site-title {
      a {
        color: <?php echo get_theme_mod('site_title_color'); ?>;
      }
    }
    .site-description {
      color: <?php echo get_theme_mod('site_title_color'); ?>;
    }
    .entry-header h1 {
      border-top-color: var(--border-color);
    }
    .video_lightbox_auto_anchor_image {
      border-color: var(--border-color);
    }
    .yotu-videos.yotu-mode-list .yotu-video .yotu-video-title {
      color: var(--border-color);
    }
    .wp-block-group.is-layout-flex .yotu-playlist {
      border-color: var(--border-color) !important;
    }
    .wp-block-group.is-layout-flex .yotu-playlist .yotu-video-thumb-wrp {
      border-top: 1px solid var(--border-color) !important;
      border-bottom: 1px solid var(--border-color);
    }
    .yotu-video-thumb-wrp {
      border: 1px solid var(--border-color);
    }
    .wp-block-image img {
      border-color: var(--border-color);
    }
  </style>
<?php }
add_action('wp_head', 'soultrust_customize_color_css');


