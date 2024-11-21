var inputFile = document.getElementById('arquivo');
var label = document.querySelector('#campo label')

inputFile.addEventListener('change', () => {
    var nome_arquivo = inputFile.files[0].name;

    label.textContent = nome_arquivo;
});