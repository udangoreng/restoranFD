'use strict';

const preloader = document.querySelector("[data-preload]");

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
    document.getElementById("header").style.visibility = '';
});

const addEventOnElements = function (elements, eventType, callback) {
    for (let i = 0, len = elements.length; i < len; i++) {
        elements[i].addEventListener(eventType, callback);
    }
};

const mobileMenu = document.querySelector("#mobile-menu");
const bar = document.querySelector("#bar");
const overlay = document.querySelector("#overlay");

bar.addEventListener("click", () => {
    mobileMenu.classList.toggle("active");
    overlay.classList.toggle("active");
});

overlay.addEventListener("click", () => {
    mobileMenu.classList.remove("active");
    overlay.classList.remove("active");
});

const track = document.getElementById("galleryTrack");
const hoverLeft = document.getElementById("hoverLeft");
const hoverRight = document.getElementById("hoverRight");

let position = 0;
const speed = 6;
const resetPoint = track.scrollWidth / 2; 

hoverRight.addEventListener("mousemove", () => {
  position -= speed;

  if (Math.abs(position) >= resetPoint) {
    position = 0; 
  }

  track.style.transform = `translateX(${position}px)`;
});

hoverLeft.addEventListener("mousemove", () => {
  position += speed;

  if (position >= 0) {
    position = -resetPoint;
  }

  track.style.transform = `translateX(${position}px)`;
});
