<?php 
    $title = get_sub_field('title');
    $content = get_sub_field('content');
  ?>
  <section class="team" id="team">
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="team__title title"><?= $title; ?></h2>
      <?php endif; ?>
      
      <?php if (!empty($content)) : ?>
        <div class="team__wrap">
          <?= $content; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
