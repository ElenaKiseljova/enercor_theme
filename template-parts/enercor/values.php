<?php 
  $values = get_sub_field( 'values' );
?>
<?php if ($values && !empty($values) && !is_wp_error( $values )) : ?>
  <?php 
    $title = $values['title'];  
    $list = $values['list'];  
    $button_projects = $values['button_projects'];  
    $button_services = $values['button_services'];  
  ?>

  <?php if ($title && !empty($title)) : ?>
    <h2 class="mission__title"><?= $title; ?></h2>
  <?php endif; ?>  

  <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
    <ul class="mission__circle">
      <?php foreach ($list as $key => $item) : ?>
        <li class="mission__circle-item">
            <?= $item['text']; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  
  <div class="wrapper__btn mission__wrapper-btn">
    <div class="btn mission__btn">
      <?php if ($button_services && !empty($button_services) && !is_wp_error( $button_services )) : ?>
        <?php if ($button_services['title'] && !empty($button_services['title']) && !empty($button_services['link'])) : ?>
          <a href="<?= $button_services['link']; ?>" class="btn__link mission__btn-link">
            <div class="btn__arrow ">
              <svg class="btn__arrow-icon  mission__btn__arrow-icon" viewBox="0 0 22 22" width="22"
                    height="22"
                    fill="none">
                  <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round"/>
                  <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                        stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round"/>
              </svg>
            </div>
            <p class="btn__text mission__btn-text"><?= $button_services['title']; ?></p>
          </a>
        <?php endif; ?>
      <?php endif; ?>
        
      <?php if ($button_projects && !empty($button_projects) && !is_wp_error( $button_projects )) : ?>
        <?php if ($button_projects['title'] && !empty($button_projects['title']) && !empty($button_projects['link'])) : ?>
          <a href="<?= $button_projects['link']; ?>" class="btn__link mission__btn-link">
            <div class="btn__arrow ">
              <svg class="btn__arrow-icon  mission__btn__arrow-icon" viewBox="0 0 22 22" width="22"
                    height="22"
                    fill="none">
                  <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round"/>
                  <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                        stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round"/>
              </svg>
            </div>
            <p class="btn__text mission__btn-text"><?= $button_projects['title']; ?></p>
          </a>
        <?php endif; ?>
      <?php endif; ?>        
    </div>
  </div>
<?php endif; ?>
