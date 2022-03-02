<?php 
  $is_vacancies = is_page_template( 'page-vacancies.php' );  
  $is_news = is_page_template( 'page-news.php' );
?>

<section class="news-info <?= $is_vacancies ? 'vacancies' : ''; ?>">
  <div class="container">
    <?php if ( get_the_content(  ) ) : ?>
      <div class="news-info__notice <?= $is_vacancies ? 'news-info__notice--vacancies' : ''; ?> <?= $is_news ? 'news-info__notice--news' : ''; ?>">
        <?= get_the_content(  ); ?>
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

