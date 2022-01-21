<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
      wp_head();
    ?>
</head>
<body>
<div id="ink-cursor" class="ink-cursor"></div>
<header class="header">
    <div class="container header__container">
        <a class="header__logo logo" href="#">
            <svg class="header__logo-icon" width="31" height="32">
                <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#logo"></use>
            </svg>
            <svg class="header__logo-icon--text" width="102" height="23">
                <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#logo-text"></use>
            </svg>
        </a>
        <div class="header__menu">
            <nav class="header__navigation ">
              <?php
                wp_nav_menu(
                  array(
                    'theme_location'  => 'top_menu',
                    'container'       => null,
                    'menu_class'      => 'header__list',
                  )
                );	
              ?>
            </nav>
            <button class="hamburger">
                <div class="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="hamburger-close">
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </div>
</header>