const swiperPortofolio = new Swiper('.swiper-portfolio', {
    direction: 'horizontal',
    loop: true,

    slidesPerView: 3,
    spaceBetween: 30,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        450: {
            slidesPerView: 2,
            spaceBetween: 15
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        }
    }
})

document.addEventListener('DOMContentLoaded', function () {
    const successModal = document.getElementById('successBookModal');
    if (successModal) {
        const modal = new bootstrap.Modal(successModal)
        modal.show();
    }
});
