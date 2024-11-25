// Hover dos textos
var textos = document.querySelectorAll(".navitem")
textos.forEach(function(texto){

    texto.addEventListener('mouseenter', function(){
        
        var tamanho = getComputedStyle(texto).fontSize

        tamanho = Number(tamanho.match(/\d+(\.\d+)?/g))
        
        tamanho *= 1.15

        texto.style.fontSize = `${tamanho}px`
        

    })

    texto.addEventListener('mouseleave', function(){
        
        texto.style.fontSize = `clamp(1rem, 1.2vw + 0.1rem, 3rem)`

    })

})




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
    hamburguer.style.display = "block"
    
    setTimeout(function() {
        overlay.style.display = "none";
    }, 100);
    body.classList.toggle("no_scroll")
    
})
