<?php 
  $title = get_sub_field( 'title' );
  $content_top = get_sub_field( 'content_top' );  
  $content_bottom = get_sub_field( 'content_bottom' ); 
  $image = get_sub_field( 'image' );  
?>

<section class="exertise">
  <?php if ($image && !empty($image) && !is_wp_error( $image )) : ?>
    <img src="<?= $image['sizes']['main_bg']; ?>" class="exertise__img" alt="exertise bg img">
  <?php endif; ?>
  
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h3 class="exertise__title"><?= $title; ?></h3>
    <?php endif; ?>
    
    <?php if ($content_top && !empty($content_top)) : ?>
      <div class="exertise__wrap">
        <?= $content_top; ?>
      </div>
    <?php endif; ?>

    <?php if ($content_bottom && !empty($content_bottom)) : ?>
      <div class="exertise__unique">
        <?= $content_bottom; ?>
      </div>
    <?php endif; ?>
  </div>
</section>