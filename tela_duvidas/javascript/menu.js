var abrir = document.querySelector("#abrir")
var fechar = document.querySelector("#fechar")
var menu = document.querySelector(".menu_container")
var overlay = document.querySelector("#overlay")
var body = document.querySelector("body")
var hamburguer = document.querySelector("#label_hamburguer img")


abrir.addEventListener("change", function(){

    menu.classList.toggle("ativar_menu", abrir.checked)
    body.classList.toggle("no_scroll")
    hamburguer.style.display = "none"
    
    setTimeout(function() {
        overlay.style.display = "block";
    }, 100);
    
})


fechar.addEventListener("change", function(){
    
    menu.classList.toggle("ativar_menu", abrir.checked)
    body.classList.toggle("no_scroll")
    hamburguer.style.display = "block"

    setTimeout(function() {
        overlay.style.display = "none";
    }, 100);
    
})