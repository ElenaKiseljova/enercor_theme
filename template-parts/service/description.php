<?php 
  $term = get_queried_object();

  $description = get_field( 'description', $term );
?>
<?php if ($description && !empty($description) && !is_wp_error( $description )) : ?>
  <?php 
    $toggle_visibility = $description['toggle_visibility'];  

    $image = $description['image'];  
    $text = $description['text'];
  ?>

  <?php if ($toggle_visibility) : ?>
    <section class="services-description">
      <div class="services-description__wrapper">
        <?php if ($image && !empty($image) && !is_wp_error( $image )) : ?>
          <img class="services-description__img" src="<?= $image['sizes']['front_projects_bg']; ?>" alt="<?= strip_tags($term->name); ?>">
        <?php endif; ?>
        
        <?php if ($text && !empty($text)) : ?>
          <p class="services-description__text">
            <?= $text; ?>
          </p>
        <?php endif; ?>        
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>
