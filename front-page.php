<?php 
  get_header(  );
?>

<main class="main">
  <?php 
    get_template_part( 'template-parts/main', 'front' );

    // Check value exists.
    if( have_rows('content') ):

      // Loop through rows.
      while ( have_rows('content') ) : the_row();

          // Case: Who We Are layout.
          if( get_row_layout() == 'who_we_are' ):
              get_template_part( 'template-parts/front/who_we_are' );

          // Case: Unique Team layout.
          elseif( get_row_layout() == 'unique_team' ):
            get_template_part( 'template-parts/front/unique_team' );
          
          // Case: CEO layout.
          elseif( get_row_layout() == 'ceo' ):
            get_template_part( 'template-parts/front/ceo' );

          // Case: Services layout.
          elseif( get_row_layout() == 'services' ): 
              get_template_part( 'template-parts/front/services' ); 

          // Case: Projects layout.
          elseif( get_row_layout() == 'projects' ): 
            get_template_part( 'template-parts/front/projects' ); 
          
          // Case: Selected without text layout.
          elseif( get_row_layout() == 'selected' ): 
            get_template_part( 'template-parts/front/selected' ); 
                    
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