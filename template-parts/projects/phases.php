<?php 
    $archive_projects_page_id = get_field( 'archive_projects', 'option' );

    $phases = get_field( 'phases', $archive_projects_page_id );
?>
<?php if ($phases && !is_wp_error( $phases )) : ?>
  <?php     
    $title = $phases['title'];
    $list = $phases['list'];
  ?>

    <section class="phases">
      <div class="container">
        <?php if ($title && !empty($title)) : ?>
          <h3 class="phases__title title"><?= $title; ?></h3>
        <?php endif; ?>         
        
        <?php if ($list && !empty($list) && !is_wp_error( $list )) : ?>
          <div class="phases__wrapper">
            <?php foreach ($list as $item) : ?>
              <?php                    
                $image = $item['image'];
                $number = $item['number'];
                $title = $item['title'];
                $subtitle = $item['subtitle'];

                $phases = $item['phases'];
                $results = $item['results'];
              ?>
              <div class="phases__card" id="phases-<?= (int) $number; ?>">
                <?php if (!empty($image) && !is_wp_error( $image )) : ?>
                  <img src="<?= $image['sizes']['stage']; ?>" class="phases__card-bg" alt="<?= bloginfo( 'name' ); ?>">
                <?php endif; ?>                
                
                <div class="phases__card-wrap">
                  <p class="phases__card-number">
                    <span><?= $number; ?></span>
                    <br>
                    <?= $title; ?>
                    <?php if (!empty($subtitle)) : ?>
                      <br>
                      <span>                        
                        <?= $subtitle; ?>
                      </span>
                    <?php endif; ?>
                  </p>

                  <div class="phases__wrap">
                    <div class="phases__wrap-list">
                      <?php if (!empty($phases['title']) && $phases['list'] && !empty($phases['list'])) : ?>
                        <h6 class="phases__card-title"><?= $phases['title']; ?></h6>
                        <ul class="phases__card-list">
                          <?php foreach ($phases['list'] as $item) : ?>
                            <li class="phases__card-item">
                              <?= $item['text']; ?>
                            </li>
                          <?php endforeach; ?>                            
                        </ul>
                      <?php endif; ?>                      
                    </div>
                    <div class="phases__wrap-list">
                      <?php if (!empty($results['title']) && $results['list'] && !empty($results['list'])) : ?>
                        <h6 class="phases__card-title"><?= $results['title']; ?></h6>
                        <ul class="phases__card-list">
                          <?php foreach ($results['list'] as $item) : ?>
                            <li class="phases__card-item">
                              <?= $item['text']; ?>
                            </li>
                          <?php endforeach; ?>                            
                        </ul>
                      <?php endif; ?>  
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>            
          </div>  
        <?php endif; ?>                
      </div>
    </section>

<?php endif; ?>