<?php 
  /*
    Template Name: Contacts
  */
?>

<?php 
  get_header(  );
?>

<main class="main">

  <?php
    get_template_part( 'template-parts/contacts/main' );
  ?>

  <section class="contact">
    <div class="container">
      <?php
        get_template_part( 'template-parts/contacts/cities' );

        get_template_part( 'template-parts/contacts/form' );
      ?>      
    </div>
  </section>

</main>

<?php 
  get_footer(  );
?>