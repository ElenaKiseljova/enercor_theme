<?php 
  $archive_projects_page_id = get_field( 'archive_projects', 'option' );

  $main = get_field( 'main', $archive_projects_page_id );
?>
<?php if ($main && !is_wp_error( $main )) : ?>
  <?php 
    $image = $main['image'];
    $color = $main['color'];
    
    $title = $main['title'];
    $circles = $main['circles'];
  ?>

  <section class="start-screen__projects js-start-screen">
    <?php if ($image && !empty($image)) : ?>
      <img class="start-screen__projects-img" src="<?= $image['sizes']['main_bg']; ?>" alt="<?= bloginfo( 'name' ); ?>">
    <?php endif; ?>

    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h1 class="start-screen__projects-title" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $title; ?></h1>
      <?php endif; ?>  
      
      <?php if ($circles && !empty($circles) && !is_wp_error( $circles )) : ?>
        <ul class="projects__circle">
          <?php foreach ($circles as $circle) : ?>
            <li class="projects__circle-item projects__circle-item--active">
              <?= $circle['title']; ?>
            </li>
          <?php endforeach; ?>          
        </ul>
      <?php endif; ?>        
    </div>
  </section>
<?php endif; ?>
