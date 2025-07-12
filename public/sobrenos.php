<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre Nós | Loot box Geek</title>
  <link rel="stylesheet" href="sobrenos.css">
</head>

<body>
  <header>
    <div class="interface">
      <section class="logo">
        <img
          src="./img/global/logo-removebg-preview.png"
          alt="logotipo"
          id="logo_header" />
      </section>

      <section class="menu-desktop">
          <nav>
            <ul>
              <li><a href="./index.html">início</a></li>
              <li><a href="./index.html#destaques">destaques</a></li>
              <li><a href="#">eventos</a></li>
              <li><a href="./sobrenos.php">sobre nós</a></li>
            </ul>
          </nav>
        </section>

      <section class="menu-desktop__btn">
          <button class="btn-default">
            <a href="./login.html">login</a>
          </button>

          <button class="btn-default">
            <a href="./cadastro.html">cadastre-se</a>
          </button>
        </section>
    </div>
  </header>
  <!-- /navbar -->

  <main clas="sobre-nos">
    <section class="sobre-nos_intro">
      <h1>Sobre Nós</h1>
      <p>Somos uma equipe apaixonada por tecnologia e inovação, dedicada a construir soluções web que fazem a diferença.</p>
    </section>

    <section class="missao-visao-valores">
      <h2>Missão, Visão e Valores</h2>
      <div class="grid">
        <article>
          <h3>Missão</h3>
          <p>Oferecer soluções digitais de alta qualidade que atendam às necessidades reais dos nossos clientes.</p>
        </article>
        <article>
          <h3>Visão</h3>
          <p>Ser referência no desenvolvimento web no Brasil e além.</p>
        </article>
        <article>
          <h3>Valores</h3>
          <ul>
            <li>Transparência</li>
            <li>Inovação</li>
            <li>Colaboração</li>
            <li>Responsabilidade</li>
          </ul>
        </article>
      </div>
    </section>

    <section class="historia">
      <h2>Nossa História</h2>
      <p>Fundado em 2021, nosso projeto começou com a união de desenvolvedores apaixonados por tecnologia e design. Desde então, crescemos em equipe, experiência e impacto.</p>
    </section>

    <section class="equipe">
      <h2>Conheça a Equipe</h2>
      <div class="membros">
        <article class="membro">
          <img src="img/joao.jpg" alt="fulano de tal - função exemplo" />
          <h3>fulano de tal</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <article class="membro">
          <img src="img/maria.jpg" alt="ciclano não sei o que - função exemplo" />
          <h3>ciclano não sei o que</h3>
          <p>função exemplo melhor descrita</p>
        </article>
        <!-- Adicione mais membros conforme necessário -->
      </div>
    </section>

    <section class="parcerias">
      <h2>Parcerias</h2>
      <p>Trabalhamos com empresas e organizações que compartilham nossos valores:</p>
      <div class="logos">
        <img src="img/parceiro1.png" alt="Parceiro 1">
        <img src="img/parceiro2.png" alt="Parceiro 2">
      </div>
    </section>

    <section class="cta">
      <h2>Quer saber mais?</h2>
      <p>Entre em contato conosco ou junte-se ao nosso time!</p>
      <a href="#" class="botao">Fale Conosco</a>
    </section>
  </main>

  <?php
    include_once "./index__footer.php";
  ?>
</body>

</html>