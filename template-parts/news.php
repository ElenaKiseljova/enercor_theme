<?php 
  $is_vacancies = is_page_template( 'page-vacancies.php' );  
  $is_news = is_page_template( 'page-news.php' );
?>

<section class="news-info <?= $is_vacancies ? 'vacancies' : ''; ?>">
  <div class="container">
    <?php if ( get_the_content(  ) ) : ?>
      <div class="news-info__notice <?= $is_vacancies ? 'news-info__notice--vacancies' : ''; ?> <?= $is_news ? 'news-info__notice--news' : ''; ?>">
        <?= get_the_content(  ); ?>

        <?php 
          if ( $is_vacancies ) {
            $button = get_field( 'button' );
      
            if ($button && !empty($button['title']) && !empty($button['link'])) : 
              ?>
                <div class="vacancies__button wrapper__btn wrapper__btn--black start-screen-animate-js">
                    <div class="btn">
                        <a href="<?= $button['link']; ?>" class="btn__link">
                            <span class="btn__text "><?= $button['title']; ?></span>
                            <div class="btn__arrow ">
                                <svg class="btn__arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                                    <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
              <?php 
            endif;
          }
        ?>
      </div>
    <?php endif; ?>
    
    <?php
      if ($is_news) {
        get_template_part( 'template-parts/social' );
      } else if ($is_vacancies) {
        get_template_part( 'template-parts/accordions' );
      }          
    ?>

    <?php 
      $posts = get_posts(  ) ?? []; 
    ?>
    <?php if ( $is_news && $posts && !empty($posts) && !is_wp_error( $posts ) ) : ?>
      <div class="posts">
        <ul class="posts__list">
          <?php foreach ($posts as $post) : ?>
            <?php 
              $title = $post->post_title;
              $id = $post->ID;
              
              $content = $post->post_content;
              
              $image = get_the_post_thumbnail( $id ) ?? '';
            ?>
            <li class="posts__item">      
              <h3 class="posts__title">
                <?= $title; ?>
              </h3>
              <div class="posts__content news-info__notice">
                <?= $content; ?>
              </div>

              <div class="posts__image">
                <?= $image; ?>
              </div>
            </li>
          <?php endforeach; ?>           
        </ul>
      </div>
    <?php endif; ?>      
  </div>
</section>

