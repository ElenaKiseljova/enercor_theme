<?php 
  $member_id = get_the_ID(  );

  $publications = get_field( 'publications' );

  if ($publications) {
    $publications_title = $publications['title'];

    $publications_logos = $publications['logos'];
  }

  $publications_arr = enercor_get_publications($member_id, null, 'data');

  if ($publications_arr && is_array($publications_arr) && !is_wp_error( $publications_arr )) {
    $publications_terms = $publications_arr['terms'] ?? [];
    $publications_counts = $publications_arr['publications_count'] ?? [];
  }  
?>
<?php if ($publications_title && !empty($publications_title)) : ?>
  <section class="publications" id="publications">
    <div class="publications__wrapper">
      <h3 class="publications__headline"><?= $publications_title; ?></h3>

      <?php if ($publications_terms && !empty($publications_terms)) : ?>
        <ul class="publications__gallery">
          <?php foreach ($publications_terms as $key => $term) : ?>
            <?php 
              $taxonomy = $term->taxonomy ?? '';
              $term_name = $term->name ?? '';
              $term_id = $term->term_id;

              $logo = get_field( 'logo', $term ) ?? '';

              $publications_count = $publications_counts[$key];

              $link = get_term_link( $term_id, $taxonomy );
            ?>
            <?php if ($publications_count > 0) : ?>
              <li class="publications__item"">
                <a href="<?= $link; ?>?member_id=<?= $member_id; ?>" class="publications__link">
                  <img src="<?= $logo; ?>" alt="<?= $term_name; ?>">
                  <h3 class="publications__text">read <?= $publications_count; ?> publication<?= ($publications_count > 1) ? 's' : ''; ?></h3>
                </a>
              </li>
            <?php endif; ?>            
          <?php endforeach; ?>          
        </ul>

      <?php elseif ($publications_logos && is_array($publications_logos) && !empty($publications_logos) && !is_wp_error( $publications_logos )) : ?>
        <ul class="publications__gallery">
          <?php foreach ($publications_logos as $key => $term) : ?>
            <?php 
              $taxonomy = $term->taxonomy ?? '';
              $term_name = $term->name ?? '';
              $term_id = $term->term_id;

              $logo = get_field( 'logo', $term ) ?? '';
            ?>
            <li class="publications__item"">
              <a href="<?= $link; ?>?member_id=<?= $member_id; ?>" class="publications__link">
                <img src="<?= $logo; ?>" alt="<?= $term_name; ?>">                  
              </a>
            </li>         
          <?php endforeach; ?>          
        </ul>
      <?php endif; ?>      
    </div>
  </section>
<?php endif; ?>