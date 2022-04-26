<?php 
  $form = get_field( 'form' );

  $current_city = isset($_GET['city']) ? $_GET['city'] : null;
?>
<?php if ($form && !is_wp_error( $form )) : ?>
  <?php 
    $title = $form['title'];
  ?>
  <?php if ($title && !empty($title)) : ?>
    <h3 class="contact__questions"><?= $title; ?></h3>
  <?php endif; ?>

  <div class="contact__wrapper">
    <?php 
      $form_shortcode = '';

      switch ($current_city) {
        case 'LONDON':
          $form_shortcode = '[contact-form-7 id="204" title="Contacts page - London"]';

          break;

        case 'MADRID':
          $form_shortcode = '[contact-form-7 id="1064" title="Contacts page - Madrid"]';

          break;

        case 'ALMATY':
          $form_shortcode = '[contact-form-7 id="1065" title="Contacts page - Almaty"]';

          break;

        case 'HONG KONG':
          $form_shortcode = '[contact-form-7 id="1066" title="Contacts page - Hong Kong"]';

          break;
        
        default:
          $form_shortcode = '[contact-form-7 id="204" title="Contacts page - London"]';

          break;
      }

      echo do_shortcode( $form_shortcode );
    ?>

    <?php
      get_template_part( 'template-parts/social' );
    ?>
  </div>
<?php endif; ?>

