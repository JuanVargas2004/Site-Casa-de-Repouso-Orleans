document.addEventListener("DOMContentLoaded", function () {
    // Seletores para e-mail
    var email = document.getElementById("email");
    var emailConfirm = document.getElementById("email_confirm");
    var mensagemEmailErro = document.getElementById("email-confirm-message");

    // Seletores para senha
    var password = document.getElementById("password");
    var passwordConfirm = document.getElementById("password_confirm");
    var mensagemPasswordErro = document.getElementById("password-confirm-message");

    // Eventos para e-mail
    email.addEventListener("input", verificarEmail);
    emailConfirm.addEventListener("input", verificarEmail);

    // Eventos para senha
    password.addEventListener("input", verificarSenha);
    passwordConfirm.addEventListener("input", verificarSenha);

    // Função para validar e-mails
    function verificarEmail() {
        if (email.value !== emailConfirm.value) {
            emailConfirm.style.border = "2px solid red";
            mensagemEmailErro.textContent = "Os e-mails não conferem.";
            mensagemEmailErro.style.visibility = "visible";
        } else {
            emailConfirm.style.border = "2px solid green";
            mensagemEmailErro.textContent = "email confere";
            mensagemEmailErro.style.visibility = "hidden";
        }
    }

    // Função para validar senhas
    function verificarSenha() {
        if (password.value !== passwordConfirm.value) {
            passwordConfirm.style.border = "2px solid #D14B4B";
            mensagemPasswordErro.textContent = "As senhas não conferem.";
            mensagemPasswordErro.style.visibility = "visible";
        } else {
            passwordConfirm.style.border = "2px solid #4CAF50";
            mensagemPasswordErro.textContent = "";
            mensagemPasswordErro.style.visibility = "hidden";
        }
    }
});
