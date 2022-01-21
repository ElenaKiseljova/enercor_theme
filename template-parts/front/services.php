<?php 
  $services = get_field( 'services' );
?>
<?php if ($services && !is_wp_error( $services )) : ?>
  <?php 
    $title = $services['title'];
    $content = $services['content'];

    $title_list = $services['title_list'];
    $list = $services['list'];
  ?>
  <section class="services" id="services">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="services__title title"><?= $title; ?></h2>
      <?php endif; ?>
        
      <div class="services__wrap">
        <?= $content; ?>
      </div>
      
      <?php if (!empty($title_list)) : ?>
        <h2 class="services__include title"><?= $title_list; ?></h2>
      <?php endif; ?>
      
      <?php if ( $list && !empty( $list) && !is_wp_error(  $list )) : ?>
        <div class="services__wrapper">
          <?php foreach ( $list as $service) : ?>
            <div class="services__info">
              <?php 
                $title = $service->name;
                $id = $service->term_id;
                $link = get_term_link( $id, 'services');
              ?>
              <a href="<?= $link; ?>" class="services__info-text">
                <?= $title; ?>
              </a>
            </div>
          <?php endforeach; ?>
       </div>        
      <?php endif; ?>     
    </div>
  </section>
<?php endif; ?>
