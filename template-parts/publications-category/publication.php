<?php 
  global $vacancy;

  if ($vacancy && !empty($vacancy) && !is_wp_error( $vacancy )) {
    $title = $vacancy['title'] ?? '';
    $count = $vacancy['count'] ?? 1;
    $content = $vacancy['content'] ?? '';
  }

  $is_vacancies = is_page_template( 'page-vacancies.php' );  

  $subtitle = get_field( 'subtitle' );

  
?>
<div class="publication-info__accordion">
  <div class="publication-info__panel <?= $is_vacancies ? 'publication-info__panel--vacancies' : ''; ?>">
    <p class="publication-info__date <?= $is_vacancies ? 'publication-info__date--vacancies' : ''; ?>"><?= $vacancy ? ('vacancies: ' . $count) : get_the_date( 'd.m.Y' ); ?></p>
    <div class="publication-info__name <?= $is_vacancies ? 'publication-info__name--vacancies' : ''; ?>">
      <h2 class="publication-info__title <?= $is_vacancies ? 'publication-info__title--vacancies' : ''; ?>">
        <?= $vacancy ? $title : get_the_title(); ?>
      </h2>
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <p class="publication-info__description">
          <?= $subtitle; ?>
        </p>
      <?php endif; ?>                    
    </div>
  </div>
  <div class="publication-info__text-block">
    <div class="publication-info__text <?= $is_vacancies ? 'publication-info__text--vacancies' : ''; ?>">
      <?= $vacancy ? $content : get_the_content(  ); ?>
    </div>
  </div>
  <button class="publication-info__btn <?= $is_vacancies ? 'publication-info__btn--vacancies' : ''; ?>">
    <span class="publication-info__btn-text">read more</span>
    <div class="publication-info__btn-icon">
        <svg class="publication-info__btn-arrow" width="14" height="16" fill="none">
          <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#arrow-down"></use>
        </svg>
    </div>
  </button>
</div>