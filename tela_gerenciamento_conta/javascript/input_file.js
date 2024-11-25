var inputFile = document.getElementById('arquivo');
var label = document.querySelector('#campo_desktop label')
var label_mobile = document.querySelector('#campo_mobile label')

inputFile.addEventListener('change', () => {
    var nome_arquivo = inputFile.files[0].name;

    label.textContent = nome_arquivo;
    label_mobile.textContent = nome_arquivo;
});