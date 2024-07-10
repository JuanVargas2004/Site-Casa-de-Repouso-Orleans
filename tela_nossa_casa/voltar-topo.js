window.addEventListener("scroll", function () {
  var botao = document.querySelector("#botao");
  botao.classList.toggle("btnrolagem", window.scrollY > 0);
});
