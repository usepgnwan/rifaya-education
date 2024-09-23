import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css/bundle';
const initializeSwipers = () =>{
    if (document.querySelector('.testimoni-carousel')) {
        new Swiper('.testimoni-carousel', {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 30,
        });
    }
    if (document.querySelector('.slide-carousel')) {
        var swipper = new Swiper('.slide-carousel', {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 30,
            modules: [Navigation, Pagination],
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            }
        });


    }
    if (document.querySelector('.slide-carousel-minimal')) {

        var swipper = new Swiper('.slide-carousel-minimal', {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 30,
            modules: [Navigation, Pagination],
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            }
        });


    }

    // if (document.querySelector('.testimoni-carousel')) {
    //     new Swiper('.testimoni-carousel', {
    //         loop: false,
    //         slidesPerView: 1,
    //         spaceBetween: 30,
    //     });
    // }
}



export { initializeSwipers };
