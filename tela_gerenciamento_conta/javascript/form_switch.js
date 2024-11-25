document.addEventListener('DOMContentLoaded', function() {
    const formDesktop = document.getElementById('pessoal_desktop');
    const formMobile = document.getElementById('pessoal_mobile');
    const mainElement = document.querySelector('main');
    const labelDelete = document.querySelector('.label_delete');

    function switchForms() {
        if (window.innerWidth <= 675) {
            if (formDesktop.parentNode) {
                formDesktop.remove();
            }
            if (!formMobile.parentNode) {
                mainElement.insertBefore(formMobile, labelDelete);
            }
        } else {
            if (formMobile.parentNode) {
                formMobile.remove();
            }
            if (!formDesktop.parentNode) {
                mainElement.insertBefore(formDesktop, labelDelete);
            }
        }
    }

    // Executa quando a página carrega
    switchForms();

    // Executa quando a janela é redimensionada
    window.addEventListener('resize', switchForms);
});
