<?php 
  /*
    Template Name: Team
  */
?>

<?php 
  get_header(  );
?>

<main class="team__main">
  <?php 
    get_template_part( 'template-parts/team/main' );

    get_template_part( 'template-parts/team/members' );
  ?>  
</main>

<?php 
  get_footer(  );
?>