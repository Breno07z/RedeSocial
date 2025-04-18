<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HealthConnect</title>
  <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <div class="loading">
    <img class="logo__loading" src="images/LOGO.jpeg" alt="Carregando o Instagram">
    <img class="logoname__loading" src="images/logoname-carregamento.png" alt="Meta">
  </div>
  <div class="container">
    <div class="container__images">
      <img class="touchscreen" src="images/phones.png" alt="Telefones celulares interpostos" />
      <img class="carousel__image selected" src="images/display-image-1.png" alt="Carrossel de Imagens">
      <img class="carousel__image" src="images/display-image-2.png" alt="Carrossel de Imagens">
      <img class="carousel__image" src="images/display-image-3.png" alt="Carrossel de Imagens">
      <img class="carousel__image" src="images/display-image-4.png" alt="Carrossel de Imagens">
    </div>
    <div class="container__login">
      <div class="login__signin">
        <img class="instagram__logo" src="images/instagram-logo.png" alt="Instagram" />
        <input autocomplete="off" type="email" id="user" required />
        <span class="email__label">Telefone, nome de usuário ou e-mail</span>
        <input autocomplete="off" type="password" id="password" required />
        <span class="password__label">Senha</span>
        <span class="show">Mostrar</span>
        <button id="submit" type="submit">Entrar</button>
        <div class="separator">
          <span class="separator__ou">OU</span>
        </div>
        <div class="login__fboption">
          <div class="facebook">
            <div class="fb__join">
              <div class="facebook__icon">
                <img src="images/facebook-icon.png" alt="Facebook" />
              </div>
              <div class="facebook__name">
                Entrar com o Facebook
              </div>
            </div>
            <div class="facebook__forgot">Esqueceu a senha?</span>
            </div>
          </div>
        </div>
      </div>
      <div class="login__signup">
        <span>Não tem uma conta? <a href="#">Cadastre-se</a></span>
      </div>
      <div class="login__getapp">
        <div class="getapp__call">
          Obtenha o aplicativo.
        </div>
        <div class="getapp__icons">
          <img class="app__store" src="images/app-store.png" alt="App Store">
          <img class="google__play" src="images/google-play.png" alt="Google Play">
        </div>
      </div>
    </div>
  </div>
  <footer>
    <menu>
      <div class="menu">
        <ul>
          <li>Meta</li>
          <li>Sobre</li>
          <li>Blog</li>
          <li>Carreiras</li>
          <li>Ajuda</li>
          <li>API</li>
          <li>Privacidade</li>
          <li>Termos</li>
          <li>Principais contas</li>
          <li>Hashtags</li>
          <li>Localizações</li>
          <li>Instagram Lite</li>
          <li>Carregamento de contatos e não usuários</li>
          <li>Dança</li>
          <li>Comida e bebida</li>
          <li>Casa e jardim</li>
          <li>Música</li>
          <li>Artes</li>
        </ul>
      </div>
    </menu>
    <div class="copyright">
      <div class="language">
        Português (Brasil)
      </div>
      <div class="allrights">
        © <span id="current-year"></span> HealthConnect
      </div>

    </div>
  </footer>

  <script>
    // Atualiza o ano automaticamente
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>

  <script src="js/login.js"></script>
</body>

</html>