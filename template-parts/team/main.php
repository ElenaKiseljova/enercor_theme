<?php 
  $archive_team_page_id = get_field( 'archive_team', 'option' );

  $subtitle = get_field( 'subtitle', $archive_team_page_id );
  $text = get_field( 'text', $archive_team_page_id );
?>

<section class="team-start-screen js-start-screen">
  <div class="team-start-screen__wrapper">
    <h1 class="team-start-screen__headline"><?= get_the_title( $archive_team_page_id ); ?></h1>
    <div class="team-start-screen__block">
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <h2 class="team-start-screen__title start-screen-animate-js">
          <?= $subtitle; ?>
        </h2>
      <?php endif; ?>
      
      <?php if ($text && !empty($text)) : ?>
        <div class="team-start-screen__text start-screen-animate-js">
          <?php 
            $button = get_field( 'button', $archive_team_page_id );

            if ($button && !empty($button['title']) && !empty($button['link'])) : 
              ?>
                <div class="team-start-screen__button wrapper__btn wrapper__btn--black start-screen-animate-js">
                  <div class="btn">
                    <a href="<?= $button['link']; ?>#team" class="btn__link">
                      <p class="btn__text" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $button['title']; ?></p>
                      <div class="btn__arrow btn__arrow--reverse">
                        <svg class="btn__arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                          <path class="arrowLeftanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path class="arrowLeftanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </a>
                  </div>
                </div>
              <?php 
            endif;
          ?>

          <p class="team-start-screen__desc">
            <?= $text; ?>
          </p>          
        </div>
      <?php endif; ?>      
    </div>
  </div>
</section>