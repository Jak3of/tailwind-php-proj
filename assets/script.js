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

function deleteCategory(id) {
    modal.setAttribute("data-id", id);
    document.getElementById("modal").classList.toggle("hidden")
    
}

function deleteArticle(id) {
    modal.setAttribute("data-id", id);
    document.getElementById("modal").classList.toggle("hidden")
}

function confirmDeleteCategory() {

    document.getElementById("modal").classList.toggle("hidden")

    let id = modal.getAttribute("data-id") ? modal.getAttribute("data-id") : null
    if (id) {
        let url = "request/q_category.php?id_category=" + id
        window.location.href = url
    }
}
function confirmDeleteArticle() {
    document.getElementById("modal").classList.toggle("hidden")

    let id = modal.getAttribute("data-id") ? modal.getAttribute("data-id") : null
    if (id) {
        let url = "request/q_article.php?id_article=" + id
        window.location.href = url
    }
}

function cancelDeleteCategory() {
    document.getElementById("modal").classList.toggle("hidden")
    modal.removeAttribute("data-id");
}

function cancelDeleteArticle() {
    document.getElementById("modal").classList.toggle("hidden")
    modal.removeAttribute("data-id");
}