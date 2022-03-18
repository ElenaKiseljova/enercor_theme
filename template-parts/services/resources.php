<?php 
  $title = get_sub_field( 'title' );
  $list = get_sub_field( 'list' );  
  $text = get_sub_field( 'text' ); 
?>

<section class="ability" id="ability">
  <div class="container">
    <?php if ($title && !empty($title)) : ?>
      <h4 class="ability__title">
        <?= $title; ?>
      </h4>
    <?php endif; ?>
    
    <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
      <ul class="ability__list ability__list-js">
        <?php foreach ($list as $key => $item) : ?>
          <?php 
            $expertise = $item['expertise'] ?? null;

            $item_list = $item['list'];

            $item_icon_width = $item['icon_width'] ?? null;
          ?>

          <?php if ($expertise && $expertise instanceof WP_Term) : ?>
            <?php 
              $icon = get_field( 'icon',  $expertise ) ?? '';
            ?>
            <li class="ability__item" id="expertise-<?= $expertise->term_id; ?>">              
              <div class="ability__container">
                <?php if ($icon && !empty($icon)) : ?>
                  <img <?= $item_icon_width ? 'width="' . $item_icon_width . '"' : ''; ?> src="<?= $icon; ?>" class="ability__item-img" alt="<?= $expertise->name ?? 'img'; ?>">
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
              </div>
            </li>
          <?php endif; ?>          
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