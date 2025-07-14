/* index.php */

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

/* login.php */



/* /login.php */

