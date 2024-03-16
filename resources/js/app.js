import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.js'
import jQuery from "jquery";
import axios from 'axios';
import Swiper from 'swiper';

window.axios = axios;
window.jQuery = jQuery;
window.Swiper = Swiper;


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

