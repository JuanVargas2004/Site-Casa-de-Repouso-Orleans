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


var img = document.querySelector("#seta_voltar")

img.addEventListener('mouseenter', function(){
    img.style.transform = "scale(1.2)"
})

img.addEventListener('mouseleave', function(){
    img.style.transform = "scale(1)"
})
