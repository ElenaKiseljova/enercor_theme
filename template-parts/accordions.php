<div class="vacancies__wrapper ">

  <?php 
    $vacancy = null;

    $is_vacancies = is_page_template( 'page-vacancies.php' );  
    $is_publications = is_tax( 'publications-category' );

    if ($is_vacancies) {
      global $vacancy; 

      $vacancies_enercore = get_field( 'enercore' );      

      if ($vacancies_enercore && !empty($vacancies_enercore) && !is_wp_error( $vacancies_enercore )) {
        $vacancy = $vacancies_enercore;       
        
        get_template_part( 'template-parts/accordion' );
      }  

      $vacancies_projects = get_field( 'projects' );

      if ($vacancies_projects && !empty($vacancies_projects) && !is_wp_error( $vacancies_projects )) {
        $vacancy = $vacancies_projects;            
        
        get_template_part( 'template-parts/accordion' );
      }  

      if (
        $vacancies_enercore && !empty($vacancies_enercore) && !is_wp_error( $vacancies_enercore ) &&
        $vacancies_projects && !empty($vacancies_projects) && !is_wp_error( $vacancies_projects )
      ) {
        if ((int) $vacancies_projects['count'] === 0 && (int) $vacancies_enercore['count'] === 0) {
          $empty = get_field( 'empty' );
          ?>
            <p class="vacancies__title vacancies__title--vacancy">
              <?= $empty; ?>
            </p>
          <?php
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