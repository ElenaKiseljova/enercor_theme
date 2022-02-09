<section class="publication-info">
  <div class="publication-info__wrapper">

    <?php 
      $term = get_queried_object();

      if ( isset($term->taxonomy) ) {  
        $term_id = (int) $term->term_id;  
        $member_id = isset($_GET['member_id']) ? (int) $_GET['member_id'] : null;
      }

      if ($member_id) {        

        get_publications($member_id, $term_id, 'html');
        
      } else {
        if ( have_posts() ){
          while ( have_posts() ){
            the_post();
            
            get_template_part( 'template-parts/publications-category/publication' );
          }
        } else {
          echo wpautop( 'Publications not found.' );
        }
      }
    ?>
    

  </div>
</section>