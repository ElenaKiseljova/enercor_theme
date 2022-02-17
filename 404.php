<?php 
  get_header(  );
?>

<main class="main" style="display:flex;flex-direction:column;align-items:center;justify-content:center;color:white;background:#1c1c1c; min-height: 50vh;">
  <h1 style="margin-bottom: 40px;">
    404 - Page not found
  </h1>

  <div class="btn">
    <a href="<?= get_bloginfo( 'url' ); ?>" class="btn__link">
      <p class="btn__text start-screen__contacts-btn-text">Back to Main</p>
      <div class="btn__arrow start-screen__contacts-btn-arrow">
        <svg class="btn__arrow-icon start-screen__contacts-btn-arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
          <path class="arrowLeftanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
          <path class="arrowLeftanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
    </a>
  </div>
</main>

<?php 
  get_footer(  );
?>