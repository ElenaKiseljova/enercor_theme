<?php 
  $social = get_field( 'social' );
?>

<?php if ($social && !is_wp_error( $social )) : ?>
  <?php 
    $title = $social['title'];
    $list = $social['list'];
  ?>
  <div class="contact__follow">
    <?php if ($title && !empty($title)) : ?>
      <h3 class="contact__follow-title"><?= $title; ?></h3>
    <?php endif; ?>
    
    <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
      <div class="contact__follow-navigation">
        <ul class="contact__follow-navigation-list <?= is_page_template( 'page-news.php' ) ? 'contact__follow-navigation-list--vertical' : ''; ?>">
          <?php foreach ($list as $key => $value) : ?>
            <?php if (!empty($value['title']) && !empty($value['link'])) : ?>
              <li class="contact__follow-navigation-item <?= is_page_template( 'page-news.php' ) ? 'contact__follow-navigation-item--vertical' : ''; ?>">
                <a href="<?= $value['link']; ?>" class="contact__follow-navigation-link">
                  <span class="contact__follow-navigation-link--decor">
                    <svg class="contact__follow-navigation-link--decor-icon"
                        width="23" height="23"
                        fill="none">
                      <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/sprite.svg#<?= $key; ?>"></use>
                    </svg>
                  </span>
                  <?= $value['title']; ?>
                </a>
              </li>
            <?php endif; ?>            
          <?php endforeach; ?>          
        </ul>
      </div>
    <?php endif; ?>   
  </div>
<?php endif; ?>