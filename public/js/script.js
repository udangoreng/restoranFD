'use strict';

const preloader = document.querySelector("[data-preload]");

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
    document.getElementById("header").style.visibility = '';
    document.getElementById("floatingCartBtn").style.visibility = '';
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
let isDragging = false;
let startX = 0;
let scrollLeft = 0;

// ====== UNTUK MOUSE (DESKTOP) ======
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

// ====== UNTUK TOUCH (HP) ======
track.addEventListener("touchstart", (e) => {
  isDragging = true;
  startX = e.touches[0].pageX - track.offsetLeft;
  scrollLeft = position;
  track.style.transition = "none"; // Matiin transition biar smooth drag
});

track.addEventListener("touchmove", (e) => {
  if (!isDragging) return;
  e.preventDefault();
  
  const x = e.touches[0].pageX - track.offsetLeft;
  const walk = (x - startX) * 2; // Multiply for faster movement
  
  position = scrollLeft - walk;
  
  // Reset position ketika sampai ujung
  if (Math.abs(position) >= resetPoint) {
    position = 0;
  }
  
  track.style.transform = `translateX(${position}px)`;
});

track.addEventListener("touchend", () => {
  isDragging = false;
  track.style.transition = "transform 0.3s ease"; // Kembalikan transition
});

// ====== AUTO SCROLL (OPSIONAL) ======
let autoScrollInterval;

function startAutoScroll() {
  autoScrollInterval = setInterval(() => {
    position -= 1; // Scroll pelan-pelan
    
    if (Math.abs(position) >= resetPoint) {
      position = 0;
    }
    
    track.style.transform = `translateX(${position}px)`;
  }, 50); // Setiap 50ms
}

function stopAutoScroll() {
  clearInterval(autoScrollInterval);
}

// Auto scroll ketika gak ada interaksi
startAutoScroll();

// Stop auto scroll ketika user interaksi
track.addEventListener("mouseenter", stopAutoScroll);
track.addEventListener("touchstart", stopAutoScroll);
track.addEventListener("mouseleave", startAutoScroll);
track.addEventListener("touchend", () => {
  setTimeout(startAutoScroll, 3000); // Start lagi setelah 3 detik
});