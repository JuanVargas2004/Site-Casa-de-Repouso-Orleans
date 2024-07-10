var contador = 1


setInterval(function(){
    if(contador > 4){
        contador = 1;
    }
    
    var radio = document.getElementById('radio' + contador);
    radio.checked = true
    contador ++


}, 3000)



setInterval(function(){

    label1 = document.getElementById("label1")
    label2 = document.getElementById("label2")
    label3 = document.getElementById("label3")
    label4 = document.getElementById("label4")

    radio1 = document.getElementById("radio1")
    radio2 = document.getElementById("radio2")
    radio3 = document.getElementById("radio3")
    radio4 = document.getElementById("radio4")


    if(radio1.checked){
        label1.style.backgroundColor = "#4c6a2077"
    } else{
        label1.style.backgroundColor = ""
    }


    if(radio2.checked){
        label2.style.backgroundColor = "#4c6a2077"
    } else{
        label2.style.backgroundColor = ""
    }


    if(radio3.checked){
        label3.style.backgroundColor = "#4c6a2077"
    } else{
        label3.style.backgroundColor = ""
    }


    if(radio4.checked){
        label4.style.backgroundColor = "#4c6a2077"
    } else{
        label4.style.backgroundColor = ""
    }

}, 3000)