<?php 
  $image = get_sub_field( 'image' );
  $content_top = get_sub_field( 'content_top' );  
  $content_bottom = get_sub_field( 'content_bottom' ); 
  $button = get_sub_field( 'button' ); 
?>

<section class="experience">
  <div class="container">
    <?php if ($image && !empty($image) && !is_wp_error( $image )) : ?>
      <img src="<?= $image['sizes']['main_bg']; ?>" class="experience__img" alt="enercor bg section">
    <?php endif; ?>

    <?php if ($content_top && !empty($content_top)) : ?>
      <div class="experience__wrap">
        <?= $content_top; ?>
      </div>
    <?php endif; ?>
    
    <div class="experience__services">
      <?php if ($content_bottom && !empty($content_bottom)) : ?>
        <?= $content_bottom; ?>
      <?php endif; ?>
      
      <?php if ($button && !empty($button)) : ?>
        <?php if ($button['title'] && !empty($button['title']) && $button['link'] && !empty($button['link'])) : ?>
          <div class="wrapper__btn ">
            <div class="btn">
              <a href="<?= $button['link']; ?>" class="btn__link experience__btn-link">
                <p class="btn__text experience__btn-text"><?= $button['title']; ?></p>
                <div class="btn__arrow experience__btn-arrow">
                  <svg class="btn__arrow-icon experience__btn-arrow-icon" viewBox="0 0 22 22" width="22"
                        height="22"
                        fill="none">
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
        <?php endif; ?>        
      <?php endif; ?>      
    </div>
  </div>
</section>