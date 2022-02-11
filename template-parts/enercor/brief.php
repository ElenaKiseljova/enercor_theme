
<?php 
  $title = get_sub_field( 'title' );
  $subtitle = get_sub_field( 'subtitle' );  
  $list = get_sub_field( 'list' ); 
?>

<section class="brief">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h2 class="brief__title"><?= $title; ?></h2>
    <?php endif; ?>
    
    <?php if ($subtitle && !empty($subtitle)) : ?>
      <div class="brief__wrap">
        <?= $subtitle; ?>
      </div>
    <?php endif; ?>
    
    <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
      <div class="brief__wrapper">
        <?php foreach ($list as $item) : ?>
          <div class="brief__info">
            <?= $item['text']; ?>
          </div>
        <?php endforeach; ?>      
      </div>
    <?php endif; ?>    
  </div>
</section>