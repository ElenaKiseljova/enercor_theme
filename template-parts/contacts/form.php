<?php 
  $form = get_field( 'form' );

  $address = get_field( 'address' ) ?? [];

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

    <div class="contact__follow">
      <div class="contact__address">
        <?php if ($address && !empty($address) && is_array($address) && !is_wp_error( $address )) : ?>
          <?php foreach ($address as $key => $row) : ?>
            <p><?= $row['text'] ?? ''; ?></p>
          <?php endforeach; ?>
        <?php endif; ?> 
      </div>
      <div class="contact__social">
        <?php
          get_template_part( 'template-parts/social' );
        ?>
      </div> 
    </div>       
  </div>
<?php endif; ?>

