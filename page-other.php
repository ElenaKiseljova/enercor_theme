<?php 
  /*
    Template Name: Other projects and  experiences
  */
?>

<?php 
  get_header(  );
?>

<main class="main">
  <?php 
    get_template_part( 'template-parts/main' );

    get_template_part( 'template-parts/projects/completed' );
  ?>
</main>

<?php 
  get_footer(  );
?>