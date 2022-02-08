<?php 
  /*
    Template Name: Vacancies
  */
?>

<?php 
  get_header(  );
?>

<main class="main">
  <?php
    get_template_part( 'template-parts/main' );
  ?>

  <section class="news-info">
    <div class="news-info__wrapper">
      <div class="news-info__notice">
        <?= get_the_content(  ); ?>
      </div>

      <!-- тут уникальный блок vacancies -->
    </div>
  </section>
</main>

<?php 
  get_footer(  );
?>