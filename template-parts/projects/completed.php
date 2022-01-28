<?php 
  $completed = get_field( 'completed', 'option' );
?>
<?php if ($completed && !is_wp_error( $completed )) : ?>
  <?php 
    $title = $completed['title'];
    $subtitle = $completed['subtitle']; 
  ?>
  <section class="completed-projects">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h3 class="completed-projects__title title"><?= $title; ?></h3>
      <?php endif; ?>
      
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <h4 class="completed-projects__subtitle"><?= $subtitle; ?></h4>
      <?php endif; ?>
      
      <?php enercor_projects_list_html(); ?>         

      <div class="popup">
          <div class="popup__header">
            
          </div>
          <div class="popup__content">
              <div class="popup__content-wrap">
                  
              </div>
          </div>
      </div>
      <div class="overlay js-overlay-modal"></div>
    </div>
  </section>
<?php endif; ?>
