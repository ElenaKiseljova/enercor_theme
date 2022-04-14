<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= get_template_directory_uri(  ); ?>/assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php
      wp_head();
    ?>
</head>
<body>
  <?php 
    $cursor_diffrent = get_field( 'cursor_diffrent', 'options' );
    $cursor_color = get_field( 'cursor_color', 'options' );
  ?>
  <style>
    <?php if ( $cursor_diffrent ) : ?>
      .ink-cursor {
        mix-blend-mode: difference;
      }
    <?php else : ?> 
      .ink-cursor {
        mix-blend-mode: normal;
      }
    <?php endif; ?>     

    <?php if ( $cursor_color ) : ?>
      .ink-cursor span {
        background-color: <?= $cursor_color; ?>;
      }
    <?php endif; ?>    
  </style>
  <div id="ink-cursor" class="ink-cursor"></div>
  <header class="header">
      <div class="container header__container">      
        <?php 
          $is_color_logo = false;
          $theme_color_mode_logo = false;

          if (is_post_type_archive( 'team' )) {
            $archive_team_page_id = get_field( 'archive_team', 'option' );
      
            $theme_color_mode_logo = get_field( 'theme_color_mode_logo', $archive_team_page_id );
          }else if ( is_singular( 'team' ) ) {
            $is_color_logo = true;
          } else {
            $theme_color_mode_logo = get_field( 'theme_color_mode_logo' );
          }

          if ($theme_color_mode_logo && $theme_color_mode_logo === 'color') {
            $is_color_logo = true;
          }
        ?>
        <a class="header__logo logo" href="<?= bloginfo( 'url' ) ?>">
            <svg class="header__logo-icon <?= $is_color_logo ? 'header__logo-icon--red' : ''; ?>" width="31" height="32">
              <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#logo"></use>
            </svg>
            <svg class="header__logo-icon--text <?= $is_color_logo ? 'header__logo-icon--blue' : ''; ?>" width="102" height="23">
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

  <div class="back wrapper__btn wrapper__btn--black">
    <div class="btn">
      <a href="javascript:history.back()" class="back__link btn__link" data-element="">    
        <p class="back__text btn__text">Back</p>

        <div class="back__icon btn__arrow btn__arrow--reverse">
          <svg class="btn__arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
            <path class="arrowLeftanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path class="arrowLeftanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
              stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </div>      
      </a>
    </div>
  </div>
