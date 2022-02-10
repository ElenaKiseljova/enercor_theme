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

    get_template_part( 'template-parts/news' );
  ?>  
</main>

<?php 
  get_footer(  );
?>