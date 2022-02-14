<?php 
  $image = get_sub_field( 'image' );
  $content_top = get_sub_field( 'content_top' );  
  $content_bottom = get_sub_field( 'content_bottom' ); 
?>

<section class="exertise exertise--history">
  <div class="container">
    <?php if ($image && !empty($image) && !is_wp_error( $image )) : ?>
      <img src="<?= $image['sizes']['main_bg']; ?>" class="history__img" alt="history bg section">
    <?php endif; ?>
    
    <?php if ($content_top && !empty($content_top)) : ?>
      <div class="exertise__wrap history__wrap">
        <?= $content_top; ?>
      </div>
    <?php endif; ?>

    <?php if ($content_bottom && !empty($content_bottom)) : ?>
      <div class="exertise__unique history__develop">
        <?= $content_bottom; ?>
      </div>      
    <?php endif; ?>    
  </div>
</section>