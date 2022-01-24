<?php 
  $stages = get_field( 'stages', 'option' );
?>
<?php if ($stages && !is_wp_error( $stages )) : ?>
  <?php 
    $title = $stages['title'];
    $circles = $stages['circles'];
  ?>

  <section class="stages">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h3 class="stages__title title"><?= $title; ?></h3>
      <?php endif; ?>
      
      <?php if ($circles && !empty($circles) && !is_wp_error( $circles )) : ?>
        <ol class="stages__circle">
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
            ?>

            <li class="stages__circle-item stages__circle-item--animate-1">
              <p class="stages__circle-item-title">
                <span class="stages__circle-item-number">
                  <?= $number; ?>
                </span>
                <?= $title; ?>
              </p>
              <?php if (!empty($subtitle)) : ?>
                <p class="stages__circle-item-text">
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
