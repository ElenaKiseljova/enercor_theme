<?php 
  $corporate = get_sub_field( 'corporate' );

  $title = get_sub_field( 'title' ) ?? '';
  $main = get_sub_field( 'main' );  

  $including = get_sub_field( 'including' );  
?>
<section class="corporate">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h2 class="corporate__title"><?= $title; ?></h2>
    <?php endif; ?>  
    
    <?php if ($main && !empty($main) && !is_wp_error( $main )) : ?>
      <?php 
        $taxonomy = $main->taxonomy ?? '';

        $term_name = $main->name ?? '';
        $term_id = $main->term_id; 

        $link = get_term_link( $term_id, $taxonomy );              

        $short_desc = get_field( 'short_desc', $main );
      ?>

      <div class="corporate__wrap">
        <h4><?= $term_name; ?></h4>

        <?php if ($short_desc && !empty($short_desc) && !is_wp_error( $short_desc )) : ?>
          <p>
            <?= $short_desc; ?>
          </p>
        <?php endif; ?>        
      </div>
      <?php if ($link && !is_wp_error( $link )) : ?>
        <a class="corporate__title corporate__title--mod" href="<?= $link; ?>">learn more</a>
      <?php endif; ?>


    <?php endif; ?>
    
    <?php if ($including && !empty($including) && !is_wp_error( $including )) : ?>
      <?php 
        $including_title = $including['title'] ?? '';

        $including_list = $including['list'] ?? [];
      ?>

      <?php if ($including_title && !empty($including_title)) : ?>
        <h3 class="corporate__title corporate__title--mod"><?= $including_title; ?></h3>
      <?php endif; ?>

      <?php if ($including_list && !empty($including_list) && !is_wp_error( $including_list )) : ?>
        <div class="corporate__wrapper">
          <?php foreach ($including_list as $key => $including_item) : ?>
            <?php 
              $taxonomy = $including_item->taxonomy ?? '';

              $term_name = $including_item->name ?? '';
              $term_id = $including_item->term_id; 

              $link = get_term_link( $term_id, $taxonomy );              

              $short_desc = get_field( 'short_desc', $including_item );
            ?>
            <div class="corporate__info">
              <h6 class="corporate__info-title">
                <?= enercor_insert_br_in_term_mame( $term_name ); ?>
              </h6>

              <?php if ($short_desc && !empty($short_desc)) : ?>
                <p class="corporate__info-text">
                  <?= $short_desc; ?>
                </p>
              <?php endif; ?>
              
              <?php if ($link && !is_wp_error( $link )) : ?>
                <a href="<?= $link; ?>" class="corporate__info-link">learn more</a>
              <?php endif; ?>            
            </div>
          <?php endforeach; ?>        
        </div>
      <?php endif; ?>
    <?php endif; ?>

  </div>
</section>