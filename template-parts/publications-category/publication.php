<?php 
  $subtitle = get_field( 'subtitle' );
?>
<div class="publication-info__accordion">
  <div class="publication-info__panel">
    <p class="publication-info__date"><?= get_the_date( 'd.m.Y' ); ?></p>
    <div class="publication-info__name">
      <h2 class="publication-info__title">
        <?= get_the_title(); ?>
      </h2>
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <p class="publication-info__description">
          <?= $subtitle; ?>
        </p>
      <?php endif; ?>                    
    </div>
  </div>
  <div class="publication-info__text-block">
    <div class="publication-info__text">
      <?= get_the_content(  ); ?>
    </div>
  </div>
  <button class="publication-info__btn">
    <span class="publication-info__btn-text">read more</span>
    <div class="publication-info__btn-icon">
        <svg class="publication-info__btn-arrow" width="14" height="16" fill="none">
          <use xlink:href="<?= get_template_directory_uri(  ); ?>/assets/img/sprite.svg#arrow-down"></use>
        </svg>
    </div>
  </button>
</div>