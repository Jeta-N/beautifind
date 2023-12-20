const swiperTimeDate = new Swiper('.swiper-time', {
    direction: 'horizontal',
    loop: false,

    slidesPerView: 3.5,
    spaceBetween: 5,

    navigation: {
        nextEl: ".time-book-next",
        prevEl: ".time-book-prev",
    },
})
