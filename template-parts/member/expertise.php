<?php 
  $expertise = get_field( 'expertise' );
  $expertise_list = get_the_terms( get_the_ID(  ), 'expertise' ) ?? [];
?>
<?php if ($expertise && !empty($expertise)) : ?>
  <section class="expertise">
    <div class="expertise__wrapper">
      <h3 class="expertise__headline"><?= $expertise; ?></h3>

      <?php if (!empty($expertise_list)) : ?>
        <ul class="expertise__list">
          <?php foreach ($expertise_list as $key => $item) : ?>
            <?php 
              $icon = get_field( 'icon', $item );
            ?>
            <li class="expertise__item">
              <?php if ($icon) : ?>
                <img class="expertise__icon" src="<?= $icon; ?>" alt="<?= strip_tags( $item->name ); ?>">
              <?php endif; ?>
              
              <span class="expertise__text">
                <?= enercor_insert_br_in_term_mame( $item->name ); ?>
              </span>
            </li>
          <?php endforeach; ?>                                  
        </ul>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
