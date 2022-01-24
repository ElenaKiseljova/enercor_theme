<?php 
  /*
    Template Name: Projects
  */
?>

<?php 
  get_header(  );
?>

<main class="main">

    <?php 
      get_template_part( 'template-parts/projects/main' );

      get_template_part( 'template-parts/projects/stages' );

      get_template_part( 'template-parts/projects/phases' );

      get_template_part( 'template-parts/projects/completed' );
    ?>

    
    <section class="reference">
        <div class="container">
            <h3 class="reference__title title">references</h3>
            <p class="reference__subtitle">
                Over the years our team interacted, partnered, and
                worked with truly outstanding professionals worldwide </p>


            <div class="reference__wrapper">
                <div class="reference__info">
                    <div class="reference__icon">
                        <img class="reference__img" src="<?= get_template_directory_uri(); ?>/assets/img/reference-1.png" alt="reference 1">
                    </div>
                    <div class="reference__info-about">
                        <div class="reference__about">
                            <div class="reference__about-wrap">
                                <h4 class="reference__about-name">Yariv Dafna</h4>
                                <p class="reference__about-prof">Former President and
                                    CFO of Telit </p>
                            </div>
                            <a href="https://www.linkedin.com/in/yarivdafna" class="reference__about-link">https://www.linkedin.com/in/yarivdafna
                            </a>
                        </div>

                        <p class="reference__about-text">We’ve actively interacted with Alexey and the most of Enercor’s
                            team during their international assignment to manage Automotive Connectivity company. We
                            have clearly seen on our side an incredible speed with which the operational activity of the
                            company they’ve been managing has been completely restored and
                        </p>
                        <a href="#" class="reference__about-link">read more </a>
                    </div>
                </div>

                <div class="reference__info">
                    <div class="reference__icon">
                        <img class="reference__img" src="<?= get_template_directory_uri(); ?>/assets/img/reference-2.png" alt="reference 2">
                    </div>
                    <div class="reference__info-about">
                        <div class="reference__about">
                            <div class="reference__about-wrap">
                                <h4 class="reference__about-name">Dan Coppel</h4>
                                <p class="reference__about-prof">Partner Morrison and Foerster LLP</p>
                            </div>
                            <a href="https://www.mofo.com/people/dan-coppel" class="reference__about-link">https://www.mofo.com/people/dan-coppel </a>
                        </div>

                        <p class="reference__about-text">Alexey and his team are very experienced management
                            professionals capable of delivering results on ambitious projects. Alexey excels when
                            leading cross border deals and can cut through red tape and bureaucracy to get complex deals
                            done. I’ve known him for 15 years.
                        </p>
                        <a href="#" class="reference__about-link">read more </a>
                    </div>
                </div>

                <div class="reference__info">
                    <div class="reference__icon">
                        <img class="reference__img" src="<?= get_template_directory_uri(); ?>/assets/img/reference-3.png" alt="reference 3">
                    </div>
                    <div class="reference__info-about">
                        <div class="reference__about">
                            <div class="reference__about-wrap">
                                <h4 class="reference__about-name">Eivind Diupedal</h4>
                                <p class="reference__about-prof">Former Vice President Сargill Inc</p>
                            </div>
                            <a href="https://www.linkedin.com/in/eivind-djupedal" class="reference__about-link">https://www.linkedin.com/in/eivind-djupedal </a>
                        </div>

                        <p class="reference__about-text">I know Alexey for over 30 years and can definitely say he is
                            one of the most result oriented, effective and eager to meet new challenges that I have ever
                            worked with.

                        </p>
                        <a href="#" class="reference__about-link">read more </a>
                    </div>
                </div>

                <div class="reference__info">
                    <div class="reference__icon">
                        <img class="reference__img" src="<?= get_template_directory_uri(); ?>/assets/img/reference-4.png" alt="reference 4">
                    </div>
                    <div class="reference__info-about">
                        <div class="reference__about">
                            <div class="reference__about-wrap">
                                <h4 class="reference__about-name">Nick Cherryman</h4>
                                <p class="reference__about-prof">Partner at Kobre & Kim </p>
                            </div>
                            <a href="https://kobrekim.com/people/nick-cherryman?" class="reference__about-link">https://kobrekim.com/people/nick-cherryman? </a>
                        </div>

                        <p class="reference__about-text">Having known Alexey for number of years I was recently engaged
                            with Alexey and his team at one of their large international projects. I’ve seen them making
                            an enormous work of analyzing the sophisticated international M&A transaction for
                            potentially fraudulent activity with aim to claim the losses for their

                        </p>
                        <a href="#" class="reference__about-link">read more </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php 
  get_footer(  );
?>