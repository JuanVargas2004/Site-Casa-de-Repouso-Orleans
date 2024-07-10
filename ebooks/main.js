window.addEventListener("scroll", function(){

    var botao = document.querySelector("#botao")
    botao.classList.toggle('btnrolagem', window.scrollY > 0)

})



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