<?php 
    $member = get_sub_field('member');
    $button_profile = get_sub_field('button_profile');
    $button_team = get_sub_field('button_team');
    $text_bg = get_sub_field('text_bg');
  ?>
  
  <section class="ceo" id="ceo">
    <div class="container">
      <?php if ($member && !is_wp_error( $member )) : ?>
        <?php 
          $name = $member->post_title;
          $id = $member->ID;
          $position = get_field( 'position', $id );
          $quote = get_field( 'quote', $id );
          $link = get_post_permalink( $id );
        ?>
        <h2 class="ceo__title title"><?= $position; ?></h2>

        <div class="ceo__wrapper">
          <?php if (has_post_thumbnail( $id )) : ?>
            <?= get_the_post_thumbnail( $id ); ?>
          <?php endif; ?>
          
          
          <div class="ceo__about">
            <h4 class="ceo__name"><?= $name; ?></h4>

            <p class="ceo__text ceo__text--decor">
              <q>
                <?= $quote; ?>
              </q>
            </p>

            <?php if ($button_profile && !empty($button_profile)) : ?>
              <div class="wrapper__btn ">
                <div class="btn">
                    <a href="<?= $link; ?>" class="btn__link ceo__btn">
                        <div class="btn__arrow ">
                            <svg class="btn__arrow-icon ceo__btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                                <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="btn__text ceo__btn-text"><?= $button_profile; ?></p>
                    </a>
                </div>
              </div>
            <?php endif; ?>  

            <?php if ($text_bg) : ?>
              <div class="ceo__decoration">
                <?php if (!empty($text_bg['1'])) : ?>
                  <p class="ceo__decoration-text"><?= $text_bg['1']; ?></p>
                <?php endif; ?>
                <?php if (!empty($text_bg['2'])) : ?>
                  <p class="ceo__decoration-text"><?= $text_bg['2']; ?></p>
                <?php endif; ?>
                <?php if (!empty($text_bg['3'])) : ?>
                  <p class="ceo__decoration-text"><?= $text_bg['3']; ?></p>
                <?php endif; ?>              
              </div>
            <?php endif; ?>  

            <?php if ($button_team && !empty($button_team['title']) && !empty($button_team['link'])) : ?>
              <div class="wrapper__btn ">
                <div class="btn">
                    <a href="<?= $button_team['link']; ?>" class="btn__link ceo__btn">
                        <div class="btn__arrow ">
                            <svg class="btn__arrow-icon ceo__btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                                <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="btn__text ceo__btn-text"><?= $button_team['title']; ?></p>
                    </a>
                </div>
              </div>
            <?php endif; ?>            
          </div>
        </div>  
      <?php endif; ?>      
    </div>
  </section>