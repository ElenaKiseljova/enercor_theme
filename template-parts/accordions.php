<div class="vacancies__wrapper ">

  <?php 
    $vacancy = null;

    $is_vacancies = is_page_template( 'page-vacancies.php' );  
    $is_publications = is_tax( 'publications-category' );

    if ($is_vacancies) {
      $vacancies = get_field( 'vacancies' );

      if ($vacancies && !empty($vacancies) && !is_wp_error( $vacancies )) {
        global $vacancy;
        foreach ($vacancies as $key => $vacancy) {
          get_template_part( 'template-parts/accordion' );
        }
      }  
    } else if ($is_publications) {
      $term = get_queried_object();

      if ( isset($term->taxonomy) ) {  
        $term_id = (int) $term->term_id;  
        $member_id = isset($_GET['member_id']) ? (int) $_GET['member_id'] : null;
      }

      if ($member_id) {        

        enercor_get_publications($member_id, $term_id, 'html');
        
      } else {
        if ( have_posts() ){
          while ( have_posts() ){
            the_post();
            
            get_template_part( 'template-parts/accordion' );
          }
        } else {
          echo wpautop( 'Publications not found.' );
        }
      }
    }
              
  ?>    

</div>