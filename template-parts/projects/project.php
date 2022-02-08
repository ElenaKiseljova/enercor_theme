<?php 
  $id = get_the_ID();
  $services = get_the_terms( $id, 'services' );
  
  $title = get_the_title( $id );
  $subtitle = get_field( 'subtitle', $id );
  $icon = get_field( 'icon', $id );

  $main = get_field( 'main', $id );
                
  if ($main && !is_wp_error( $main )) {
    $image = $main['image'];
  }
?>


<div class="swiper-slide completed-projects--slide">
  <div class="completed-projects__slide">
    <?php if ($image) : ?>
      <div class="completed-projects__slide-img">
        <img src="<?= $image['sizes']['project_archive']; ?>" alt="<?= strip_tags( $title ); ?>">
      </div>        
    <?php endif; ?>

    <div class="completed-projects__slide-container">
      <div class="completed-projects__slide-wrap">
        <?php if ($icon) : ?>
          <img class="completed-projects__slide-icon" src="<?= $icon; ?>" alt="<?= strip_tags( $title ); ?>">
        <?php endif; ?>                      

        <h6 class="completed-projects__slide-title"><?= $title; ?></h6>
      </div>
      <p class="completed-projects__slide-text">
        <?php if (!empty($services) && !is_wp_error( $services )) : ?>
          <?php foreach ($services as $key => $service) : ?>
            <?php 
              $service_id = $service->term_id;
              $service_link = get_term_link( $service_id, 'services' ); 
            ?>
            <?php if (!is_wp_error( $service_link )) : ?>
              <a href="<?= $service_link; ?>">
                <?= (end($services) === $service) ? $service->name : ($service->name . ','); ?>
              </a>
            <?php endif; ?>                                           
          <?php endforeach; ?>
        <?php endif; ?>  
      </p>
    </div>
  </div>
  <template class="popup__template-header">
    <?php if ($image) : ?>
      <div class="completed-projects__slide-img">
        <img src="<?= $image['sizes']['large']; ?>" alt="<?= strip_tags( $title ); ?>">
      </div>        
    <?php endif; ?>

    <div class="popup__header-wrapper">
      <div class="popup__header-wrap">
        <?php if ($icon) : ?>
          <img class="completed-projects__slide-icon" src="<?= $icon; ?>" alt="<?= $title; ?>">
        <?php endif; ?>

        <h6 class="completed-projects__slide-title">
          <?= $title; ?>
        </h6>
      </div>
      <div class="popup__header-wrap-text">
        <p class="popup__header-text"><?= $subtitle; ?></p>
      </div>
    </div>
  </template>

  <template class="popup__template-content">
    <h5 class="popup__content-title">
      <?php if (!empty($services) && !is_wp_error( $services )) : ?>
        <?php foreach ($services as $service) : ?>
          <?php 
            $service_id = $service->term_id;
            $service_link = get_term_link( $service_id, 'services' ); 
          ?>
          <?php if (!is_wp_error( $service_link )) : ?>
            <a href="<?= $service_link; ?>">
              <?= (end($services) === $service)  ? $service->name : ($service->name . ','); ?>
            </a>
          <?php endif; ?>                                           
        <?php endforeach; ?>
      <?php endif; ?> 
    </h5>
    <p class="popup__content-text">
      <?= get_the_excerpt(  ); ?>
    </p>
    
    <div class="wrapper__btn ">
        <div class="btn">                        
          <a href="<?= get_permalink(  ); ?>" class="btn__link popup__btn">
            <div class="btn__arrow ">
                <svg class="btn__arrow-icon popup__btn-arrow-icon" width="22" height="22"
                      fill="none">
                    <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="arrowRightanimate"
                          d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                          stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <p class="btn__text popup__btn-text">Go to project</p>
          </a>
        </div>
      </div>               
  </template>
</div>