<?php 
  get_header(  );
?>

<main class="services__main">
  <?php
    get_template_part( 'template-parts/main' );

    get_template_part( 'template-parts/service/description' );

    get_template_part( 'template-parts/service/info' );   
  ?>  
</main>

<?php 
  get_footer(  );
?>
