var close_overdelete = document.querySelector("#close_overdelete")
var open_overdelete = document.querySelector("#open_overdelete")

var overdelete = document.querySelector("#overdelete")

close_overdelete.addEventListener("change", function(){

    overdelete.style.display = "none"
    overdelete.style.transition = ".5s ease"

})


open_overdelete.addEventListener("change", function(){

    overdelete.style.display = "flex"
    overdelete.style.transition = ".5s ease"

})
