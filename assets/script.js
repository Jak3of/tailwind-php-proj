document.addEventListener("DOMContentLoaded", function (event) {

    document.getElementById("boton-menu").addEventListener("click", function () {
        document.getElementById("sidebar").classList.toggle("hidden")
        document.getElementById("boton-menu-close").classList.toggle("hidden")
    })
    document.getElementById("boton-menu-close").addEventListener("click", function () {
        document.getElementById("sidebar").classList.toggle("hidden")
        document.getElementById("boton-menu-close").classList.toggle("hidden")
    })

    document.getElementById("boton-submenu").addEventListener("click", function () {

        document.getElementById("submenu").classList.toggle("hidden")

    })





})