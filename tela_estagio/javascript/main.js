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
var fileError = document.querySelector("#file-error")

input.addEventListener('change', function(){
    var file = input.files[0];
    var desc = document.querySelector("#tfile #desc");

    
    if (file) {
        console.log(file)
        if (file.type === "application/pdf") {
            desc.innerHTML = file.name;
            fileError.textContent = "";
            fileError.style.display = "none";
        } else {
            desc.innerHTML = "Selecione um arquivo PDF...";
            fileError.textContent = "Por favor, selecione apenas arquivos PDF.";
            fileError.style.display = "block";
            input.value = ""; 
        }
    } else {
        desc.innerHTML = "Selecione um arquivo PDF...";
        fileError.textContent = "";
        fileError.style.display = "none";
    }
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

    if (email.value !== cemail.value) {
        cemail.style.border = "2px solid #D14B4B"
        confirmar.innerHTML = "Email não confere"
    } else {
        cemail.style.border = "none"
        confirmar.innerHTML = ""
    }
}
