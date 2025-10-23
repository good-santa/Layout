<?php
/**
 * Footer template
 */
?>
<footer class="site-footer">
  <div class="container footer-inner">
    <div class="footer-copy">
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</span>
      <span><?php bloginfo('description'); ?></span>
    </div>
    <nav class="footer-nav" aria-label="<?php esc_attr_e('Footer', 'layout-theme'); ?>">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'menu',
            'fallback_cb' => false
        ]);
        ?>
    </nav>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
