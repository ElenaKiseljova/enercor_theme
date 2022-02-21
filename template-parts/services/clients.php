<?php 
  $title = get_sub_field( 'title' );
  $circles = get_sub_field( 'circles' );  
  $quote = get_sub_field( 'quote' ); 
  $content = get_sub_field( 'content' );  
?>
<section class="clients" id="clients">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h2 class="clients__title"><?= $title; ?></h2>
    <?php endif; ?>    

    <?php if ($circles && !empty($circles)) : ?>
      <ul class="clients__circle">
        <?php foreach ($circles as $key => $circle) : ?>
          <li class="clients__circle-item">
            <?= $circle['text']; ?>
          </li>
        <?php endforeach; ?>      
      </ul>
    <?php endif; ?>
    
    <?php if ($quote['text'] && !empty($quote['text']) && $quote['author'] && !empty($quote['author'])) : ?>
      <div class="clients__wrap">
        <div class="clients__wrap-text">
          <q><?= $quote['text']; ?></q>
          <p><?= $quote['author']; ?></p>
        </div>
      </div>
    <?php endif; ?>
    
    <?php if ($content && !empty($content)) : ?>
      <div class="clients__wide-range">
        <?= $content; ?>
      </div>
    <?php endif; ?>    
  </div>
</section>