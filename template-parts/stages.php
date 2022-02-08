<?php
  $is_project = is_singular( 'projects' ) ?? false;

  if ( is_post_type_archive( 'projects' ) ) {
    $archive_projects_page_id = get_field( 'archive_projects', 'option' ); 
  
    $stages = get_field( 'stages', $archive_projects_page_id );
  } else if ( $is_project ) {
    $stages = get_field( 'stages' );
  }   
?>
<?php if ($stages && !is_wp_error( $stages )) : ?>
  <?php 
    $title = $stages['title'];
    $circles = $stages['circles'];
  ?>

  <section class="stages <?= $is_project ? 'stages__project-page' : ''; ?>">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h3 class="stages__title title"><?= $title; ?></h3>
      <?php endif; ?>
      
      <?php if ($circles && !empty($circles) && !is_wp_error( $circles )) : ?>
        <ol class="stages__circle <?= $is_project ? 'stages__circle-project-page' : ''; ?>">
          <?php foreach ($circles as $key => $circle) : ?>
            <?php               
              switch ($key) {
                case '1':
                  $number = 'II';
                  break;
                case '2':
                  $number = 'III';
                  break;

                case '3':
                  $number = 'IV';
                  break;
                
                default:
                  $number = 'I';

                  break;
              }
              $title = $circle['title'];
              $subtitle = $circle['subtitle'];
              $period = $circle['period'];

              $background_text = $circle['background_text'];
            ?>

            <li class="stages__circle-item <?= $is_project ? 'stages__circle-project-page-item' : ''; ?> stages__circle-item--animate-1" 
                data-text="<?= $background_text; ?>">
              <?php if ($title && !empty($title)) : ?>
                <p class="stages__circle-item-title <?= $is_project ? 'stages__circle-project-page-item-title' : ''; ?>">
                  <?php if (!$is_project) : ?>
                    <span class="stages__circle-item-number">
                      <?= $number; ?>
                    </span>
                  <?php endif; ?>
                  
                  <?= $title; ?>
                </p>
              <?php endif; ?>
              
              <?php if (!empty($subtitle)) : ?>
                <p class="stages__circle-item-text <?= $is_project ? 'stages__circle-project-page-item-text' : ''; ?>">
                  <?= $subtitle; ?> 
                </p>
              <?php endif; ?>
              
              <?php if (!empty($period)) : ?>
                <p class="stages__circle-item-months">
                  <?= $period; ?>
                </p>
              <?php endif; ?>            
            </li>
          <?php endforeach; ?>          
        </ol>
      <?php endif; ?>      
    </div>
  </section>
<?php endif; ?>
