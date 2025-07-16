document.addEventListener('DOMContentLoaded', () => {
  const botao_menu_lateral = document.getElementById('botao-menu-lateral')
  const menu_lateral = document.getElementById('menu-lateral')
  let menu_lateral_visivel = false;

  // Efeito de abrir e fechar o menu lateral
  botao_menu_lateral.addEventListener('click', botao => {
    if (!menu_lateral_visivel) {
      botao.target.title = 'Ocultar Menu'
      botao.target.disabled = true;
      botao.target.style.transform = 'translateX(265px)'
      botao.target.style.transition = '0.5s ease-out'
      menu_lateral.style.transform = 'translateX(0)'
      menu_lateral.style.transition = '0.5s all ease-out'

      setTimeout(() => {
        botao.target.style.transform = 'translateX(265px) scale(-1)'
        botao.target.style.backgroundImage = 'url("img/_outros/x-button.png")'
      }, 1100);

      setTimeout(() => { botao.target.disabled = false }, 1300)

      menu_lateral_visivel = true;
    } else {
      botao.target.title = 'Mostrar Menu'
      botao.target.disabled = true;
      botao.target.style.transform = 'translateX(0)'
      botao.target.style.transition = '0.5s ease-in'
      menu_lateral.style.transform = 'translateX(-100%)'
      menu_lateral.style.transition = '0.5s all ease-in'
      botao.target.style.backgroundImage = 'url("img/_outros/triangle-button.png")'
      
      setTimeout(() => {
        botao.target.style.transform ='rotate(90deg) scale(1)'
        botao.target.disabled = false
      }, 1300);

      menu_lateral_visivel = false
    }
  })
})

// Atualização da seção das compras/carrinho com técnica de AJAX
function ajustarCarrinho(id, acao) {
  const param = acao === 'adicionar' ? 'add' : 'remove'

  fetch(`acao_carrinho.php?${param}=${id}`, {
    credentials: 'same-origin'
  })
  
  .then(resultado => {
    if (!resultado.ok) throw new Error(`HTTP ${resultado.status}`)
    return resultado.json()
  })

  .then(data => {
    // Atualiza o badge do carrinho
    const badge = document.getElementById('badge-carrinho')
    if (badge)
      badge.textContent = data.total

    // Mostra a mensagem de sucesso após adicionar
    if (acao === 'adicionar' && data.adicionado) {
      const msg = document.getElementById('mensagem-feedback')

      if (msg) {
        msg.textContent = 'Produto adicionado ao carrinho!'
        msg.style.display = 'block'
        msg.style.opacity = '1'

        setTimeout(() => {
          msg.style.opacity = '0'
          setTimeout(() => {
            msg.style.display = 'none'
          }, 400)
        }, 3000)
      }
    }

    // Se estiver na página do carrinho, recarrega
    if (window.location.pathname.endsWith('carrinho.php'))
      window.location.reload()
  })
  .catch(err => console.error('Erro ao atualizar carrinho:', err))
}


document.addEventListener('DOMContentLoaded', () => {
  const iniciais = document.querySelectorAll('main article .produto')

  iniciais.forEach((fig, i) => {
    setTimeout(() => fig.classList.add('show'), i * 50)
  })
})

// Ao carregar a página, verifica se já existe categoria salva
document.addEventListener('DOMContentLoaded', () => {
  const saved = sessionStorage.getItem('categoriaSelecionada')
  const id = saved !== null ? parseInt(saved, 10) : 0

  // Marca no menu
  document.querySelectorAll('#menu-lateral li')
    .forEach(li => li.classList.remove('ativa'))
  const selecionado = document.querySelector(`#menu-lateral li[data-categoria="${id}"]`)
  if (selecionado) selecionado.classList.add('ativa')

  // Dispara o filtro se for categoria específica
  if (id !== 0) filtrarCategoria(id)
})

function filtrarCategoria(id) {
  // Salva a escolha do usuário
  sessionStorage.setItem('categoriaSelecionada', id)

  const url = id === 0
    ? 'acao_categorias.php'
    : `acao_categorias.php?categoria=${id}`

  fetch(url)
    .then(res => res.text())
    .then(html => {
      const vitrine = document.querySelector('main article')
      vitrine.innerHTML = html

      const novos = vitrine.querySelectorAll('.produto')
      void vitrine.offsetWidth
      novos.forEach((fig, i) => {
        setTimeout(() => fig.classList.add('show'), i * 50)
      })

      // Marca apenas a categoria clicada
      const categorias = document.querySelectorAll('#menu-lateral li')
      categorias.forEach(li => li.classList.remove('ativa'))

      const selecionado = document.querySelector(`#menu-lateral li[data-categoria="${id}"]`)
      if (selecionado) selecionado.classList.add('ativa')
    })
    .catch(err => console.error(err))
}



document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('moedas-container');
  const moedas = container.querySelectorAll('.moeda');
  const { width: W, height: H } = container.getBoundingClientRect();

  moedas.forEach(el => {
    // pega tamanho do elemento
    const rect = el.getBoundingClientRect();
    const w = rect.width, h = rect.height;

    // calcula posições aleatórias dentro do container
    const x = Math.random() * (W - w);
    const y = Math.random() * (H - h);

    // aplica no CSS
    el.style.left = `${x}px`;
    el.style.top  = `${y}px`;
  });
});
