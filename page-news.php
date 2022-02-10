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

    get_template_part( 'template-parts/news' );
  ?>
</main>

<?php 
  get_footer(  );
?>
