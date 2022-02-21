<?php 
    $title = get_sub_field('title');
    $content = get_sub_field('content');

    $title_list = get_sub_field('title_list');
    $list = get_sub_field('list');

    $button = get_sub_field('button');
  ?>
  <section class="services" id="services">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="services__title title"><?= $title; ?></h2>
      <?php endif; ?>
        
      <div class="services__wrap">
        <?= $content; ?>
      </div>
      
      <?php if (!empty($title_list)) : ?>
        <h2 class="services__include title"><?= $title_list; ?></h2>
      <?php endif; ?>
      
      <?php if ( $list && !empty( $list) && !is_wp_error(  $list )) : ?>
        <div class="services__wrapper">
          <?php foreach ( $list as $service) : ?>
            <div class="services__info">
              <?php 
                $title = $service->name;
                $id = $service->term_id;
                $link = get_term_link( $id, 'services');
              ?>
              <a href="<?= $link; ?>" class="services__info-text">
                <?= $title; ?>
              </a>
            </div>
          <?php endforeach; ?>
       </div>        
      <?php endif; ?>     

      <?php if ($button && !empty($button) && !is_wp_error( $button )) : ?>
        <?php if ($button['title'] && !empty($button['title']) && $button['link'] && !empty($button['link'])) : ?>
          <div class="services__wrapper-btn">
            <div class="wrapper__btn ">
              <div class="btn">
                <a href="<?= $button['link']; ?>" class="btn__link selected__btn">
                  <div class="btn__arrow ">
                    <svg class="btn__arrow-icon selected__btn-arrow-icon" width="22" height="22"
                          fill="none">
                        <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                              stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                  </div>
                  <p class="btn__text selected__btn-text"><?= $button['title']; ?></p>
                </a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>