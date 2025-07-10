/* index.php
**** Instruções para abrir e fechar modal do formulários de login e cadastro ****
*/
let openModal = document.querySelectorAll(".open-modal");

openModal.forEach(button => {

    // Se houver um evento de click
    button.addEventListener('click', () => {

        // Vou pegar o atributo data-modal
        const modal = button.dataset.modal;
        // Pegar o id do dialog que tem o nome igual ao valor inserido no atributo data-modal:
        const modalId = document.getElementById(modal);

        modalId.showModal();
    });
});

// Agora o mesmo para fechar o modal aberto
const closeModal = document.querySelectorAll('.close-modal');

closeModal.forEach(button => {
    button.addEventListener('click', () => {

        const modal = button.dataset.modal;
        const modalId = document.getElementById(modal);

        modalId.close();
    });
});

// Código para botões de navegação dentro do modal
const navModal = document.querySelectorAll(".nav-modal");

navModal.forEach(button => {
    // Se houver um click neste button
    button.addEventListener('click', () => {
        // Verifica o valor do atributo data-modal
        const modalGoOpen = button.dataset.modal;

        // Pegar o modal que queremos abrir
        const modalId = document.getElementById(modalGoOpen);


        if (modalGoOpen == "modal-1") {
            // console.log("Vamos abrir o login");
            const modalGoClose = document.getElementById("modal-2");

            // Vamos fechar este modal:
            modalGoClose.close();

            // Agora vamos abrir o modal-1
            modalId.showModal();


        }
        else {
            // console.log("Vamos abrir o cadastro");
            const modalGoClose = document.getElementById("modal-1");
            // Vamos fechar este modal:
            modalGoClose.close();

            // Agora vamos abrir o modal-1
            modalId.showModal();
        }
    });
});

// ********************** Informar que email já cadastrado **********************
// Passa o valor do PHP para o JavaScript
const phpData = document.getElementById('emailMessage');
const variable = parseInt(phpData.dataset.variable);

// Verifica e manipula o span
if (variable === 1) {
    const modalCad = document.getElementById("modal-2");
    modalCad.showModal();
    phpData.style.display = "inline";
    phpData.style.color = "red";
    phpData.innerText = "Email já cadastrado";
} else{
    phpData.sytle.disply = "none";    
}
// ********************** /informe de cadastro *************************
/* /index.php */

/* ************************************************************************ */
/* store */
const botao_menu_lateral = document.getElementById('botao-menu-lateral')
const menu_lateral = document.getElementById('menu-lateral')
var menu_lateral_ativado = false

botao_menu_lateral.addEventListener('click', botao => {
    if (!menu_lateral_ativado) {
        botao.target.title = 'Ocultar Menu'
        botao.target.disabled = true
        botao.target.style.transform = 'translateX(265px)'
        botao.target.style.transition = '0.5s ease'
        menu_lateral.style.transform = 'translateX(0)'
        menu_lateral.style.transition = '0.5s all ease'

        setTimeout(() => {
            botao.target.style.transform = 'translateX(265px) rotate(-180deg)'
        }, 800)
        setTimeout(() => {
            botao.target.style.backgroundImage = 'url("assets/img/store/products/button-close-menu.png")'
            botao.target.disabled = false
        }, 1600)

        menu_lateral_ativado = true
    } else {
        botao.target.title = 'Mostrar Menu'
        botao.target.disabled = true
        botao.target.style.transform = 'translateX(0)'
        botao.target.style.transition = '0.5s ease'
        menu_lateral.style.transform = 'translateX(-100%)'
        menu_lateral.style.transition = '0.5s all ease'

        setTimeout(() => {
            botao.target.style.transform = 'rotate(0)'
        }, 800)
        setTimeout(() => {
            botao.target.style.backgroundImage = 'url("assets/img/store/products/menu_button.png")'
            botao.target.disabled = false
        }, 1600)

        menu_lateral_ativado = false
    }
})

/* /store */
/* ********************************************************************* */

