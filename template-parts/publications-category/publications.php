<section class="publication-info">
  <div class="publication-info__wrapper">

    <?php 
      $term = get_queried_object();

      if ( isset($term->taxonomy) ) {  
        $term_id = (int) $term->term_id;  
        $member_id = isset($_GET['member_id']) ? (int) $_GET['member_id'] : null;
      }

      if ($member_id) {
        $args = [
          'post_type' => 'publications',
          'post_status' => 'publish',
          'order' => 'ASC',
          'orderby' => 'menu_order',
          'posts_per_page' => -1,
          'tax_query' => [
            [
              'taxonomy' => 'publications-category',
              'field' => 'term_id',
              'terms' => $term_id,
            ],
          ],
          'meta_query'		=> [
            [
              'key' => 'author',
              'value' => $member_id,
              'compare' => 'LIKE'
            ],
          ],
        ];
    
        $query = new WP_Query( $args ); 
    
        if ( $query->have_posts() ) {
    
          while ( $query->have_posts() ) {
            $query->the_post();
    
            get_template_part( 'template-parts/publications-category/publication' );
          }    
    
          wp_reset_postdata();
        } else {
          echo wpautop( 'Publications not found.' );
        } 
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