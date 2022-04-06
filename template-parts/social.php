<?php 
  $social = get_field( 'social' );
?>

<?php if ($social && !is_wp_error( $social )) : ?>
  <?php 
    $title = $social['title'];
  ?>
  <div class="contact__follow">
    <?php if ($title && !empty($title)) : ?>
      <h3 class="contact__follow-title"><?= $title; ?></h3>
    <?php endif; ?>
    
    <?php
      $menu_name = 'social';
      $locations = get_nav_menu_locations();
      
      if( $locations && isset( $locations[ $menu_name ] ) ){
      
        // получаем элементы меню
        $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );
      }
    ?>

    <?php if (isset($menu_items) && !empty($menu_items) && !is_wp_error( $menu_items )) : ?>  
      <div class="contact__follow-navigation">
        <ul class="contact__follow-navigation-list <?= is_page_template( 'page-news.php' ) ? 'contact__follow-navigation-list--vertical' : ''; ?>">
          <?php foreach ( (array) $menu_items as $key => $menu_item ) : ?> 
            <li class="contact__follow-navigation-item <?= is_page_template( 'page-news.php' ) ? 'contact__follow-navigation-item--vertical' : ''; ?>">
              <a href="<?= $menu_item->url; ?>" class="contact__follow-navigation-link">
                <span class="contact__follow-navigation-link--decor">
                  <svg class="contact__follow-navigation-link--decor-icon"
                      width="23" height="23"
                      fill="none">
                    <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/sprite.svg#<?= mb_strtolower($menu_item->title); ?>"></use>
                  </svg>
                </span>
                <?= $value['title']; ?>
              </a>
            </li>           
          <?php endforeach; ?>          
        </ul>
      </div>
    <?php endif; ?> 
  </div>
<?php endif; ?>