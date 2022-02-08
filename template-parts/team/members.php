<?php 
  $archive_team_page_id = get_field( 'archive_team', 'option' );

  $biography = get_field( 'biography', $archive_team_page_id );
  $expertise = get_field( 'expertise', $archive_team_page_id );
?>

<?php
  if ( have_posts() ){
    ?>
      <section class="team-workers">
        <div class="team-workers__wrapper">
            <div class="swiper swiper-team team-workers__slider">
                <div class="swiper-wrapper team-workers__slider-wrapper">
                  <?php 
                    while ( have_posts() ){
                      the_post();
                      
                      ?>
                        <div class="swiper-slide team-workers__slide">
                          <a href="<?= get_permalink(  ); ?>" class="team-workers__slide-info">
                            <?php 
                              $position =  get_field( 'position' );
                            ?>
                            <?php if ($position) : ?>
                              <p class="team-workers__position"><?= $position; ?></p>
                            <?php endif; ?>
                              
                            <p class="team-workers__name"><?= get_the_title(  ); ?></p>
                          </a>
                          <ul class="team-workers__list-cities">
                            <?php 
                              $cities = get_terms( [
                                'taxonomy' => 'cities',
                                'hide_empty' => false,
                              ] ) ?? [];

                              $city_cur = get_the_terms( get_the_ID(  ), 'cities' ) ?? [];
                            ?>
                            <?php foreach ($cities as $city) : ?>
                              <li class="team-workers__item-city <?= in_array($city, $city_cur) ? 'team-workers__item-city--bold' : ''; ?>"><?= $city->name; ?></li>
                            <?php endforeach; ?>  
                          </ul>

                          <?php 
                            $archive_photo = get_field( 'archive_photo' );
                          ?>
                          <?php if ($archive_photo && !is_wp_error( ( $archive_photo ) )) : ?>
                            <img class="team-workers__img" src="<?= $archive_photo['sizes']['archive_member_photo']; ?>" alt="<?= strip_tags(get_the_title(  )); ?>">                           
                          <?php endif; ?>                                                    
                        </div>
                      <?php
                    }
                  ?>                    

                </div>
            </div>

            <div class="swiper swiper-team-desc team-workers__slider-desc">
                <div class="swiper-wrapper team-workers__slider-desc-wrapper">
                <?php 
                    while ( have_posts() ){
                      the_post();
                      
                      ?>
                        <div class="swiper-slide team-workers__slide-desc">
                          <div class="team-workers__text-block">
                            <?php if ($biography && !empty($biography)) : ?>
                              <div class="team-workers__biography">
                                <h3 class="team-workers__headline"><?= $biography; ?></h3>
                                <div class="team-workers__description">
                                  <?php the_excerpt(  ); ?>
                                </div>
                              </div>
                            <?php endif; ?>

                            <?php if ($expertise && !empty($expertise)) : ?>
                              <div class="team-workers__expertise">
                                <h3 class="team-workers__headline"><?= $expertise ; ?></h3>

                                <?php 
                                  $expertise_list = get_the_terms( get_the_ID(  ), 'expertise' ) ?? [];
                                ?>
                                <?php if (!empty($expertise_list)) : ?>
                                  <ul class="team-workers__list">
                                    <?php foreach ($expertise_list as $key => $item) : ?>
                                      <?php 
                                        $icon = get_field( 'icon', $item );
                                      ?>
                                      <li class="team-workers__item">
                                        <?php if ($icon) : ?>
                                          <img class="team-workers__icon" src="<?= $icon; ?>" alt="<?= strip_tags( $item->name ); ?>">
                                        <?php endif; ?>
                                        
                                        <span class="team-workers__text">
                                          <?= str_replace('\n', '<br>', $item->name); ?>
                                        </span>
                                      </li>
                                    <?php endforeach; ?>                                  
                                  </ul>
                                <?php endif; ?>
                                
                              </div>
                            <?php endif; ?>                              
                          </div>
                        </div>
                      <?php
                    }
                  ?>                     

                </div>

                <div class="swiper-button-prev team-workers__btn-left">
                  <svg class="team-workers__btn-arrow team-workers__btn-arrow--left" viewBox="0 0 22 22" width="22" height="22" fill="none">
                    <path d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="swiper-button-next team-workers__btn-right">
                  <svg class="team-workers__btn-arrow" viewBox="0 0 22 22" width="22" height="22" fill="none">
                    <path d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
            </div>
        </div>
      </section>
    <?php    
  } else {
    echo wpautop( 'Meambers of team not found.' );
  }
?>

