<?php 
  $completed = get_field( 'completed', 'option' );
?>
<?php if ($completed && !is_wp_error( $completed )) : ?>
  <?php 
    $title = $completed['title'];
    $subtitle = $completed['subtitle'];

    $projects = $completed['projects'];

    $button = $completed['button'];
  ?>
  <section class="completed-projects">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h3 class="completed-projects__title title"><?= $title; ?></h3>
      <?php endif; ?>
      
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <h4 class="completed-projects__subtitle"><?= $subtitle; ?></h4>
      <?php endif; ?>
      
      <?php if ($projects && !empty($projects) && !is_wp_error( $projects )) : ?>
        <div class="swiper international-project">
          <div class="swiper-wrapper">
            <?php foreach ($projects as $key => $project) : ?>
              <?php 
                $title = $project->post_title;
                $excerpt = $project->post_excerpt;
                $id = $project->ID;                

                $subtitle = get_field( 'subtitle', $id );
                $icon = get_field( 'icon', $id );

                $link = get_permalink( $id );  
              ?>
              <div class="swiper-slide completed-projects--slide">
                <div class="completed-projects__slide">
                  <?php if (has_post_thumbnail( $id )) : ?>
                    <div class="completed-projects__slide-img">
                      <?= get_the_post_thumbnail( $id, 'project_archive' ); ?>
                    </div>                    
                  <?php endif; ?>

                  <div class="completed-projects__slide-container">
                    <div class="completed-projects__slide-wrap">
                      <?php if ($icon) : ?>
                        <img class="completed-projects__slide-icon" src="<?= $icon; ?>" alt="<?= $title; ?>">
                      <?php endif; ?>                      

                      <h6 class="completed-projects__slide-title"><?= $title; ?></h6>
                    </div>
                    <p class="completed-projects__slide-text">
                      <?php 
                        $services = get_the_terms( $id, 'services' );
                      ?>
                      <?php if (!empty($services) && !is_wp_error( $services )) : ?>
                        <?php foreach ($services as $service) : ?>
                          <?php 
                            $service_id = $service->term_id;
                            $service_link = get_term_link( $service_id, 'services' ); 
                          ?>
                          <?php if (!is_wp_error( $service_link )) : ?>
                            <a href="<?= $service_link; ?>">
                              <?= end($service) ? $service->name : ($service->name . ','); ?>
                            </a>
                          <?php endif; ?>                                           
                        <?php endforeach; ?>
                      <?php endif; ?>  
                    </p>
                  </div>
                </div>
                <template class="popup__template-header">
                  <?php if (has_post_thumbnail( $id )) : ?>
                    <div class="completed-projects__slide-img">
                      <?= get_the_post_thumbnail( $id, 'large' ); ?>
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
                    <?php 
                      $services = get_the_terms( $id, 'services' );
                    ?>
                    <?php if (!empty($services) && !is_wp_error( $services )) : ?>
                      <?php foreach ($services as $service) : ?>
                        <?php 
                          $service_id = $service->term_id;
                          $service_link = get_term_link( $service_id, 'services' ); 
                        ?>
                        <?php if (!is_wp_error( $service_link )) : ?>
                          <a href="<?= $service_link; ?>">
                            <?= end($service) ? $service->name : ($service->name . ','); ?>
                          </a>
                        <?php endif; ?>                                           
                      <?php endforeach; ?>
                    <?php endif; ?> 
                  </h5>
                  <p class="popup__content-text">
                    <?= $excerpt; ?>
                  </p>
                  <?php if ($link && !is_wp_error( $link )) : ?>
                    <div class="wrapper__btn ">
                      <div class="btn">                        
                        <a href="<?= $link; ?>" class="btn__link popup__btn">
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
                  <?php endif; ?>                 
                </template>
              </div>
            <?php endforeach; ?>        
          </div>
        </div>
      <?php endif; ?>
      
      <?php if ($button && !empty($button)) : ?>
        <button class="completed-projects__btn">
          <?= $button; ?>
        </button>
      <?php endif; ?>

      <div class="popup">
          <div class="popup__header">
            
          </div>
          <div class="popup__content">
              <div class="popup__content-wrap">
                  
              </div>
          </div>
      </div>
      <div class="overlay js-overlay-modal"></div>
    </div>
  </section>
<?php endif; ?>
