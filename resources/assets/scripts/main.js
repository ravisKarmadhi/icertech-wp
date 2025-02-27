import $ from 'jquery';
import '@popperjs/core';
import '@fancyapps/fancybox';
import 'bootstrap/dist/js/bootstrap';
import 'select2/dist/js/select2.min.js';

import { App } from './parts/app.js'
import { Plugins } from './parts/plugins.js'
import { Parts } from './parts/parts.js'
import { Header } from './parts/header.js';
import { Tabs } from './parts/tabs.js';
import { Slick } from './parts/slick.js';
import { Filter } from './parts/filter.js';
import { Truncate } from './parts/truncate.js';
import { Accordion } from './parts/accordion.js';
import { Handlebar } from './parts/handlebar.js';
import { Cart } from './parts/cart.js';
import Aos from 'aos';


// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;

$(function () {

  window.windowWidth = $(window).width();
  window.windowHeight = $(window).height();

  window.isiPhone = navigator.userAgent.toLowerCase().indexOf('iphone');
  window.isiPad = navigator.userAgent.toLowerCase().indexOf('ipad');
  window.isiPod = navigator.userAgent.toLowerCase().indexOf('ipod');

  //Functions List Below

  window.app = new App();
  window.app.init();

  window.plugins = new Plugins();
  window.plugins.init();

  window.parts = new Parts();
  window.parts.init();

  window.header = new Header();
  window.header.init();

  window.tabs = new Tabs();
  window.tabs.init();

  window.slick = new Slick();
  window.slick.init();

  window.filter = new Filter();
  window.filter.init();

  window.truncate = new Truncate();
  window.truncate.init();

  window.accordion = new Accordion();
  window.accordion.init();

  window.handlebar = new Handlebar();
  window.handlebar.init();

  window.cart = new Cart();
  window.cart.init();
});

// ===========================================================================
jQuery(document).ready(function ($) {
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });
  $('.leftright-img').fancybox();
});

$(document).ready(function () {
  Aos.init({
    once: true,
  });
});