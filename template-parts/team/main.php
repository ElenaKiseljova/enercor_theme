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
        <p class="team-start-screen__text start-screen-animate-js">
          <?= $text; ?>
        </p>
      <?php endif; ?>      
    </div>
  </div>
</section>