const swiper = new Swiper('.sobhan', {
    // Optional parameters
    slidesPerView: servicesSwiperSetting.slidesPerView,
    slidesPerGroup: servicesSwiperSetting.slidesPerGroup,
    direction: 'horizontal',
    loop: servicesSwiperSetting.loop,
    spaceBetween: servicesSwiperSetting.spaceBetween,

    // If we need pagination
    pagination: {
        enabled: true,
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});


// const swiperTwo = new Swiper('.sobhan2', {
//     // Optional parameters
//     slidesPerView: 1,
//     slidesPerGroup: 1,
//     direction: 'horizontal',
//     loop: false,
//     spaceBetween: 10,
//     createElements: false,
//     effect: 'creative',
//
//     // If we need pagination
//     pagination: {
//         enabled: true,
//         el: '.swiper-pagination2',
//     },
//
//     // Navigation arrows
//     navigation: {
//         nextEl: '.swiper-button-next2',
//         prevEl: '.swiper-button-prev2',
//     },
//
//     // And if we need scrollbar
//     scrollbar: {
//         el: '.swiper-scrollbar2',
//     },
// });