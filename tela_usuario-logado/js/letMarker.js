let marker = document.querySelector('#marker');
let item = document.querySelectorAll('nav a');

function Indicator(e){
    maarker.style.left = e.offsetLeft + 'px';
    maarker.style.width = e.offsetWidth + 'px';
}


item.forEach(link => {
    link.addEventListener('click', (e) => {
        Indicator(e.target);
    })
});