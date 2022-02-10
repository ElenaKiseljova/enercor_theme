<?php 
  $schedule = get_field( 'schedule' );
?>
<?php if ($schedule && !empty($schedule) && !is_wp_error( $schedule )) : ?>
  <?php 
    $toggle_visibility = $schedule['toggle_visibility'];  

    $schedule_list = $schedule['list'];  
  ?>
  <?php if ($toggle_visibility && $schedule_list && !empty($schedule_list)) : ?>
    <section class="month">
      <div class="container">
        <div class="month__wrapper">
          <?php foreach ($schedule_list as $key => $item) : ?>
            <?php 
              $title = $item['title'];  
              $indigo = $item['indigo'];  

              $content = $item['content'];  
            ?>
            <div class="month__wrap">
              <p class="month__title <?= $indigo ? 'month__title--active' : ''; ?>">
                <?= $title; ?>
              </p>
              <div class="month__list-wrapper">
                <?= $content; ?>
              </div>
            </div>
          <?php endforeach; ?>        
        </div>
      </div>
    </section>
  <?php endif; ?>  
<?php endif; ?>
