<?php 
  $title = get_sub_field( 'title' );
  $content = get_sub_field( 'content' );  
?>

<section class="mission">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h2 class="mission__title"><?= $title; ?></h2>
    <?php endif; ?>
    
    <?php if ($content && !empty($content)) : ?>
      <div class="mission__wrap">
        <?= $content; ?>
      </div>
    <?php endif; ?>
    
    <?php 
      get_template_part( 'template-parts/enercor/mission', 'circles' );
    ?>    
  </div>
</section>