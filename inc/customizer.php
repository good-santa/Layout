<?php
/**
 * Theme Customizer settings
 */

add_action('customize_register', function($wp_customize) {

    // ========== Hero Section ==========
    $wp_customize->add_section('layout_home_section', [
        'title'    => __('Головна секція (Hero)', 'layout-theme'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('layout_hero_title', [
        'default'   => __('Мій лендинг', 'layout-theme'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_hero_title', [
        'label'   => __('Головний заголовок', 'layout-theme'),
        'section' => 'layout_home_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_hero_subtitle', [
        'default'   => __('Короткий опис або підзаголовок', 'layout-theme'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_hero_subtitle', [
        'label'   => __('Підзаголовок', 'layout-theme'),
        'section' => 'layout_home_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_hero_btn_text', [
        'default'   => __('Дізнатися більше', 'layout-theme'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_hero_btn_text', [
        'label'   => __('Текст кнопки', 'layout-theme'),
        'section' => 'layout_home_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_hero_btn_url', [
        'default'   => '#about',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('layout_hero_btn_url', [
        'label'   => __('Посилання кнопки', 'layout-theme'),
        'section' => 'layout_home_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('layout_hero_image', [
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control( new WP_Customize_Media_Control($wp_customize, 'layout_hero_image', [
        'label'    => __('Зображення Hero', 'layout-theme'),
        'section'  => 'layout_home_section',
        'mime_type'=> 'image',
    ]));

    // ========== Features Section ==========
    $wp_customize->add_section('layout_features_section', [
        'title'    => __('Переваги', 'layout-theme'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('layout_features_title', [
        'default' => __('Наші переваги', 'layout-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_features_title', [
        'label'   => __('Заголовок секції', 'layout-theme'),
        'section' => 'layout_features_section',
        'type'    => 'text',
    ]);

    for ($i=1;$i<=3;$i++) {
        $wp_customize->add_setting("layout_feature_{$i}_title", [
            'default' => sprintf(__('Перевага %d', 'layout-theme'), $i),
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("layout_feature_{$i}_title", [
            'label'   => sprintf(__('Заголовок %d', 'layout-theme'), $i),
            'section' => 'layout_features_section',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting("layout_feature_{$i}_desc", [
            'default' => __('Опис переваги. Замініть на власний текст.', 'layout-theme'),
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("layout_feature_{$i}_desc", [
            'label'   => sprintf(__('Опис %d', 'layout-theme'), $i),
            'section' => 'layout_features_section',
            'type'    => 'text',
        ]);
    }

    // ========== About Section ==========
    $wp_customize->add_section('layout_about_section', [
        'title'    => __('Про нас', 'layout-theme'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('layout_about_title', [
        'default' => __('Про нас', 'layout-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_about_title', [
        'label'   => __('Заголовок', 'layout-theme'),
        'section' => 'layout_about_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_about_text', [
        'default' => __('Тут короткий опис компанії/проєкту. Керується з адмінки.', 'layout-theme'),
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('layout_about_text', [
        'label'   => __('Текст', 'layout-theme'),
        'section' => 'layout_about_section',
        'type'    => 'textarea',
    ]);

    // ========== CTA Section ==========
    $wp_customize->add_section('layout_cta_section', [
        'title'    => __('Заклик до дії (CTA)', 'layout-theme'),
        'priority' => 33,
    ]);

    $wp_customize->add_setting('layout_cta_title', [
        'default' => __('Готові почати?', 'layout-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_cta_title', [
        'label'   => __('Заголовок', 'layout-theme'),
        'section' => 'layout_cta_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_cta_btn_text', [
        'default' => __('Зв’язатися', 'layout-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('layout_cta_btn_text', [
        'label'   => __('Текст кнопки', 'layout-theme'),
        'section' => 'layout_cta_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('layout_cta_btn_url', [
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('layout_cta_btn_url', [
        'label'   => __('Посилання кнопки', 'layout-theme'),
        'section' => 'layout_cta_section',
        'type'    => 'url',
    ]);
});
