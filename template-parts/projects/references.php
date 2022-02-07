<?php 
  $archive_projects_page_id = get_field( 'archive_projects', 'option' );

  $references = get_field( 'references', $archive_projects_page_id );
?>
<?php if ($references && !is_wp_error( $references )) : ?>
  <?php 
    $title = $references['title'];
    $subtitle = $references['subtitle'];

    $list = $references['list'];
  ?>

  <section class="reference">
    <div class="container">
      <?php if ($title && !empty($title)) : ?>
        <h2 class="reference__title title"><?= $title; ?></h2>
      <?php endif; ?>

      <?php if ($subtitle && !empty($subtitle)) : ?>
        <p class="reference__subtitle">
          <?= $subtitle; ?>
        </p>
      <?php endif; ?>
      
      <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
        <div class="reference__wrapper">
          <?php foreach ($list as $item) : ?>
            <?php 
              $image = $item['image'];
              $title = $item['title'];
              $subtitle = $item['subtitle'];
              $link = $item['link'];
              $content = $item['content'];

              $button_toggle = $item['button_toggle'];
            ?>
            <div class="reference__info">
              <?php if ($image && !empty($image) && !is_wp_error( $image )) : ?>
                <div class="reference__icon">
                  <img class="reference__img" src="<?= $image['sizes']['medium']; ?>" alt="<?= $title; ?>">
                </div>
              <?php endif; ?>
                
              <div class="reference__info-about">
                <div class="reference__about">
                    <div class="reference__about-wrap">
                      <h4 class="reference__about-name"><?= $title; ?></h4>
                      <p class="reference__about-prof">
                        <?= $subtitle; ?>
                      </p>
                    </div>

                    <?php if ($link && !empty($link['text']) && !empty($link['url'])) : ?>
                      <a href="<?= $link['url']; ?>" class="reference__about-link" target="_blank">
                        <?= $link['text']; ?>
                      </a>
                    <?php endif; ?>                    
                </div>

                <div class="reference__about-text">
                  <?= $content; ?>
                </div>
                
                <?php if ($button_toggle) : ?>
                  <button class="reference__about-link reference__about-link--more" type="button">read more</button>
                <?php endif; ?>                
              </div>
            </div>
          <?php endforeach; ?>            
        </div>
      <?php endif; ?>        
    </div>
  </section>
<?php endif; ?>
