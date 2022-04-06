<?php 
  if (is_post_type_archive( 'projects' )) {
    $archive_projects_page_id = get_field( 'archive_projects', 'option' );

    $main = get_field( 'main', $archive_projects_page_id );
  } else {
    $main = get_field( 'main' );
  }  
?>
<?php if ($main && !is_wp_error( $main )) : ?>
  <?php 
    $image = $main['image'];
    $color = $main['color'];
    
    $title = $main['title'];
    $circles = $main['circles'] ?? [];

    // Стили для 4-х кругов на странице сервисов прописаны, поэтому подставлю эти стили, если будет 4 круга
    // и стили с проектов - если меньше 4-х
    $circles_count = count($circles) > 0 ? count($circles) : 3;
  ?>

  <section class="start-screen__projects <?= $circles_count > 3 ? 'start-screen__service' : ''; ?> js-start-screen">
    <?php if ($image && !empty($image)) : ?>
      <div class="start-screen__projects-img">
        <img src="<?= $image['sizes']['main_bg']; ?>" alt="<?= bloginfo( 'name' ); ?>">
      </div>      
    <?php endif; ?>

    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <div class="start-screen__projects-title start-screen-animate-js <?= $circles_count > 3 ? 'start-screen__service-title' : ''; ?>" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>>
          <?= $title; ?>

          <div class="start-screen__btn wrapper__btn wrapper__btn--black start-screen-animate-js">
            <div class="btn">
              <a href="<?= get_bloginfo( 'url' ); ?>#services" class="btn__link">
                <p class="btn__text">Back to Main</p>
                <div class="btn__arrow btn__arrow--reverse">
                  <svg class="btn__arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                    <path class="arrowLeftanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                    <path class="arrowLeftanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751"
                      stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php endif; ?>  
      
      <?php if ($circles && !empty($circles) && !is_wp_error( $circles )) : ?>
        <ul class="projects__circle <?= $circles_count > 3 ? 'service__circle' : ''; ?>">
          <?php foreach ($circles as $circle) : ?>
            <li class="projects__circle-item <?= $circles_count > 3 ? 'service__circle-item' : ''; ?> projects__circle-item--active">
              <a class="projects__circle-link" href="<?= $circle['link'] ?? '#'; ?>">
                <?= $circle['title']; ?>
              </a>              
            </li>
          <?php endforeach; ?>          
        </ul>
      <?php endif; ?>        
    </div>
  </section>
<?php endif; ?>
