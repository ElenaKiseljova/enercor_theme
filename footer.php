<?php 
  $frontpage_id = get_option( 'page_on_front' );

  $footer = get_field( 'footer', $frontpage_id );
?>

<footer class="footer">
  <?php if ($footer && !is_wp_error( $footer )) : ?>
    <div class="footer__wrapper-top">
      <div class="container">
          <div class="footer__wrapper">
            <?php if (!empty($footer['title'])) : ?>
              <h2 class="footer__title">
                  <?= $footer['title']; ?>
              </h2>
            <?php endif; ?>
            <?php if (!empty($footer['button']['title']) && !empty($footer['button']['link'])) : ?>
              <div class="footer__wrapper-btn">
                  <div class="wrapper__btn ">
                      <div class="btn">
                          <a href="<?= $footer['button']['link']; ?>" class="btn__link">
                              <div class="btn__arrow footer__btn-arrow">
                                  <svg class="btn__arrow-icon footer__btn-arrow-icon" width="22" height="22"
                                        fill="none">
                                      <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                      <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                  </svg>
                              </div>
                              <p class="btn__text footer__btn-text"><?= $footer['button']['title']; ?></p>
                          </a>
                      </div>
                  </div>
              </div>
            <?php endif; ?>                  
          </div>
          
          <div class="footer__navigation-city">
            <ul class="footer__navigation-city-list"> 
              <?php 
                $contact_page_id = 21;

                $cities = get_terms( [
                  'taxonomy' => 'cities',
                  'hide_empty' => false,
                ] ) ?? [];

                $city_cur = get_the_terms( get_the_ID(  ), 'cities' ) ?? [];
              ?>
              <?php foreach ($cities as $city) : ?>
                <li class="footer__navigation-city-item">
                  <a class="footer__navigation-city-link"
                      href="<?= get_permalink( $contact_page_id  ) . '?city=' . $city->name; ?>">
                      <?= $city->name; ?>
                  </a>
                </li>
              <?php endforeach; ?>   
            </ul>
          </div>           
      </div>
    </div>
  <?php endif; ?>

    <div class="footer__wrapper-bottom">
      <div class="container">
          <div class="footer__wrap">
              <a href="#" class="footer__logo">
                  <svg class="footer__logo-icon" width="31" height="32">
                      <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#logo"></use>
                  </svg>
                  <svg class=footer__logo-icon--text" width="102" height="23">
                      <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#logo-text"></use>
                  </svg>
              </a>
              <div class="footer__social-network">
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location'  => 'social',
                      'container'       => null,
                      'menu_class'      => 'footer__social-network-list'
                    )
                  );	
                ?>
              </div>
          </div>
          <div class="footer__wrap">
              <nav class="footer__navigation-pages">
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location'  => 'bottom_menu',
                      'container'       => null,
                      'menu_class'      => 'footer__navigation-pages-list'
                    )
                  );	
                ?>
              </nav>
          </div>
      </div>
      <div class="container">
        <p class="footer__privacy">
          @<?= date('Y'); ?> Enercor Management Solutions Ltd. <br>All rights reserved.
        </p>
      </div>
    </div>
</footer>
<?php
  wp_footer();
?>
</body>
</html>