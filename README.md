# Layout Theme (WordPress)

Тема створена як каркас для перенесення HTML-лендингу у WordPress з можливістю керувати контентом через адмінку (Customizer).

## Встановлення
1. Скопіюй папку `layout-theme/` у `wp-content/themes/` твого проєкту WordPress.
2. Активуй тему в адмінці: `Зовнішній вигляд → Теми`.
3. Зайди в `Зовнішній вигляд → Налаштувати` та змінюй тексти/картинки секцій.

## Де вставляти свій HTML/CSS/JS
- Твій основний HTML → у файлі `index.php` (всередині `<main>`). Можеш створювати додаткові шаблони `front-page.php`, `page.php` тощо.
- Свій CSS → у `assets/css/style.css` (або додай нові файли і підключи в `functions.php`).
- Свій JS → у `assets/js/main.js`.

## Зображення
Клади у `assets/images/` та звертайся так:
```php
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero.png" alt="">
```

## Меню
Увімкнено 2 меню: `Primary` та `Footer`. Налаштовується в `Зовнішній вигляд → Меню`.

## Ліцензія
GPL-2.0+
