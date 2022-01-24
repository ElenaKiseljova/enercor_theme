<?php 
  $main = get_field( 'main' );
?>
<?php if ($main && !is_wp_error( $main )) : ?>
  <?php 
    $image = $main['image'];
    $color = $main['color'];
    
    $title = $main['title'];
    $button = $main['button'];
  ?>
  <section class="start-screen__contacts js-start-screen">
    <?php if ($image && !empty($image)) : ?>
      <img class="start-screen__contacts-img" src="<?= $image['sizes']['main_bg_half']; ?>" alt="<?= bloginfo( 'name' ); ?>">
    <?php endif; ?>

    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h1 class="start-screen__contacts-title" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $title; ?></h1>
      <?php endif; ?>  
      
      <?php if ($button && !empty($button['title']) && !empty($button['link'])) : ?>
        <div class="wrapper__btn start-screen__contacts-btn">
          <div class="btn">
            <a href="<?= $button['link']; ?>" class="btn__link">
              <p class="btn__text start-screen__contacts-btn-text" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $button['title']; ?></p>
              <div class="btn__arrow start-screen__contacts-btn-arrow">
                <svg class="btn__arrow-icon start-screen__contacts-btn-arrow-icon" viewBox="0 0 22 22"
                      width="22" height="22"
                      fill="none">
                    <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/sprite.svg#arrowRight"></use>
                </svg>
              </div>
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
