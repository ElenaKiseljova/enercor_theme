<?php 
  /*
    Template Name: Team Member
  */
?>

<?php 
  get_header(  );
?>

<main class="main main--team">
  <?php
    get_template_part( 'template-parts/member/about' );

    get_template_part( 'template-parts/member/expertise' );
    
    get_template_part( 'template-parts/member/biography' );

    get_template_part( 'template-parts/member/publications' );
  ?>  
</main>

<?php 
  get_footer(  );
?>