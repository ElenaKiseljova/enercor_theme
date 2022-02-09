<?php 
  $biography = get_field( 'biography' );
?>
<?php if ($biography && !empty($biography)) : ?>
  <section class="biography">
    <div class="biography__wrapper">
      <h3 class="biography__headline"><?= $biography; ?></h3>
      
      <div class="biography__content">
        <?= get_the_content(  ); ?>
      </div>       
    </div>
  </section>
<?php endif; ?>
