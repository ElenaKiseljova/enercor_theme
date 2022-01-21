<?php 
  $projects = get_field( 'projects' );
?>
<?php if ($projects && !is_wp_error( $projects )) : ?>
  <?php 
    $image = $projects['image'];
    $color = $projects['color'];
    
    $title = $projects['title'];
    $subtitle = $projects['subtitle'];
    $text = $projects['text'];

    $button_all = $projects['button_all'];
    $button_ex = $projects['button_ex'];
  ?>

  <section class="projects" id="projects" 
    style="background: url('<?= $image['sizes']['front_projects_bg']; ?>') top/cover no-repeat;<?= $color ? ('color: ' . $color . ';') : ''; ?>">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="projects__title title" <?= $color ? ('style="color: ' . $color . ';"') : ''; ?>><?= $title; ?></h2>
      <?php endif; ?>      
      
      <?php if (!empty($subtitle)) : ?>
        <p class="projects__text" <?= $color ? ('style="color: ' . $color . ';"') : ''; ?>>
          <?= $subtitle; ?>
        </p>
      <?php endif; ?>
      
      <div class="projects__wrap">
        <?php if (!empty($text)) : ?>
          <p class="projects__about" <?= $color ? ('style="color: ' . $color . ';"') : ''; ?>>
            <?= $text; ?>
          </p>
        <?php endif; ?>          
      </div>

      <div class="projects__wrap-btn">

          <div class="wrapper__btn ">
              <div class="btn">
                <?php if (!empty($button_all['title']) && !empty($button_all['link'])) : ?>
                  <a href="<?= $button_all['link']; ?>  " class="btn__link projects__btn-link">
                      <div class="btn__arrow projects__btn-arrow">
                          <svg class="btn__arrow-icon projects__btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22"
                                fill="none">
                              <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                              <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                          </svg>
                      </div>
                      <p class="btn__text projects__btn-text" <?= $color ? ('style="color: ' . $color . ';"') : ''; ?>>
                        <?= $button_all['title']; ?>                        
                      </p>
                  </a>
                <?php endif; ?>
                 
                <?php if (!empty($button_ex['title']) && !empty($button_ex['link'])) : ?>
                  <a href="<?= $button_ex['link']; ?>  " class="btn__link projects__btn-link">
                      <div class="btn__arrow projects__btn-arrow">
                          <svg class="btn__arrow-icon projects__btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22"
                                fill="none">
                              <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                              <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                          </svg>
                      </div>
                      <p class="btn__text projects__btn-text" <?= $color ? ('style="color: ' . $color . ';"') : ''; ?>>
                        <?= $button_ex['title']; ?>  
                      </p>
                  </a>
                <?php endif; ?>                  
              </div>
          </div>
      </div>
    </div>
  </section>
<?php endif; ?>
