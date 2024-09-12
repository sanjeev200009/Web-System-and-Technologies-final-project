'use strict';

/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  document.body.classList.add("loaded");
});

/**
 * SEARCH
 * 
 */

const triggerOpenButtons = document.querySelectorAll('[trigger-button]');
const overlay = document.querySelector('[data-overlay]');

// Function to open an overlay
const openOverlay = function (targetEl) {
  targetEl.classList.add('active');
  overlay.classList.add('active');
};

// Function to close an overlay
const closeOverlay = function (targetEl) {
  targetEl.classList.remove('active');
  overlay.classList.remove('active');
};

// Iterate over each trigger open button
triggerOpenButtons.forEach((triggerOpenButton) => {
  // Get the target element's id from the button's dataset
  const targetId = triggerOpenButton.dataset.target;
  // Select the target element
  const targetElement = document.querySelector(`#${targetId}`);

  // Add event listener to the trigger open button to open the overlay
  triggerOpenButton.addEventListener('click', () => openOverlay(targetElement));

  // Add event listener to the close button within the target element to close the overlay
  targetElement.querySelector('[close-button]').addEventListener('click', () => closeOverlay(targetElement));

  // Add event listener to the overlay to close when clicked
  overlay.addEventListener('click', () => closeOverlay(targetElement));
});


//mobile-menu submenu
const submenu = document.querySelectorAll('.child-trigger');

submenu.forEach((menu) => {
  menu.addEventListener('click', function(e) {
    e.preventDefault();
    // Remove active class from all other menu items
    submenu.forEach((item) => {
      if (item !== this) {
        item.closest('.has-child').classList.remove('active');
      }
    });
    // Toggle active class on the current menu item's parent
    this.closest('.has-child').classList.toggle('active');
  });
})

const swiper = new Swiper('.sliderbox', {
  
  loop: true,

  // If we need pagination
  pagination: {
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

const carousel = new Swiper('.carouselbox', {
  spaceBetween: 30,
  slidesPerView: 'auto',
  slidesPerGroup: 1,
  centeredSlides: true,

  // If we need navigation
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {
    481: {
      slidesPerView: 2,
      slidesPerGroup: 1,
      centeredSlides: false,
    },
    640: {
      slidesPerView: 3,
      slidesPerGroup: 1,
      centeredSlides: false,
    },
    992: {
      slidesPerView: 4,
      slidesPerGroup: 1,
      centeredSlides: false,
    }
  }
});