<?php 
  if ( is_archive(  ) ) {
    $archive_projects_page_id = get_field( 'archive_projects', 'option' );

    $completed = get_field( 'completed', $archive_projects_page_id );
  } else {
    $completed = get_field( 'completed' );
  }  
?>
<?php if ($completed && !is_wp_error( $completed )) : ?>
  <?php 
    $title = $completed['title'];
    $subtitle = $completed['subtitle']; 
  ?>
  <section class="completed-projects" id="completed">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h3 class="completed-projects__title title"><?= $title; ?></h3>
      <?php endif; ?>
      
      <?php if ($subtitle && !empty($subtitle)) : ?>
        <h4 class="completed-projects__subtitle"><?= $subtitle; ?></h4>
      <?php endif; ?>
      
      <?php 
        if ( is_archive(  ) ) {
          enercor_projects_list_html( -1, 6, 1 );
        } else {
          enercor_projects_list_html( -1, 999999, 1, 6 );
        }
      ?>         

      <div class="popup">
        <button class="popup__close"></button>
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
