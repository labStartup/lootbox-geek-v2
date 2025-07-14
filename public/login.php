<?php
session_start();
// verifica se usuário veio da página de cadastro, vai abrir um modal para dizer que o cadastro foi bem sucedido:
$mostrarModal = isset($_SESSION['cadastro_sucesso']) && $_SESSION['cadastro_sucesso'] === true;
unset($_SESSION['cadastro_sucesso']); // impede que mostre ao recarregar

// Controle de senha incorreta (testLogin.php);
$senha_incorreta = isset($_SESSION['senha_incorreta']) && $_SESSION['senha_incorreta'] === true;
unset($_SESSION['senha_incorreta']);
?>
<!-- Esta é uma subpágina da index -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./index.css">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <!-- /Bootstrap Icon -->
  <title>Login | Loot box Geek</title>

</head>

<body class="no-scroll">
  <header>
    <div class="interface">
      <section class="logo">
        <img src="./img/global/logo-removebg-preview.png" alt="logotipo" id="logo_header" />
      </section>

      <section>
        <button class="btn-default return">
          <a href="./index.html">Retornar</a>
        </button>
      </section>
    </div>
  </header>
  <!-- /navbar -->

  <!-- Conteúdo principal -->
  <section class="login">

    <form action="../src/testLogin.php" method="post">

      <h2>Login</h2>

      <div class="login__input">
        <span class="login__input__icon">
          <i class="bi bi-envelope-at"></i>
        </span>
        <input type="text" name="email" maxlength="25" required />
        <label for="email">E-mail </label>
      </div>

      <div class="login__input">
        <span class="login__input__icon icon-password">
          <i class="bi bi-key-fill"></i>
        </span>
        <input type="password" name="senha" maxlength="25" required />
        <label for="senha">Senha </label>
      </div>

      <div class="remember-forgot">
        <label>
          <input type="checkbox">Lembrar
        </label>
        <a href="#">Esqueceu a senha?</a>
      </div>
      <input type="submit" value="Enviar" name="enviar">
      <div class="register-link">
        <p>Não tem uma conta? <a href="./cadastro.php">Cadastre-se</a></p>
      </div>


    </form>
    <div class="overlay"></div>
  </section>

  <!-- Span para controlar os modais login -->
  <section class="m-login">
    <span id="verificadorCadastro" data-verif="<?= $mostrarModal ? 'true' : 'false' ?>"></span>


    <dialog id="modalSucesso">
      <p>Cadastro realizado com sucesso! <span>Agora vamos logar?</span></p>
      <button class="btnFechar">OK</button>
    </dialog>

    <span id="verificadorSenha" data-verif="<?= $senha_incorreta ? 'true' : 'false' ?>"></span>

    <dialog id="senhaIncorreta">
      <p>Senha Incorreta, tente novamente!</p>
      <button class="btnFechar">Ok</button>
    </dialog>


  </section>



  <!-- Footer -->

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const verificador = document.getElementById('verificadorCadastro');
      const modal1 = document.getElementById('modalSucesso');
      const btnFechar = document.querySelectorAll('.btnFechar');

      if (verificador?.dataset.verif === 'true') {
        modal1.showModal();

        // Descomente o código abaixo se quiser que o modal fique aberto por um tempo de 10s:
        // setTimeout(() => {
        //   if (modal.open) modal.close();
        // }, 10000);
      }

      // Verificar se senha está incorreta:
      const verificadorSenha = document.getElementById("verificadorSenha");
      const modal2 = document.getElementById("senhaIncorreta");

      if (verificadorSenha?.dataset.verif === 'true') {
        modal2.showModal();
      }

      btnFechar.forEach(button => {

        button.addEventListener('click', () => {
          if (modal1) modal1.close();
          if (modal2) modal2.close();
        });
      });
    });
  </script>

</body>

</html>