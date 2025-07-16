<?php

$titulo = "Loot Box Geek | Website";
include './index__header.php';
?>

<!-- Section hero -->
<main>
  <!-- Background hero -->
  <div id="background">
    <video loop autoplay muted>
      <source src="video/video-hero.mp4" type="video/mp4" />
    </video>
  </div>

  <!-- Hero -->
  <section class="hero-site">
    <div class="interface">
      <article class="hero__area">
        <section class="hero__area-txt">
          <p>Tenha seus pedidos personalizados</p>
          <h1><span>Loot Box</span>Geek</h1>
          <p>
            Melhor que loot de boss raid: caixas cheias de tech,
            <span>games e geekices pra chamar de suas! </span>
          </p>
          <button class="btn-default">
            <a href="#">saiba mais</a>
          </button>
        </section>

        <section class="hero__area-img">
          <img src="./img/index/blusa_geek_pixel-removebg-preview.png" class="tamanho img1" />
          <img src="./img/index/console_portatil_pixel-removebg-preview.png" alt="console-icon"
            class="tamanho img2" />
          <img src="./img/index/controle_retro_pixel-removebg-preview.png" alt="controle-icon" class="tamanho img3" />
          <img src="./img/global/logo-removebg-preview.png" alt="pc-flutuante" class="pc-flutuante" />
          <!-- img da sombra (faltando) esqueci de pegar no pc de casa-->
        </section>
      </article>
    </div>
  </section>

  <!-- Section -> Destaques -->
  <section id="destaques">
    <div class="interface">

      <!-- <div class="destaques__titulo">             -->
      <h2 class="titulo-destaque">Destaques Geek</h2>
      <!-- </div> -->

      <article class="destaques__container">

        <div class="destaques__container-item">
          <img src="./img/index/camisa do batman.webp" alt="roupa" class="principal" />
          <h3>Roupas</h3>
          <p class="text">Blazers oversized para estilo urbano, calças cargo com bolsos funcionais e vestidos midi
            elegantes. Cropped tops despojadas e tênis chunky completam os looks.</p>
        </div>

        <div class="destaques__container-item">
          <img src="./img/index/camisa do batman.webp" class="principal" />
          <h3>Brindes</h3>
          <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
        </div>

        <div class="destaques__container-item">
          <img src="./img/index/camisa do batman.webp" alt="copo" class="principal" />
          <h3>Copos</h3>
          <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
        </div>

      </article>
    </div>
  </section>

  <!-- Section -> why-use -->
  <section id="why">
    <div class="interface">

      <div class="why__title">
        <h2>Por que Escolher a <span>Loot Box Geek</span>?</h2>
        <p>Oferecemos a melhor experiência em produtos geek exclusivos</p>
      </div>
      <div class="why__cards">
        <div class="why__cards__item">
          <i class="bi bi-gift-fill"></i>
          <h3>Itens Exclusivos</h3>
          <p>Produtos únicos e limitados que você não encontra em outro lugar</p>
        </div>

        <div class="why__cards__item">
          <i class="bi bi-stars"></i>

          <h3>Qualidade Premium</h3>
          <p>Cada item é cuidadosamente selecionado para garantir máxima qualidade</p>
        </div>

        <div class="why__cards__item">
          <i class="bi bi-truck"></i>

          <h3>Entrega Rápida</h3>
          <p>Envio expresso para todo o Brasil com rastreamento completo</p>
        </div>

        <div class="why__cards__item">
          <i class="bi bi-shield-check"></i>

          <h3>Garantia Total</h3>
          <p>Satisfação garantida ou seu dinheiro de volta</p>
        </div>
      </div>

    </div>
  </section>

  <!-- Section -> clientes -->
  <section id="clients">
    <div class="interface">

      <h2 class="clients__title">O que Nossos Clientes Dizem</h2>

      <div class="clients__carousel">
        <div class="slides">
          <div class="slide active">
            <i class="bi bi-chat-square-text"></i>
            <p>"Loot Box Geek é uma das poucas realidades onde as caixas surpresa valem a pena. Peguei itens tão
              insanos que até o Morty ficou com inveja. Se você é geek de verdade, vai querer abrir uma. Ou três."</p>
            <div class="slide__txt">
              <img src="./img/index/client-1.jpg" alt="">
              <h2>Rick Sanchez </h2>
            </div>
            <div class="slide__txt-stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>

          <div class="slide">
            <i class="bi bi-chat-square-text"></i>
            <p>"Hehehe... Adorei o Loot Box Geek! Tantas surpresas... tantas caixinhas... algumas até gritaram.
              Consegui um chaveiro do inferno e uma camiseta que literalmente sangra estilo retrô. Muito divertido...
              MUITO!"</p>
            <div class="slide__txt">
              <img src="./img/index/client-2.jpg" alt="">
              <h2>Mr. Pickles</h2>
            </div>
            <div class="slide__txt-stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>

          <div class="slide">
            <i class="bi bi-chat-square-text"></i>
            <p>👊 "Ah... Loot Box Geek? Legal. Comprei uma caixa, veio uma caneca do Genos e um adesivo careca. Foi
              divertido... por uns 3 segundos."</p>
            <div class="slide__txt">
              <img src="./img/index/client-3.jpg" alt="">
              <h2>Saitama-sama </h2>
            </div>
            <div class="slide__txt-stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>

          <div class="clients__dots">
            <span class="dot active" data-index="0"></span>
            <span class="dot" data-index="1"></span>
            <span class="dot" data-index="2"></span>
          </div>
        </div>

      </div>
  </section>

</main>



<!-- Incluir footer -->
<?php
  include_once "./index__footer.php";
?>
