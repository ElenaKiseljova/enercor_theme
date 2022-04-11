<?php 
  $position =  get_field( 'position' );

  $cities = get_terms( [
    'taxonomy' => 'cities',
    'hide_empty' => false,
  ] ) ?? [];

  $city_cur = get_the_terms( get_the_ID(  ), 'cities' ) ?? [];

  $excerpt = get_field( 'excerpt' );

  $achievements = get_field( 'achievements' ); 

  $linkedin = get_field( 'linkedin' );    

  $publications = get_field( 'publications' );

  if ($publications && !empty($publications)) {
    $publications_button = $publications['button'];
    $publications_button_text = !empty($publications_button['text']) ? $publications_button['text'] : null;
    $publications_button_link = !empty($publications_button['link']) ? $publications_button['link'] : null;
  }  
?>

<section class="about js-start-screen">
  <div class="about__container">
    <div class="about__description <?= !$excerpt ? 'about__description--no-excerpt' : ''; ?> <?= ($publications_button_text && $publications_button_link) ? 'about__description--publications' : ''; ?>">
      <?php if ($position) : ?>
        <h3 class="about__headline"><?= $position; ?></h3>
      <?php endif; ?>
        
        <h1 class="about__name"><?= get_the_title(  ); ?></h1>

        <ul class="about__list <?= !$excerpt ? 'about__list--no-excerpt' : ''; ?>">
          <?php foreach ($cities as $city) : ?>
            <?php 
              $member = get_field( 'member', $city ) ?? '';  
            ?>
            <li class="about__item <?= in_array($city, $city_cur) ? 'about__item--bold' : ''; ?>">
              <a href="<?= $member; ?>" class="about__city">
                <?= $city->name; ?>
              </a>
            </li>
          <?php endforeach; ?> 
        </ul>
        
        <?php if ($excerpt) : ?>
          <p class="about__text">
            <?= get_the_excerpt(  ); ?>
          </p>
        <?php endif; ?>        

        <div class="about__links">
          <?php if ($linkedin && !empty($linkedin)) : ?>
            <a href="<?= $linkedin; ?>" class="about__linkedin" target="_blank">
              <img src="<?= get_template_directory_uri(  ); ?>/assets/img/linkedin-icon.png" alt="LinkedIN icon">
            </a>
          <?php endif; ?>          

          <?php if ($publications_button_text && $publications_button_link) : ?>
            <div class="btn about__btn">
              <a href="<?= $publications_button_link; ?>" class="btn__link">
                <p class="about__btn-text"><?= $publications_button_text; ?></p>
                <div class="btn__arrow">
                  <svg class="btn__arrow-icon about__arrow" viewBox="0 0 22 22" width="22"
                        height="22" fill="none">
                      <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round"/>
                      <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                            stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round"/>
                  </svg>
                </div>
              </a>
            </div>
          <?php endif; ?>            
        </div>
    </div>

    <?php if ($achievements && !empty($achievements) && !is_wp_error( $achievements )) : ?>
      <ul class="about__numbers">
        <?php foreach ($achievements as $key => $achievement) : ?>
          <li class="about__numbers-item">
            <p class="about__number"><?= $achievement['value']; ?></p>
            <h4 class="about__number-desc"><?= $achievement['title']; ?></h4>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>    

    <?php if (has_post_thumbnail(  )) : ?>
      <div class="about__img">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
    <?php endif; ?>

    <div class="about__back wrapper__btn wrapper__btn--black start-screen-animate-js">
      <div class="btn">
        <a href="<?= get_post_type_archive_link( 'team' ); ?>" class="btn__link">
          <p class="btn__text">Back to Team</p>
          <div class="btn__arrow btn__arrow--reverse">
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
  </div>
</section>