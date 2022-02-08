<?php 
  /*
    Template Name: Project
  */
?>

<?php 
  get_header(  );
?>

<main class="main">
  <?php
    get_template_part( 'template-parts/main' );

    get_template_part( 'template-parts/project/results' );
    
    get_template_part( 'template-parts/stages' );

    get_template_part( 'template-parts/project/schedule' );
  ?>
</main>

<?php 
  get_footer(  );
?>