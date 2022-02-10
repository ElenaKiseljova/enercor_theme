<?php 
  $results = get_field( 'results' );
?>
<?php if ($results && !is_wp_error( $results )) : ?>
  <?php 
    $toggle_visibility = $results['toggle_visibility'];  

    $list = $results['list'];  
    $locations = $results['locations'];

    $subtext = $results['subtext'];
  ?>
  <?php if ($toggle_visibility) : ?>
    <section class="provider">
      <div class="container">
        <div class="provider__price">
          <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
            <?php foreach ($list as $key => $item) : ?>
              <div class="provider__price-wrap">
                <span class="provider__price-number"><?= $item['value']; ?></span>
                <p class="provider__price-title"><?= $item['title']; ?></p>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="provider__content">
          <div class="provider__content-text">
            <?= get_the_content(  ); ?>
          </div>

          <?php if ($locations && !empty($locations)) : ?>
            <h3 class="provider__content-location">
              <?= $locations; ?>
            </h3>
          <?php endif; ?>
          

          <?php if ($subtext && !empty($subtext)) : ?>
            <p class="provider__content-info">
              <?= $subtext; ?>
            </p>
          <?php endif; ?>
          
        </div>
      </div>
    </section>
  <?php endif; ?>
  
<?php endif; ?>