<?php 
  $services_page_url = get_permalink( get_page_by_title( 'Services' ) ) ?? get_permalink( get_page_by_path( 'services' ) );

  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  $projects = get_sub_field('projects');
  $button = get_sub_field('button');
?>
  <section class="selected">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="selected__title title"><?= $title; ?></h2>
      <?php endif; ?>

      <?php if (!empty($subtitle)) : ?>
        <p class="selected__info"><?= $subtitle; ?></p>
      <?php endif; ?>
      
      <?php if ($projects && !empty($projects) && !is_wp_error( $projects )) : ?>
        <div class="swiper swiper-main selected__wrapper">
          <div class="swiper-wrapper ">
            <?php foreach ($projects as $project) : ?>
              <?php 
                $title = $project->post_title;
                $id = $project->ID;
                $link = get_permalink( $id );  
                $subtitle = get_field( 'subtitle', $id );
                $excerpt = $project->post_excerpt;

                $main = get_field( 'main', $id );
                
                if ($main && !is_wp_error( $main )) {
                  $image = $main['image'];
                }
              ?>
              <div class="swiper-slide selected__card">
                <a href="<?= $link; ?>" class="selected__card-link">
                  <div class="selected__card-wrap">
                    <div class="selected__card-img">
                      <?php if ($image) : ?>
                        <img src="<?= $image['sizes']['project_archive']; ?>" alt="<?= strip_tags( $title ); ?>">
                      <?php endif; ?>
                    </div>

                      <div class="selected__card-wrap-title">
                        <h4 class="selected__card-title">
                          <?= $title; ?>
                        </h4>
                        <?php if ($subtitle && !empty($subtitle)) : ?>
                          <p class="selected__card-subtitle">
                            <?= $subtitle; ?>
                          </p>
                        <?php endif; ?>                        
                      </div>
                  </div>
                  <div class="selected__card-text"> 
                    <?= $excerpt; ?>
                  </div>
                </a>


                <ul class="selected__card-info">
                  <?php 
                    $services = get_the_terms( $id, 'services' );
                  ?>
                  <?php if (!empty($services) && !is_wp_error( $services )) : ?>
                    <?php foreach ($services as $service) : ?>
                      <?php 
                        $service_id = $service->term_id;
                        $service_link = $services_page_url; //get_term_link( $service_id, 'services' ); 
                      ?>
                      <?php if (!is_wp_error( $service_link )) : ?>
                        <li class="selected__card-info-item">
                          <a href="<?= $service_link; ?>" class="selected__card-info-link">
                            <?= (end($services) === $service)  ? $service->name : ($service->name . ','); ?>
                          </a>
                        </li> 
                      <?php endif; ?>                                           
                    <?php endforeach; ?>
                  <?php endif; ?>                  
                </ul>
              </div>
            <?php endforeach; ?>            
          </div>
        </div>        
      <?php endif; ?>
      

      <?php if (!empty($button['title']) && !empty($button['link'])) : ?>
        <div class="selected__wrapper-btn">
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
    </div>
  </section>
