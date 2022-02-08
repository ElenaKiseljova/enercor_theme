<?php 
  $form = get_field( 'form' );
?>
<?php if ($form && !is_wp_error( $form )) : ?>
  <?php 
    $title = $form['title'];
  ?>
  <?php if ($title && !empty($title)) : ?>
    <h3 class="contact__questions"><?= $title; ?></h3>
  <?php endif; ?>

  <div class="contact__wrapper">
    <?= do_shortcode( '[contact-form-7 id="204" title="Contacts page"]' ); ?>

    <?php
      get_template_part( 'template-parts/social' );
    ?>
  </div>
<?php endif; ?>

