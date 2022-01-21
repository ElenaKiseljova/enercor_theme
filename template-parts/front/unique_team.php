<?php 
  $unique_team = get_field( 'unique_team' );
?>
<?php if ($unique_team && !is_wp_error( $unique_team )) : ?>
  <?php 
    $title = $unique_team['title'];
    $content = $unique_team['content'];
  ?>
  <section class="team" id="team">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="team__title title"><?= $title; ?></h2>
      <?php endif; ?>
      
      <?php if (!empty($content)) : ?>
        <div class="team__wrap">
          <?= $content; ?>
        </div>
      <?php endif; ?>
    </div>
</section>
<?php endif; ?>
