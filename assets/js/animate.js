gsap.registerPlugin(ScrollTrigger);








const defs = {
    duration: 0.5,
};

const scrollTriggerInstance = (el, animation) => {
    return ScrollTrigger.create({
        animation,
        trigger: el,
        start: "top center",

    });
};
const animate = (el, items) => {
    const tl = gsap.timeline(defs);
    gsap.set(items, {opacity: 0});
    tl.fromTo(
        items,
        {yPercent: 30, opacity: 0},
        {yPercent: 0, opacity: 1, stagger:0.5}
    );
    return tl;
};

const animateStartScreenText = (el, items) => {
    const tl = gsap.timeline(defs);
    gsap.set(items, {opacity: 0});
    tl.fromTo(
        items,
        {yPercent: 30, opacity: 0},
        {yPercent: 0, opacity: 1, stagger:0.5,duration:1}
    );
    return tl;
};
const animateDecor = (el, items, param) => {
    const tl = gsap.timeline(defs);
    tl.fromTo(
        items,
        {x: innerWidth * (param ? 1 : -1)},
        {x: 0, stagger:0.2, duration:1}
    );
    scrollTriggerInstance(el, tl);
    return tl;
};
const animateDecorReverse = (el, items, param) => {
    const tl = gsap.timeline(defs);
    tl.fromTo(
        items,
        {x: innerWidth * (param ? 1 : -1)},
        {x: 0, stagger:0.2,duration:2},
    );
    scrollTriggerInstance(el, tl);
    return tl;
};

const animateSection = (el, items) => {
    const tl = gsap.timeline(defs);
    gsap.set(items, {opacity: 0});
    tl.fromTo(
        items,
        {yPercent: 30, opacity: 0},
        {yPercent: 0, opacity: 1, stagger:0.5, duration: 1}
    );
    scrollTriggerInstance(el, tl);
    return tl;
};



/*Main*/
animate(".header", '.header__container');
animateStartScreenText(".container", ".start-screen-animate-js");
animateDecor('.start-screen', ".screen-text1-js", false);
animateDecorReverse('.start-screen', ".screen-text2-js", true);
animateSection(".who", ".who__item");
animateSection(".who__item", ".who__info");
animateSection(".who__wrapper",".who__btn-animate-js");
animateSection(".team", ".team__wrap");
animateDecor(".ceo", ".ceo__img");
animateSection(".ceo", ".ceo__about>*");
animateDecor('.ceo__about', ".ceo__decoration-js1", false);
animateDecorReverse('.ceo__about', ".ceo__decoration-js2", true);
animateSection(".services", ".services__wrap");
animateSection('.services', ".services__info");
animateSection(".projects", ".projects__text");
animateSection(".projects", ".projects__wrap");
animateSection(".projects", ".projects__btn-link");
animateSection(".selected", ".selected__info");
animateSection(".selected", ".selected__card");
animateSection(".footer", ".footer__title");
animateSection(".footer", ".footer__wrapper-btn");
animateSection(".footer", ".footer__navigation-city-list>*");
animateSection(".footer", ".footer__logo");
animateSection(".footer", ".footer__social-network-list>*");
animateSection(".footer", ".footer__navigation-pages-list>*");

/*Enercor*/
animateSection(".brief", ".brief__wrap>*");
animateSection(".brief", ".brief__info");

animateSection(".experience", ".experience__wrap>*");
animateSection(".experience", ".experience__services>*");

animateSection(".mission", ".mission__wrap>*");
animateSection(".mission", ".mission__circle-item");
animateSection(".mission", ".mission__wrapper-btn");

animateSection(".exertise--history", ".history__wrap>*");
animateSection(".exertise--history", ".history__develop>*");


/*Services*/
animateSection(".services-info", ".services-info__container>*");
animateSection(".services-description", ".services-description__text");

/*Service*/
animateSection(".start-screen__service", ".service__circle-item");
animateSection(".corporate", ".corporate__wrap>*");
animateSection(".corporate", ".corporate__info");
animateSection(".clients", ".clients__circle-item");
animateSection(".clients", ".clients__wrap-text>*");
animateSection(".clients", ".clients__wide-range>*");
animateSection(".exertise", ".exertise__wrap>*");
animateSection(".exertise", ".exertise__unique>*");
animateSection(".ability", ".ability__title");
animateSection(".ability", ".ability__list-js>*");
animateSection(".exertise--animate", ".exertise__wrap-js");
animateSection(".exertise--animate", ".exertise__wrap-js");
animateSection(".industrial", ".industrial__list>*");

/*Project*/
animateSection(".start-screen__projects", ".projects__circle>*");
animateSection(".stages", ".stages__circle>*");
animateSection(".phases", ".phases__wrapper>*");
animateSection(".phases", ".phases__card-number");
animateSection(".phases", ".phases__wrap-list>*");
animateSection(".completed-projects", ".completed-projects__subtitle");
animateSection(".completed-projects", ".completed-projects--slide");
animateSection(".reference", ".reference__subtitle");
animateSection(".reference", ".reference__info");

/*Project-page*/
animateSection(".container", ".start-screen__contacts-btn");
animateDecor(".provider", ".provider__price",false);
animateSection(".provider",".provider__content>*");
animateSection(".month", ".month__wrap>*");

/*Vacancies*/
animateSection(".start-screen__contacts",".news-info__notice>*");
animateSection(".vacancies",".vacancies__wrapper>*");

/*News*/
animateSection(".news-info", ".contact__follow-title");
animateSection(".news-info", ".contact__follow-navigation-item");

/*Contact*/
animateSection(".contact", ".contact__title");
animateSection(".contact", ".contact__navigation-item");
animateSection(".contact", ".contact__questions");
animateSection(".contact", ".contact__form>*");

/*Publication*/
animateSection(".publication-start-screen",".publication-start-screen__btn");

/* Shavrov */
animateSection(".about", ".about__headline");
animateSection(".about", ".about__name");
animateSection(".about", ".about__item");
animateSection(".about", ".about__text");
animateSection(".about", ".about__links>*");
animateSection(".about", ".about__numbers-item>*");
animateSection(".about", ".about__img");
animateSection(".expertise", ".expertise__item");
animateSection(".biography", ".biography__content>*");
animateSection(".publications", ".publications__item");



















