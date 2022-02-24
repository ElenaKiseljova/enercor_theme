<?php 
  $cities = get_field( 'cities' );
?>
<?php if ($cities && !is_wp_error( $cities )) : ?>
  <?php 
    $title = $cities['title'];
    $list = $cities['list'];
  ?>
  <?php if ($title && !empty($title)) : ?>
    <h2 class="contact__title"><?= $title; ?></h2>
  <?php endif; ?>
  
  <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
    <div class="contact__navigation">
      <ul class="contact__navigation-list">
        <?php foreach ($list as $city) : ?>
          <li class="contact__navigation-item <?= ($city->name === 'LONDON') ? 'contact__navigation-item--active' : ''; ?>">
            <?= $city->name; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>  
<?php endif; ?>
