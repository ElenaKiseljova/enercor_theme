<?php 
  get_header(  );
?>

<main class="main" style="display:flex;flex-direction:column;align-items:center;justify-content:center;color:white;background:#1c1c1c; min-height: 50vh;">
  <h1>
  <?php 
      the_title(  );
    ?> 
  </h1>
  <div>
    <?php 
      the_content(  );
    ?> 
  </div>
</main>

<?php 
  get_footer(  );
?>