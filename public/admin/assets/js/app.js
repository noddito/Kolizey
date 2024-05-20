// core version + navigation, pagination modules:
import Swiper from 'swiper/bundle';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css/bundle';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// init Swiper:
const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'vertical',
    loop: true,

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
