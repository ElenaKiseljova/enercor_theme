<?php 
  global $vacancy;

  if ($vacancy && !empty($vacancy) && !is_wp_error( $vacancy )) {
    $title = $vacancy['title'] ?? '';
    $count = (int) $vacancy['count'] ?? 0;
    $content = $vacancy['content'] ?? '';

    if ($count === 0) {
      return;
    }
  }

  $is_publications = is_tax( 'publications-category' );

  $subtitle = get_field( 'subtitle' );  
?>

<div class="vacancies__accordion">
  <div class="vacancies__accordion-top">
      <p class="vacancies__accordion-info"><?= $vacancy ? ('vacancies: ' . $count) : get_the_date( 'd.m.Y' ); ?></p>
      <div class="vacancies__accordion-title <?= $is_publications ? 'vacancies__accordion-title--publication' : ''; ?>">
        <h3 class="vacancies__title <?= $vacancy ? 'vacancies__title--vacancy' : ''; ?>"><?= $vacancy ? $title : get_the_title(); ?></h3>

        <?php if ($subtitle && !empty($subtitle)) : ?>
          <p class="vacancies__subtitle">
            <?= $subtitle; ?>
          </p>
        <?php endif; ?>  
      </div>

      <div class="vacancies__wrapper-btn">
        <span>show more</span>
        <button class="vacancies__btn">
          <svg class="vacancies__btn-arrow" width="14" height="16" fill="none">
              <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#arrow-down"></use>
          </svg>
        </button>
      </div>
  </div>
  <div class="vacancies__accordion-content">
    <?= $vacancy ? $content : get_the_content(  ); ?>

    <div class="vacancies__wrapper-btn vacancies__wrapper-btn--mod">
      <span><?= $vacancy ? 'show' : 'read'; ?> less</span>
      <button class="vacancies__btn">
          <svg class="vacancies__btn-arrow vacancies__btn-arrow--mod" width="14" height="16" fill="none">
              <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#arrow-down"></use>
          </svg>
      </button>
    </div>
  </div>
</div>