<?php 
  $is_vacancies = is_page_template( 'page-vacancies.php' );  
  $is_news = is_page_template( 'page-news.php' );
?>

<section class="news-info <?= $is_vacancies ? 'vacancies' : ''; ?>">
  <div class="container">
    <div class="news-info__notice <?= $is_vacancies ? 'news-info__notice--vacancies' : ''; ?> <?= $is_news ? 'news-info__notice--news' : ''; ?>">
      <?= get_the_content(  ); ?>
    </div>

    <?php
      if ($is_news) {
        get_template_part( 'template-parts/social' );
      } else if ($is_vacancies) {
        get_template_part( 'template-parts/accordions' );
      }          
    ?>
    
  </div>
</section>

