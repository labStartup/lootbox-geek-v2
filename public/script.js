// ——————————————————————————————————————
// Toggle do menu lateral
// ——————————————————————————————————————
document.addEventListener('DOMContentLoaded', () => {
  const botao_menu_lateral = document.getElementById('botao-menu-lateral')
  const menu_lateral = document.getElementById('menu-lateral')
  const barra_de_busca = document.getElementById('busca')
  let menu_lateral_visivel = false

  botao_menu_lateral.addEventListener('click', event => {
    if (!menu_lateral_visivel) {
      event.target.title = 'Ocultar Menu'
      event.target.disabled = true
      event.target.style.transform = 'translateX(265px)'
      event.target.style.transition = '0.5s ease-out'
      barra_de_busca.style.transform = 'translateX(300px)'
      barra_de_busca.style.transition = '0.5s ease-out'
      menu_lateral.style.transform  = 'translateX(0)'
      menu_lateral.style.transition = '0.5s all ease-out'

      setTimeout(() => {
        event.target.style.transform = 'translateX(265px) scale(-1)'
        event.target.style.backgroundImage = 'url("img/_outros/x-button.png")'
      }, 1100)

      setTimeout(() => event.target.disabled = false, 1300)
      menu_lateral_visivel = true

    } else {
      event.target.title = 'Mostrar Menu'
      event.target.disabled = true
      event.target.style.transform  = 'translateX(0)'
      event.target.style.transition = '0.5s ease-in'
      barra_de_busca.style.transform = 'translateX(0)'
      barra_de_busca.style.transition = '0.5s ease-in'
      menu_lateral.style.transform  = 'translateX(-100%)'
      menu_lateral.style.transition = '0.5s all ease-in'
      event.target.style.backgroundImage = 'url("img/_outros/triangle-button.png")'

      setTimeout(() => {
        event.target.style.transform = 'rotate(90deg) scale(1)'
        event.target.disabled = false
      }, 1300)

      menu_lateral_visivel = false
    }
  })
})

// ——————————————————————————————————————
// Ajuste do carrinho (AJAX → acao_carrinho.php)
// ——————————————————————————————————————
function ajustarCarrinho(id, acao) {
  const param = acao === 'adicionar' ? 'add' : 'remove'

  fetch(`acao_carrinho.php?${param}=${id}`, {
    credentials: 'same-origin'
  })
  .then(res => {
    if (!res.ok) throw new Error(`HTTP ${res.status}`)
    return res.json()
  })
  .then(data => {
    // atualiza badge
    const badge = document.getElementById('badge-carrinho')
    if (badge) badge.textContent = data.total

    // feedback de adição
    if (acao === 'adicionar' && data.adicionado) {
      const msg = document.getElementById('mensagem-feedback')
      if (msg) {
        msg.textContent = 'Produto adicionado ao carrinho!'
        msg.style.display = 'block'
        msg.style.opacity = '1'
        setTimeout(() => {
          msg.style.opacity = '0'
          setTimeout(() => msg.style.display = 'none', 400)
        }, 3000)
      }
    }

    // se estivermos em carrinho.php, recarrega
    if (window.location.pathname.endsWith('carrinho.php')) {
      window.location.reload()
    }
  })
  .catch(err => console.error('Erro ao atualizar carrinho:', err))
}

// ——————————————————————————————————————
// Filtragem unificada (categoria + busca)
// ——————————————————————————————————————
function filtrarCategoria(id, busca = '') {
  // salva categoria
  sessionStorage.setItem('categoriaSelecionada', id)

  // Monta querystring
  const params = new URLSearchParams()

  if (id > 0) params.set('categoria', id)
  if (busca) params.set('q', busca)

  const url = 'acao_categorias.php' + (params.toString() ? '?' + params.toString() : '')

  fetch(url, { credentials: 'same-origin' })
    .then(res => {
      if (!res.ok) throw new Error(`HTTP ${res.status}`)
      return res.text()
    })
    .then(html => {
      const vitrine = document.querySelector('main article')
      vitrine.innerHTML = html

      // Entrada dos produtos
      const novos = vitrine.querySelectorAll('.produto')

      void vitrine.offsetWidth
      novos.forEach((fig, i) =>
        setTimeout(() => fig.classList.add('show'), i * 50)
      )

      // marca categoria no menu
      document.querySelectorAll('#menu-lateral li')
        .forEach(li => li.classList.remove('ativa'))
      const sel = document.querySelector(
        `#menu-lateral li[data-categoria="${id}"]`
      )
      if (sel) sel.classList.add('ativa')
    })
    .catch(err => console.error('Erro ao filtrar produtos:', err))
}

// ——————————————————————————————————————
// Inicialização centralizada
//  – anima produtos iniciais
//  – aplica categoria salva e dispara filtro
//  – liga busca (botão + Enter)
// ——————————————————————————————————————
document.addEventListener('DOMContentLoaded', () => {
  const iniciais = document.querySelectorAll('main article .produto')

  iniciais.forEach((fig, i) =>
    setTimeout(() => fig.classList.add('show'), i * 50)
  )

  // categoria salva
  const saved = sessionStorage.getItem('categoriaSelecionada')
  const id = saved !== null ? parseInt(saved, 10) : 0

  // marca no menu
  document.querySelectorAll('#menu-lateral li')
    .forEach(li => li.classList.remove('ativa'))
  const inicial = document.querySelector(
    `#menu-lateral li[data-categoria="${id}"]`
  )
  if (inicial) inicial.classList.add('ativa')

  // carrega produtos iniciais
  filtrarCategoria(id)

  // gatilhos de busca
  const input = document.getElementById('campo-busca')
  const botao = document.getElementById('botao-busca')
  
  botao.addEventListener('click', () => {
    const termo = input.value.trim()

    filtrarCategoria(id, termo)
  })
  input.addEventListener('keypress', e => {
    if (e.key === 'Enter') {
      e.preventDefault()
      const termo = input.value.trim()

      filtrarCategoria(id, termo)
    }
  })

  const botao_limpar = document.getElementById('botao-limpar')

  botao_limpar.addEventListener('click', () => {
    const input = document.getElementById('campo-busca')
    input.value = '' // limpa o campo

    const categoria = parseInt(sessionStorage.getItem('categoriaSelecionada') || '0', 10)
    filtrarCategoria(categoria) // recarrega sem termo
  })

})

// ——————————————————————————————————————
// Distribuição aleatória das moedas
// ——————————————————————————————————————
document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('moedas-container')
  
  if (!container) return

  const moedas = container.querySelectorAll('.moeda')
  const { width: W, height: H } = container.getBoundingClientRect()

  moedas.forEach(el => {
    const rect = el.getBoundingClientRect()
    const x = Math.random() * (W - rect.width)
    const y = Math.random() * (H - rect.height)
    el.style.left = `${x}px`
    el.style.top  = `${y}px`
  })
})
