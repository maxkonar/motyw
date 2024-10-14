<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<?php use App\Helpers; ?>
<body <?php body_class(); ?>>

<header class="header">
    <div class="header__container">
        <div class="header__logo-container">
            <a href="/" class="header__logo">
            <?php Helpers::print_svg('logo.svg'); ?>
            </a>
        </div>
        <div class="header__navigation-container">
        <nav class="header__navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'header__menu',
            ));
            ?>
        </nav>
        </div>
    </div>
</header>