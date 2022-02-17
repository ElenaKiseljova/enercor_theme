<?php 
    $title = get_sub_field('title');
    $list = get_sub_field('list');
    $advantages = get_sub_field('advantages');
    $button = get_sub_field('button');
  ?>
  <section class="who" id=""who>
    <div class="container">
      <?php if (!empty($title)) : ?>
        <h2 class="who__title title"><?= $title; ?></h2>
      <?php endif; ?>
      
      <?php if ($list && !empty($list)) : ?>
        <ul class="who__list">
          <?php foreach ($list as $item) : ?>
            <li class="who__item">
              <span><?= $item['text']; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if ($advantages && !empty($advantages)) : ?>
        <div class="who__wrapper">
          <?php foreach ($advantages as $advantage) : ?>
            <div class="who__info">
              <h4 class="who__info-title"><?= $advantage['number']; ?></h4>
              <p class="who__info-text">
                <?= $advantage['text']; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?> 

      <?php if ($button && !empty($button['link']) && (!empty($button['title_black']) || !empty($button['title_blue']))) : ?>
        <div class="wrapper__btn who__btn who__btn-animate-js">
            <div class="btn">
                <a href="<?= $button['link']; ?>" class="btn__link">
                    <div class="btn__arrow ">
                        <svg class="btn__arrow-icon who__btn__arrow-icon" viewBox="0 0 22 22" width="22" height="22" fill="none">
                            <path class="arrowRightanimate" d="M3.375 10.8H18.225" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            <path class="arrowRightanimate" d="M12.1504 4.7251L18.2254 10.8001L12.1504 16.8751" stroke="currentColor" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="btn__text who__btn-text">
                      <?= $button['title_black']; ?>
                      <span><?= $button['title_blue']; ?></span>
                    </p>
                </a>
            </div>
        </div>
      <?php endif; ?> 
    </div>
  </section>
