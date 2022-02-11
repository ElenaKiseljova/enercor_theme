<?php 
  /*
    Template Name: Enercor
  */
?>

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

          // Case: Brief overview layout.
          if( get_row_layout() == 'brief' ):
              get_template_part( 'template-parts/enercor/brief' );

          // Case: Experience Team layout.
          elseif( get_row_layout() == 'experience' ):
            get_template_part( 'template-parts/enercor/experience' );
          
          // Case: Mission Team layout.
          elseif( get_row_layout() == 'mission' ):
            get_template_part( 'template-parts/enercor/mission' );

          // Case: History layout.
          elseif( get_row_layout() == 'history' ): 
            get_template_part( 'template-parts/enercor/history' ); 
                    
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