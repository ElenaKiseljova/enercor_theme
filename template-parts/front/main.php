<?php 
  $main = get_field( 'main' );
?>
<?php if ($main && !is_wp_error( $main )) : ?>
  <?php 
    $image = $main['image'];
    $color = $main['color'];
    $text_over = $main['text_over'];
    $title = $main['title'];
    $button = $main['button'];
    $text_bg = $main['text_bg'];
  ?>
  
  <section class="start-screen js-start-screen ">
    <?php if ($image && !empty($image)) : ?>
      <img class="start-screen__img" src="<?= $image['sizes']['front_main_bg']; ?>" alt="<?= bloginfo( 'name' ); ?>">
    <?php endif; ?>
    
    <div class="container">
      <?php if ($text_over && !empty($text_over)) : ?>
        <p class="start-screen__text text" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $text_over; ?></p>
      <?php endif; ?>
        
      <?php if ($title && !empty($title)) : ?>
        <h1 class="start-screen__title" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $title; ?></h1>
      <?php endif; ?>        

      <div class="start-screen__wrap">
        <?php if ($button && !empty($button['title']) && !empty($button['link'])) : ?>
          <div class="wrapper__btn">
              <div class="btn">
                  <a href="<?= $button['link']; ?>" class="btn__link">
                      <p class="btn__text start-screen__btn-text" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $button['title']; ?></p>
                      <div class="btn__arrow start-screen__btn-arrow">
                          <svg class="btn__arrow-icon start-screen__btn-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                              <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                              <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                          </svg>
                      </div>
                  </a>
              </div>
          </div>
        <?php endif; ?>
          
        <?php if ($text_bg) : ?>
          <div class="start-screen__decor">
            <?php if (!empty($text_bg['1'])) : ?>
              <p class="start-screen__decor-text"><?= $text_bg['1']; ?></p>
            <?php endif; ?>
            <?php if (!empty($text_bg['2'])) : ?>
              <p class="start-screen__decor-text"><?= $text_bg['2']; ?></p>
            <?php endif; ?>
            <?php if (!empty($text_bg['3'])) : ?>
              <p class="start-screen__decor-text"><?= $text_bg['3']; ?></p>
            <?php endif; ?>              
          </div>
        <?php endif; ?>          
      </div>
    </div>
  </section>
<?php endif; ?>