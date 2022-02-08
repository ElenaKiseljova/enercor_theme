<?php 
  /*
    Template Name: News
  */
?>

<?php 
  get_header(  );
?>

<main class="news__main">
    
  <?php
    get_template_part( 'template-parts/main' );
  ?>
    
  <section class="news-info">
    <div class="news-info__wrapper">
      <div class="news-info__notice">
        <?= get_the_content(  ); ?>
      </div>

      <?php
        get_template_part( 'template-parts/social' );
      ?>
      
      <img class="news-info__img" src="<?= get_template_directory_uri(  ); ?>/assets/img/news-info-bg-2.svg" alt="world map vector">
    </div>
  </section>

</main>

<?php 
  get_footer(  );
?>
