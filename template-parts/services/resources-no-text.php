<?php 
  $list = get_sub_field( 'list' );
?>

<section class="industrial">
  <div class="container">
    <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
      <ul class="ability__list industrial__list">
        <?php foreach ($list as $key => $item) : ?>
          <?php 
            $title = $item['title'] ?? '';
            $icon = $item['icon'];
            $item_list = $item['list'];
          ?>
          <li class="ability__item industrial__item">
            <div class="ability__container">
              <?php if ($icon && !empty($icon)) : ?>
                <img src="<?= $icon; ?>" class="ability__item-img" alt="<?= !empty($title) ? $title : 'img'; ?>">
              <?php endif; ?>            

              <?php if ($item_list && !empty($item_list)) : ?>
                <ul class="industrial__item-list">
                  <?php foreach ($item_list as $key => $item_inner) : ?>
                    <li class="ability__item-info industrial__item-info">
                        <?= $item_inner['text']; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>           
            
          </li>
        <?php endforeach; ?>        
      </ul>
    <?php endif; ?>      
  </div>
</section>