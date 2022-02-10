<?php 
  $title = get_sub_field( 'title' );
  $list = get_sub_field( 'list' );  
  $text = get_sub_field( 'text' ); 
?>

<section class="ability">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h4 class="ability__title">
        <?= $title; ?>
      </h4>
    <?php endif; ?>
    
    <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
      <ul class="ability__list">
        <?php foreach ($list as $key => $item) : ?>
          <?php 
            $title = $item['title'] ?? '';
            $icon = $item['icon'];
            $item_list = $item['list'];
          ?>
          <li class="ability__item">
            <?php if ($icon && !empty($icon)) : ?>
              <img src="<?= $icon; ?>" class="ability__item-img" alt="<?= !empty($title) ? $title : 'img'; ?>">
            <?php endif; ?>            

            <?php if ($item_list && !empty($item_list)) : ?>
              <ul class="ability__item-list">
                <?php foreach ($item_list as $key => $item_inner) : ?>
                  <li class="ability__item-info">
                      <?= $item_inner['text']; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            
          </li>
        <?php endforeach; ?>        
      </ul>
    <?php endif; ?>    
    
    <?php if ($text && !empty($text)) : ?>
      <p class="ability__text">
        <?= $text; ?>
      </p>
    <?php endif; ?>    
  </div>
</section>