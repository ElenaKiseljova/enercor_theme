<?php 
  /*
    Template Name: Projects
  */
?>

<?php 
  get_header(  );
?>

<main class="main">
  <?php 
    get_template_part( 'template-parts/projects/main' );

    get_template_part( 'template-parts/stages' );

    get_template_part( 'template-parts/projects/phases' );

    get_template_part( 'template-parts/projects/completed' );

    get_template_part( 'template-parts/projects/references' );
  ?>
</main>

<?php 
  get_footer(  );
?>