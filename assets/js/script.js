document.addEventListener("DOMContentLoaded", function () {

  const swiperMain = new Swiper(".swiper-main", {
    slidesPerView: 3,
    spaceBetween: 12,

    loop: true,
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

    }
  })

  // const swiperGrid = new Swiper(".international-project", {
  //   observer: true,
  //   observeSlideChildren: true,
  //   observeParents: true,

  //   slidesPerView: 3,
  //   grid: {
  //     rows: 2,
  //     fill: 'row',
  //   },
  //   spaceBetween: 27,
  //   breakpoints: {
  //     320: {
  //       slidesPerView: "auto",
  //       grid: {
  //         rows: 1,
  //         fill: 'row',
  //       }
  //     },
  //     1390: {
  //       grid: {
  //         rows: 2,
  //         fill: 'row',
  //       },
  //     }
  //   }
  // });


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
    bodyDontScroll = document.body,
    mainSection = document.querySelector("main");


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
    overlay = document.querySelector(".js-overlay-modal");


  projectsSlide.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();
      const popupHeader = document.querySelector('.popup__header'),
        popupContent = document.querySelector(".popup__content .popup__content-wrap"),

        popupTemplateHeader = item.querySelector(".popup__template-header"),
        popupTemplateContent = item.querySelector(".popup__template-content");

      popupHeader.innerHTML = '';
      popupContent.innerHTML = '';
      popupHeader.appendChild(popupTemplateHeader.content.cloneNode(true));
      popupContent.appendChild(popupTemplateContent.content.cloneNode(true))

      popupSlide.classList.add("popup__show");
      overlay.classList.add("active");
      bodyDontScroll.classList.add("body-scroll");


    })
  })


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


  console.log("DOM fully loaded and parsed");
})