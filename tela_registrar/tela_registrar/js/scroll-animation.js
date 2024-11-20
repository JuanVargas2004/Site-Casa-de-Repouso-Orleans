const scrollAnima = document.querySelector('[data-anima="scroll"]');

const metadadeWindow = window.innerHeight * 1.1;

console.log(metadadeWindow);

function animarScroll() {
  const topoItem = scrollAnima.getBoundingClientRect().top;

  const ItemVisivel = topoItem - metadadeWindow < 0;

  if (ItemVisivel) {
    scrollAnima.classList.add("show-botton");
  } else {
    scrollAnima.classList.remove("show-botton");
  }

  //   console.log(topoItem);
}

window.addEventListener("scroll", animarScroll);
