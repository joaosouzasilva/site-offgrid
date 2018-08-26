var hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click", function() {
    var menu = document.querySelector(".painel_nav");
    if (menu.className === "painel_nav") {
        menu.classList.add("responsivo");
    } else {
        menu.className = "painel_nav";
    }
})