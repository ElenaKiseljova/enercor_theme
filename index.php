<?php 
  get_header(  );
?>

<main class="main">
    <?php 
      get_template_part( 'template-parts/front/main' );

      get_template_part( 'template-parts/front/who_we_are' );

      get_template_part( 'template-parts/front/unique_team' );

      get_template_part( 'template-parts/front/ceo' );

      get_template_part( 'template-parts/front/services' );

      get_template_part( 'template-parts/front/projects' );

      get_template_part( 'template-parts/front/selected' );
    ?> 
</main>

<?php 
  get_footer(  );
?>