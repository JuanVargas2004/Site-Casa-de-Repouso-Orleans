document.addEventListener('DOMContentLoaded', function() {
    const formDesktop = document.getElementById('pessoal_desktop');
    const formMobile = document.getElementById('pessoal_mobile');
    const mainElement = document.querySelector('main');

    function switchForms() {
        if (window.innerWidth <= 675) {
            // Remove o formulário desktop e adiciona o mobile
            if (formDesktop.parentNode) {
                formDesktop.remove();
            }
            if (!formMobile.parentNode) {
                mainElement.insertBefore(formMobile, document.getElementById('form_login'));
            }
        } else {
            // Remove o formulário mobile e adiciona o desktop
            if (formMobile.parentNode) {
                formMobile.remove();
            }
            if (!formDesktop.parentNode) {
                mainElement.insertBefore(formDesktop, document.getElementById('form_login'));
            }
        }
    }

    // Executa quando a página carrega
    switchForms();

    // Executa quando a janela é redimensionada
    window.addEventListener('resize', switchForms);
});
