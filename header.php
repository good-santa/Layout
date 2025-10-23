<?php
/**
 * Header template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="container">
    <div class="site-branding">
        <?php if ( has_custom_logo() ) { the_custom_logo(); } ?>
        <a class="site-title" href="<?php echo esc_url( home_url('/') ); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </div>
    <nav class="primary-nav" aria-label="<?php esc_attr_e('Primary', 'layout-theme'); ?>">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'menu',
            'fallback_cb' => false
        ]);
        ?>
    </nav>
  </div>
</header>

<section class="hero">
  <div class="container hero-inner">
    <div class="hero-text">
      <h1><?php echo esc_html( get_theme_mod('layout_hero_title', __('Мій лендинг', 'layout-theme')) ); ?></h1>
      <p class="hero-subtitle"><?php echo esc_html( get_theme_mod('layout_hero_subtitle', __('Короткий опис або підзаголовок', 'layout-theme')) ); ?></p>
      <?php
        $btn_text = get_theme_mod('layout_hero_btn_text', __('Дізнатися більше', 'layout-theme'));
        $btn_url  = get_theme_mod('layout_hero_btn_url', '#about');
        if ($btn_text):
      ?>
        <a class="btn btn-primary" href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?></a>
      <?php endif; ?>
    </div>
    <div class="hero-media">
      <?php
        $hero_img_id = get_theme_mod('layout_hero_image');
        if ($hero_img_id) {
            echo wp_get_attachment_image($hero_img_id, 'large', false, ['class' => 'hero-image', 'alt' => 'Hero']);
        }
      ?>
    </div>
  </div>
</section>
