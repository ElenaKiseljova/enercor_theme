let hash = false;

document.addEventListener("DOMContentLoaded", function () {

  let flag = false;

  const swiperMain = new Swiper(".swiper-main", {
    slidesPerView: 3,
    spaceBetween: 12,
    // loop: flag,
    breakpoints: {
      320: {
        slidesPerView: "auto",
      },
      1440: {
        slidesPerView: 3,
      },
      1536: {
        slidesPerView: "auto",
      }

    },
    on: {
      init: function () {
        const numberOfSlides = this.slides.length;
        if (numberOfSlides <= 3) {
          flag = false;
          this.disable();
          let wrapper = document.querySelector(".swiper-wrapper").classList.add("wrapper-disabled");
        } else if (numberOfSlides > 3) {
          let wrapper = document.querySelector(".swiper-wrapper").classList.remove("wrapper-disabled");
          this.enable();
          flag = true;
        }
      }
    }
  });

  const teamDesc = document.querySelector('.swiper-team-desc');
  const team = document.querySelector('.swiper-team');

  if (teamDesc && team) {
    const swiperTeamDesc = new Swiper('.swiper-team-desc', {
      slidesPerView: 1,
      spaceBetween: 20,
      speed: 400,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      allowTouchMove: false,
      simulateTouch: false,
      // navigation: {
      //   nextEl: '.team-workers__btn-right',
      //   prevEl: '.team-workers__btn-left',
      // },
    });

    const swiperTeam = new Swiper('.swiper-team', {
      slidesPerView: 'auto',
      spaceBetween: 21,
      speed: 500,
      slideActiveClass: 'team-workers__slide--active',
      loop: true,

      navigation: {
        nextEl: '.team-workers__btn-right',
        prevEl: '.team-workers__btn-left',
      },

      thumbs: {
        swiper: swiperTeamDesc,
      }
    });

    // const lastSlideIndex = swiperTeamDesc.slides.length - 1;

    // swiperTeamDesc.slideTo(lastSlideIndex);
    // swiperTeam.slideTo(lastSlideIndex);
  }


  let header = document.querySelector(".header"),
    startScreen = document.querySelector('.js-start-screen'),
    headerFixed = startScreen.offsetHeight;


  window.onscroll = function () {
    fixed();
  }

  function fixed() {
    //&& window.pageYOffset >= headerFixed
    if (window.scrollY > 0) {
      header.classList.add("header__fixed");
    } else {
      header.classList.remove("header__fixed");
    }
  }

  let hamburger = document.querySelector(".hamburger"),
    nav = document.querySelector(".header__navigation"),
    menuFlag = false,
    bodyDontScroll = document.documentElement,
    mainSection = document.querySelector("main");
  // console.log(bodyDontScroll)

  if (hamburger) {
    hamburger.addEventListener("click", (e) => {
      if (!menuFlag) {

        hamburger.classList.toggle("open");
        nav.classList.toggle("header__navigation--open");
        bodyDontScroll.classList.toggle("body-scroll");
      }
    })
    nav.addEventListener("click", (e) => {
      let target = e.target;
      if (target.classList.contains("header__navigation")) {

        hamburger.classList.toggle("open");
        nav.classList.toggle("header__navigation--open");
        bodyDontScroll.classList.toggle("body-scroll");
      }
    })
  }


  let projectsSlide = document.querySelectorAll(".completed-projects--slide"),
    popupSlide = document.querySelector(".popup"),
    overlay = document.querySelector(".js-overlay-modal"),
    popupClose = document.querySelector(".popup__close");


  window.activateProjectsPopup = (projects) => {
    projects.forEach((item) => {
      item.classList.add('popup-activated');
      item.addEventListener("click", (e) => {
        e.preventDefault();
        const popupHeader = document.querySelector('.popup__header'),
          popupContent = document.querySelector(".popup__content .popup__content-wrap"),
          popupTemplateHeader = item.querySelector(".popup__template-header"),
          popupTemplateContent = item.querySelector(".popup__template-content");
        popupHeader.innerHTML = '';
        popupContent.innerHTML = '';
        popupHeader.appendChild(popupTemplateHeader.content.cloneNode(true));
        popupContent.appendChild(popupTemplateContent.content.cloneNode(true));
        popupSlide.classList.add("popup__show");
        overlay.classList.add("active");
        bodyDontScroll.classList.add("body-scroll");

      })
    });
  };

  window.activateProjectsPopup(projectsSlide);
  if (popupClose) {
    popupClose.addEventListener("click", () => {
      popupSlide.classList.remove("popup__show");
      overlay.classList.remove("active");
      bodyDontScroll.classList.remove("body-scroll");
    })
  }

  document.body.addEventListener('keyup', function (e) {
    var key = e.keyCode;

    if (key == 27) {
      popupSlide.classList.remove("popup__show");
      overlay.classList.remove("active");
      bodyDontScroll.classList.remove("body-scroll");

    }
    ;
  }, false);
  window.addEventListener("click", (e) => {
    let target = e.target;
    if (target.classList.contains("overlay")) {
      popupSlide.classList.remove("popup__show");
      overlay.classList.remove("active");
      bodyDontScroll.classList.remove("body-scroll");
    }
  })


  // Read more (Publications)
  const readMorePublicationAccordeons = document.querySelectorAll('.publication-info__accordion');

  let fullHeights = [];
  let headerHeights = [];

  readMorePublicationAccordeons.forEach((readMorePublicationAccordeon, index) => {
    const fullHeight = readMorePublicationAccordeon.offsetHeight;
    fullHeights.push(fullHeight);

    const header = readMorePublicationAccordeon.querySelector('.publication-info__panel');

    const headerHeight = header.offsetHeight;

    headerHeights.push(headerHeight);

    readMorePublicationAccordeon.style.height = headerHeights[index] + 'px';

    readMorePublicationAccordeon.classList.add('height-set');

    const buttonText = readMorePublicationAccordeon.querySelector('.publication-info__btn-text');

    readMorePublicationAccordeon.addEventListener('click', () => {
      if (!readMorePublicationAccordeon.classList.contains('active')) {
        readMorePublicationAccordeon.style.height = fullHeights[index] + 'px';

        buttonText.textContent = 'Read less';
        readMorePublicationAccordeon.classList.add('active');
      } else {
        readMorePublicationAccordeon.style.height = headerHeights[index] + 'px';

        buttonText.textContent = 'Read more';
        readMorePublicationAccordeon.classList.remove('active');
      }
    });
  });

  // my version accordion
  let accordion = document.querySelectorAll(".vacancies__accordion:not(.disabled)");

  accordion.forEach((item) => {
    item.addEventListener("click", () => {
      const accordionContent = item.querySelector(".vacancies__accordion-content"),
        accordionBtn = item.querySelector(".vacancies__wrapper-btn");


      accordionContent.classList.toggle("show-content");
      accordionBtn.classList.toggle("hide-btn");
      item.classList.toggle("accordion--active");

      if (accordionContent.style.maxHeight) {
        accordionContent.style.maxHeight = null;
      } else {
        accordionContent.style.maxHeight = accordionContent.scrollHeight + "px"
      }
    })
  })

  /* Плавный скролл к элементам */
  window.scrollSmooth = (container = document) => {
    const hrefAttributes = container.querySelectorAll("a[href*='#']");

    let headerHeight = 96;

    const header = document.querySelector('.header');

    if (header) {
      headerHeight = header.offsetHeight;
    }

    const scrollToHash = (hash = false, offset, element = false) => {
      let scrollTarget;

      if (hash) {
        scrollTarget = document.getElementById(hash);
      } else if (element && hrefAttributes && hrefAttributes[element]) {
        scrollTarget = hrefAttributes[element];
      }

      const elementPosition = scrollTarget.getBoundingClientRect().top;
      const offsetPosition = elementPosition - offset;

      window.scrollBy({
        top: offsetPosition,
        behavior: 'smooth',
      });
    };

    const backButton = document.querySelector('.back a');

    if (backButton) {
      backButton.addEventListener('click', (evt) => {
        const backButtonElement = backButton.dataset.element;

        if (backButtonElement && backButtonElement.length > 0) {
          evt.preventDefault();

          scrollToHash(false, headerHeight, backButtonElement);

          backButton.classList.remove('show');
        }
      });
    }

    if (hash) {
      scrollToHash(hash, headerHeight);
    }

    if (hrefAttributes.length > 0) {

      hrefAttributes.forEach((item, i) => {
        const href = item.href.split('#');

        const CURRENT_URL = window.location.origin + window.location.pathname;

        if (href[0] === CURRENT_URL) {
          item.addEventListener('click', (e) => {
            e.preventDefault();

            console.log();

            scrollToHash(href[1], headerHeight);

            if (backButton) {
              backButton.classList.add('show');
              backButton.dataset.element = i;
            }
          });
        }
      });
    }
  };

  window.scrollSmooth();

  console.log("DOM fully loaded and parsed");
});

(() => {
  hash = window.location.hash.split('#')[1];

  window.location.hash = '';
})()