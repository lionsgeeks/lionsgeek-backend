import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

let menu = document.querySelector(".toggle");
let sideBar = document.querySelector(".side-bar");

menu.addEventListener("click", () => {
    sideBar.classList.remove("left-[-700px]");
    sideBar.classList.toggle("active");
});

let sendNewsButton = document.querySelector("#sendNews");
sendNewsButton.addEventListener("click", () => {
    // console.log(this);
    const sendNews = () => {
        document.querySelector("#newsForm").submit();
        fetch("/api/queue")
            .then((response) => response.json())
            // .then((data) => alert(data.message))
            .catch((error) => console.error("Error:", error));
    };
    sendNews();
});
