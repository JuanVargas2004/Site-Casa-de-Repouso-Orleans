window.addEventListener('scroll', function(){
    var header = document.querySelector('#header')
    header.classList.toggle('rolagem', window.scrollY > 0)
    
    var navbar = document.querySelector('#navbar')
    var logo = document.querySelector('#logo')
    
    if(window.scrollY > 0){
        navbar.style.transform = 'scale(0.8) translateX(4vw)'
        logo.style.transform = 'scale(0.6)'
        
        logo.addEventListener('mouseover', function(){ 
            this.style.transform = 'scale(0.72)'
        })
        
        
        logo.addEventListener('mouseout', function(){
            this.style.transform = 'scale(0.6)'
        })
        
    } else {
        logo.style.transform = 'scale(1)  translateX(0)'
        navbar.style.transform = 'scale(1) translate(0)'
        
        logo.addEventListener('mouseover', function(){
            this.style.transform = 'scale(1.2)'
        })
        
        logo.addEventListener('mouseout', function(){
            this.style.transform = 'scale(1)'
        })
    }

})


window.addEventListener("scroll", function(){

    var botao = document.querySelector("#botao")
    botao.classList.toggle('btnrolagem', window.scrollY > 0)

})

