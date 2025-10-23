<?php
/**
 * Index template
 * Replace sections below with your landing sections. You can paste your HTML into <main> and swap static text with Customizer options or ACF fields.
 */
get_header();
?>
<main class="site-main">
  <section id="features" class="section">
    <div class="container">
      <h2><?php echo esc_html( get_theme_mod('layout_features_title', __('Наші переваги', 'layout-theme')) ); ?></h2>
      <div class="features-grid">
        <?php for ($i=1; $i<=3; $i++): ?>
          <div class="feature">
            <h3><?php echo esc_html( get_theme_mod("layout_feature_{$i}_title", sprintf(__('Перевага %d', 'layout-theme'), $i)) ); ?></h3>
            <p><?php echo esc_html( get_theme_mod("layout_feature_{$i}_desc", __('Опис переваги. Замініть на власний текст.', 'layout-theme')) ); ?></p>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <section id="about" class="section section-alt">
    <div class="container">
      <h2><?php echo esc_html( get_theme_mod('layout_about_title', __('Про нас', 'layout-theme')) ); ?></h2>
      <p><?php echo esc_html( get_theme_mod('layout_about_text', __('Тут короткий опис компанії/проєкту. Керується з адмінки.', 'layout-theme')) ); ?></p>
    </div>
  </section>

  <section id="cta" class="section cta">
    <div class="container cta-inner">
      <h2><?php echo esc_html( get_theme_mod('layout_cta_title', __('Готові почати?', 'layout-theme')) ); ?></h2>
      <?php
        $cta_btn_text = get_theme_mod('layout_cta_btn_text', __('Зв’язатися', 'layout-theme'));
        $cta_btn_url  = get_theme_mod('layout_cta_btn_url', '#contact');
      ?>
      <a class="btn btn-primary" href="<?php echo esc_url($cta_btn_url); ?>"><?php echo esc_html($cta_btn_text); ?></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
