<?php 
  /*
    Template Name: Team Member
  */
?>

<?php 
  get_header(  );
?>

<?php 
  $position =  get_field( 'position' );

  $cities = get_terms( [
    'taxonomy' => 'cities',
    'hide_empty' => false,
  ] ) ?? [];

  $city_cur = get_the_terms( get_the_ID(  ), 'cities' ) ?? [];

  $expertise_list = get_the_terms( get_the_ID(  ), 'expertise' ) ?? [];
?>

<main class="main main--team">
  <section class="about js-start-screen">
    <div class="about__container">
        <div class="about__description">
          <?php if ($position) : ?>
            <h3 class="about__headline"><?= $position; ?></h3>
          <?php endif; ?>
            
            <h1 class="about__name"><?= get_the_title(  ); ?></h1>

            <ul class="about__list">
              <?php foreach ($cities as $city) : ?>
                <li class="about__item <?= in_array($city, $city_cur) ? 'about__item--bold' : ''; ?>"><?= $city->name; ?></li>
              <?php endforeach; ?> 
            </ul>

            <p class="about__text">
              <?= get_the_excerpt(  ); ?>
            </p>

            <div class="about__links">
                <a href="#" class="about__linkedin">
                  <img src="<?= get_template_directory_uri(  ); ?>/assets/img/linkedin-icon.png" alt="LinkedIN icon">
                </a>

                <div class="btn about__btn">
                  <a href="#" class="btn__link">
                    <p class="about__btn-text">go to publications</p>
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
            </div>
        </div>
        <ul class="about__numbers">
            <li class="about__numbers-item">
                <h4 class="about__number">30</h4>
                <p class="about__number-desc">Years of Experience</p>
            </li>
            <li class="about__numbers-item">
                <h4 class="about__number">30+</h4>
                <p class="about__number-desc">Publications</p>
            </li>
            <li class="about__numbers-item">
                <h4 class="about__number">40</h4>
                <p class="about__number-desc">Closed projects</p>
            </li>
        </ul>

        <?php if (has_post_thumbnail(  )) : ?>
          <div class="about__img">
            <?= get_the_post_thumbnail(  ); ?>
          </div>
        <?php endif; ?>
    </div>
  </section>

  <section class="expertise">
    <div class="expertise__wrapper">
      <h3 class="expertise__headline">expertise</h3>

      <?php if (!empty($expertise_list)) : ?>
        <ul class="expertise__list">
          <?php foreach ($expertise_list as $key => $item) : ?>
            <?php 
              $icon = get_field( 'icon', $item );
            ?>
            <li class="expertise__item">
              <?php if ($icon) : ?>
                <img class="expertise__icon" src="<?= $icon; ?>" alt="<?= strip_tags( $item->name ); ?>">
              <?php endif; ?>
              
              <span class="expertise__text">
                <?= str_replace('\n', '<br>', $item->name); ?>
              </span>
            </li>
          <?php endforeach; ?>                                  
        </ul>
      <?php endif; ?>
    </div>
  </section>

  <section class="biography">
    <div class="biography__wrapper">
      <h3 class="biography__headline">biography</h3>
      
      <div class="biography__content">
        <?= get_the_content(  ); ?>
      </div>       
    </div>
  </section>

  <section class="publications">
    <div class="publications__wrapper">
        <h3 class="publications__headline">publications</h3>
        <ul class="publications__gallery">
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-vedomosti.png" alt="vedomosti logo">
                    <h3 class="publications__text">read 2 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-kommersant.png" alt="kommersant logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-forbes.png" alt="forbes logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-slon.png" alt="slon logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-slon.png" alt="slon logo">
                    <h3 class="publications__text">read 2 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-executive.png" alt="executive logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-finam.png" alt="finam logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
            <li class="publications__item">
                <a href="#" class="publications__link">
                    <img src="<?= get_template_directory_uri(  ); ?>/assets/img/publications-logo-kompaniya.png" alt="kompaniya logo">
                    <h3 class="publications__text">read 10 publications</h3>
                </a>
            </li>
        </ul>
    </div>
  </section>
</main>

<?php 
  get_footer(  );
?>