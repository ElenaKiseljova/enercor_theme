<?php 
  $is_vacancies = is_page_template( 'page-vacancies.php' );  
  $is_news = is_page_template( 'page-news.php' );
?>
<section class="news-info">
  <div class="container">
    <div class="news-info__wrapper">
      <div class="news-info__notice <?= $is_vacancies ? 'news-info__notice--vacancies' : ''; ?> <?= $is_news ? 'news-info__notice--news' : ''; ?>">
        <?= get_the_content(  ); ?>
      </div>

      <?php if ( $is_news) : ?>
        <?php
          get_template_part( 'template-parts/social' );
        ?>
        
        <img class="news-info__img" src="<?= get_template_directory_uri(  ); ?>/assets/img/news-info-bg-2.svg" alt="world map vector">      
      <?php endif; ?>    
    </div>

    <?php if ($is_vacancies) : ?>
      <section class="publication-info">
        <div class="publication-info__wrapper <?= $is_vacancies ? 'publication-info__wrapper--vacancies' : ''; ?>">

          <?php 
            get_template_part( 'template-parts/publications-category/publication' );
          ?>      

        </div>
      </section>
    <?php endif; ?>
  </div>  
</section>

