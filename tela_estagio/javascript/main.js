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

// Adicionando nome do arquivo na label
var input = document.querySelector("#curriculo")

input.addEventListener('change', function(){
    var nome_arquivo = input.files[0]['name']
    

    var desc = document.querySelector("#tfile #desc")
    desc.innerHTML = nome_arquivo
    // desc.style.fontStyle = "normal"

})


// Adicionando mascara ao telefone usando jquery
$("#tel").mask('(00) 00000-0000')


// Fazendo verificação de email

var email = document.querySelector("#email")
var cemail = document.querySelector("#cemail")
var confirmar = document.querySelector("#confirmar")

email.addEventListener('input', verificarEmail)
cemail.addEventListener('input', verificarEmail)

function verificarEmail() {
    if (email.value !== cemail.value && cemail.value !== "") {
        confirmar.textContent = "Emails não conferem"
        confirmar.style.display = "block"
    } else {
        cemail.style.border = "none"
        confirmar.textContent = ""
        confirmar.style.display = "none"
    }
}
