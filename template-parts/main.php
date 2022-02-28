<?php 
  $member_id = null;
  $term = get_queried_object();

  if ( isset($term->taxonomy) ) {
    $main = get_field( 'main', $term );

    $member_id = isset($_GET['member_id']) ? (int) $_GET['member_id'] : null;
  } else {
    $main = get_field( 'main' );
  }  
?>
<?php if ($main && !is_wp_error( $main )) : ?>
  <?php 
    $image = $main['image'];
    $color = $main['color'];
    
    $button = $main['button'];
  ?>
  <section class="start-screen__contacts <?= (is_singular( 'projects' ) || is_tax( 'services' )) ? 'start-screen__project-page' : ''; ?> js-start-screen">
    <?php if ($image && !empty($image)) : ?>
      <div class="start-screen__contacts-img">
        <img src="<?= $image['sizes']['main_bg_half']; ?>" alt="<?= bloginfo( 'name' ); ?>">
      </div>      
    <?php endif; ?>

    <div class="container">
      <h1 class="start-screen__contacts-title start-screen-animate-js" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>>
        <?= isset($term->taxonomy) ? $term->name : get_the_title(  ); ?>
      </h1> 
      
      <?php if ($button && !empty($button['title'])) : ?>
        <?php if (!empty($button['link']) || $member_id) : ?>
          <div class="wrapper__btn start-screen__contacts-btn">
            <div class="btn start-screen-animate-js">
              <a href="<?= $member_id ? (get_permalink( $member_id ) . '#publications') : $button['link']; ?>" class="btn__link">
                <p class="btn__text start-screen__contacts-btn-text" <?= $color ? 'style="color: ' . $color . ';"' : ''; ?>><?= $button['title']; ?></p>
                <div class="btn__arrow start-screen__contacts-btn-arrow">
                  <svg class="btn__arrow-icon start-screen__contacts-btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                    <path class="arrowLeftanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path class="arrowLeftanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
              </a>
            </div>
          </div>
        <?php endif; ?>        
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
