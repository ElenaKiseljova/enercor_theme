<?php 
  get_header(  );
?>

<main class="main main--publication">

  <?php
    get_template_part( 'template-parts/main' );

    get_template_part( 'template-parts/publications-category/publications' );
  ?>

</main>

<?php 
  get_footer(  );
?>