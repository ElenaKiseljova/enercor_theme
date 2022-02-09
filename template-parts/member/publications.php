<?php 
  $publications = get_field( 'publications' );

  if ($publications) {
    $publications_title = $publications['title'];
  }
?>
<?php if ($publications_title && !empty($publications_title)) : ?>
  <section class="publications" id="publications">
    <div class="publications__wrapper">
      <h3 class="publications__headline"><?= $publications_title; ?></h3>


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
<?php endif; ?>