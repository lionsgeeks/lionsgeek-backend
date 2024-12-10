import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



let menu = document.querySelector(".toggle")
let sideBar = document.querySelector(".side-bar")

menu.addEventListener("click", () => {
    sideBar.classList.remove("left-[-700px]")
    sideBar.classList.toggle("active");
  });
