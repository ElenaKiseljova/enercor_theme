<?php 
  $cities = get_field( 'cities' );

  $current_city = isset($_GET['city']) ? $_GET['city'] : null;
?>
<?php if ($cities && !is_wp_error( $cities )) : ?>
  <?php 
    $title = $cities['title'];
  ?>
  <?php if ($title && !empty($title)) : ?>
    <h2 class="contact__title"><?= $title; ?></h2>
  <?php endif; ?>
  
  <div class="contact__navigation">
    <ul class="contact__navigation-list">
      <?php 
        $contact_page_id = 21;

        $cities = get_terms( [
          'taxonomy' => 'cities',
          'hide_empty' => false,
        ] ) ?? [];

        $city_cur = get_the_terms( get_the_ID(  ), 'cities' ) ?? [];
      ?>
      <?php foreach ($cities as $city) : ?>
        <li class="contact__navigation-item <?= ((is_null( $current_city ) && $city->name === 'LONDON') || (isset( $current_city ) && $city->name === $current_city)) ? 'contact__navigation-item--active' : ''; ?>">
          <?= $city->name; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
