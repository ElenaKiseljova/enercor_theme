<?php 
  /*
    Template Name: Services
  */
?>

<?php 
  get_header(  );
?>

<main class="main">
  <?php 
    get_template_part( 'template-parts/main', 'circles' );

    // Check value exists.
    if( have_rows('content') ):

      // Loop through rows.
      while ( have_rows('content') ) : the_row();

          // Case: Corporate layout.
          if( get_row_layout() == 'corporate' ):
              get_template_part( 'template-parts/services/corporate' );

          // Case: Clients layout.
          elseif( get_row_layout() == 'clients' ):
            get_template_part( 'template-parts/services/clients' );
          
          // Case: Expertise layout.
          elseif( get_row_layout() == 'expertise' ):
            get_template_part( 'template-parts/services/expertise' );

          // Case: Resources layout.
          elseif( get_row_layout() == 'resources' ): 
              get_template_part( 'template-parts/services/resources' ); 

          // Case: Industries layout.
          elseif( get_row_layout() == 'industries' ): 
            get_template_part( 'template-parts/services/expertise' ); 
          
          // Case: Resources without text layout.
          elseif( get_row_layout() == 'resources-no-text' ): 
            get_template_part( 'template-parts/services/resources', 'no-text' ); 
                    
          endif;

      // End loop.
      endwhile;

    // No value.
    else :
      // Do something...
    endif;
  ?>     
</main>

<?php 
  get_footer(  );
?>