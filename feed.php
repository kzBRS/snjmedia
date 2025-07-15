<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSJNews - Feed com Anúncios</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    :root {
      --roxo-primario: #6A0DAD;
      --roxo-secundario: #8A2BE2;
      --roxo-claro: #E6E6FA;
      --cinza-claro: #f0f2f5;
      --cinza-medio: #e4e6eb;
      --cinza-escuro: #65676b;
      --texto-escuro: #1c1e21;
      --branco: #ffffff;
      --sombra: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    body {
      background: var(--cinza-claro);
      color: var(--texto-escuro);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 16px;
      line-height: 1.5;
    }

    .header {
      width: 100%;
      max-width: 1200px;
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 15px 0;
      position: sticky;
      top: 10px;
      z-index: 100;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .logo {
      font-size: 28px;
      font-weight: 700;
      background: linear-gradient(45deg, #405DE6, #833AB4, #E1306C);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .search-bar {
      background: var(--cinza-claro);
      border-radius: 20px;
      padding: 8px 15px;
      display: flex;
      align-items: center;
      width: 300px;
    }

    .search-bar i {
      color: var(--cinza-escuro);
      margin-right: 8px;
    }

    .search-bar input {
      background: transparent;
      border: none;
      outline: none;
      width: 100%;
      font-size: 15px;
    }

    .nav-icons {
      display: flex;
      gap: 15px;
    }

    .nav-icons a {
      color: var(--cinza-escuro);
      font-size: 20px;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      transition: all 0.3s;
    }

    .nav-icons a:hover {
      background: var(--cinza-claro);
      color: var(--roxo-primario);
    }

    .nav-icons a.active {
      color: var(--roxo-primario) !important;
    }

    .nav-icons a.active:hover {
      color: var(--roxo-primario) !important;
      background: rgba(106, 13, 173, 0.1);
    }

    /* Layout principal */
    .main-container {
      width: 100%;
      max-width: 1200px;
      display: flex;
      gap: 25px;
      padding: 0 20px 20px;
    }

    /* Feed de posts */
    .feed {
      flex: 1;
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      overflow: hidden;
    }

    /* Sidebar para anúncios */
    .sidebar {
      width: 300px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    /* Estilos para anúncios */
    .ad {
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .ad:hover {
      transform: translateY(-5px);
    }

    .ad-header {
      background: linear-gradient(45deg, var(--roxo-primario), var(--roxo-secundario));
      color: white;
      padding: 8px;
      font-size: 14px;
      font-weight: 600;
    }

    .ad-content {
      padding: 15px;
    }

    .ad-content img {
      max-width: 100%;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .ad-content h3 {
      color: var(--roxo-primario);
      margin-bottom: 8px;
      font-size: 18px;
    }

    .ad-content p {
      color: var(--cinza-escuro);
      font-size: 14px;
      margin-bottom: 15px;
    }

    .ad-button {
      background: var(--roxo-primario);
      color: white;
      border: none;
      border-radius: 20px;
      padding: 8px 20px;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .ad-button:hover {
      background: var(--roxo-secundario);
    }

    .ad-between-posts {
      margin: 20px 0;
      background: #f9f9ff;
      border: 1px dashed var(--roxo-claro);
    }

    .ad-top-feed {
      margin-bottom: 20px;
    }

    /* Post styles */
    .post {
      padding: 20px;
      border-bottom: 1px solid var(--cinza-medio);
    }

    .post-header {
      display: flex;
      margin-bottom: 15px;
    }

    .post-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 15px;
    }

    .post-user {
      flex: 1;
    }

    .post-name {
      font-weight: 700;
      margin-bottom: 3px;
    }

    .post-username {
      color: var(--cinza-escuro);
      font-size: 14px;
    }

    .post-content {
      margin-bottom: 15px;
      font-size: 18px;
      line-height: 1.6;
    }

    .post-image {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 15px;
      max-height: 400px;
      object-fit: cover;
    }

    .post-stats {
      display: flex;
      color: var(--cinza-escuro);
      margin-bottom: 10px;
    }

    .post-stat {
      margin-right: 20px;
      display: flex;
      align-items: center;
    }

    .post-stat i {
      margin-right: 5px;
    }

    .post-actions {
      display: flex;
      justify-content: space-around;
      border-top: 1px solid var(--cinza-medio);
      padding-top: 15px;
    }

    .post-action {
      display: flex;
      align-items: center;
      color: var(--cinza-escuro);
      cursor: pointer;
      transition: color 0.2s;
    }

    .post-action:hover {
      color: var(--roxo-primario);
    }

    .post-action i {
      margin-right: 5px;
      font-size: 18px;
    }

    /* Footer */
    .footer {
      width: 100%;
      max-width: 1200px;
      padding: 20px;
      text-align: center;
      color: var(--cinza-escuro);
      font-size: 14px;
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .footer-ads {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .footer-ad {
      width: 180px;
      height: 150px;
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 10px;
      text-align: center;
      font-size: 13px;
      color: var(--cinza-escuro);
    }

    .footer-ad i {
      font-size: 24px;
      color: var(--roxo-primario);
      margin-bottom: 10px;
    }

    /* Responsividade */
    @media (max-width: 900px) {
      .main-container {
        flex-direction: column;
      }
      
      .sidebar {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
      }
      
      .ad {
        width: calc(50% - 10px);
      }
      
      .header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
      }
      
      .logo-container {
        flex-direction: column;
      }
      
      .search-bar {
        width: 100%;
        max-width: 500px;
      }
    }
    
    @media (max-width: 600px) {
      .ad {
        width: 100%;
      }
      
      .post-stats {
        flex-wrap: wrap;
        gap: 10px;
      }
      
      .post-stat {
        margin-right: 15px;
      }
      
      .post-actions {
        flex-wrap: wrap;
        gap: 10px;
      }
      
      .post-action {
        width: 45%;
        justify-content: center;
      }
      
      .footer-ads {
        flex-wrap: wrap;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div class="header">
    <div class="logo-container">
      <div class="logo"><a href="feed.php">RSJNews</a></div>
      <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Pesquisar pessoas e páginas" />
      </div>
    </div>

    <div class="nav-icons">
      <a href="feed.php" title="Feed" class="active">
        <i class="fas fa-home"></i>
      </a>
      <a href="perfil.php" title="Perfil">
        <i class="fas fa-user"></i>
      </a>
    </div>
  </div>

  <!-- Main Container -->
  <div class="main-container">
    <!-- Feed -->
    <div class="feed">
      <!-- Anúncio topo do feed -->
      <!-- Post 1 -->
      <div class="post">
        <div class="post-header">
          <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar" />
          <div class="post-user">
            <div class="post-name">Eduardo Merli</div>
            <div class="post-username">@eduardomerli · 2h</div>
          </div>
        </div>

        <div class="post-content">
          Acabei de lançar meu novo projeto de interface para idosos. Focado em acessibilidade e usabilidade.
          É incrível ver como a tecnologia pode conectar gerações! #Acessibilidade #DesignUniversal
        </div>

        <img class="post-image" src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Projeto 1" />

        <div class="post-stats">
          <div class="post-stat"><i class="far fa-comment"></i> 24</div>
          <div class="post-stat"><i class="fas fa-retweet"></i> 8</div>
          <div class="post-stat"><i class="far fa-heart"></i> 142</div>
          <div class="post-stat"><i class="fas fa-chart-bar"></i> 1.2K</div>
        </div>

        <div class="post-actions">
          <div class="post-action">
            <i class="far fa-comment"></i>
            <span>Comentar</span>
          </div>
          <div class="post-action">
            <i class="fas fa-retweet"></i>
            <span>Republicar</span>
          </div>
          <div class="post-action">
            <i class="far fa-heart"></i>
            <span>Curtir</span>
          </div>
          <div class="post-action">
            <i class="fas fa-share"></i>
            <span>Compartilhar</span>
          </div>
        </div>
      </div>

      <!-- Post 2 -->
      <div class="post">
        <div class="post-header">
          <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar" />
          <div class="post-user">
            <div class="post-name">Eduardo Merli</div>
            <div class="post-username">@eduardomerli · 1d</div>
          </div>
        </div>

        <div class="post-content">
          Ministrei um workshop sobre desenvolvimento web para iniciantes. Foi incrível ver o interesse dos participantes! 
          Aprendemos HTML, CSS e JavaScript básico. Quem sabe não estamos formando futuros desenvolvedores?
        </div>

        <img class="post-image" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Projeto 2" />

        <div class="post-stats">
          <div class="post-stat"><i class="far fa-comment"></i> 18</div>
          <div class="post-stat"><i class="fas fa-retweet"></i> 5</div>
          <div class="post-stat"><i class="far fa-heart"></i> 98</div>
          <div class="post-stat"><i class="fas fa-chart-bar"></i> 850</div>
        </div>

        <div class="post-actions">
          <div class="post-action">
            <i class="far fa-comment"></i>
            <span>Comentar</span>
          </div>
          <div class="post-action">
            <i class="fas fa-retweet"></i>
            <span>Republicar</span>
          </div>
          <div class="post-action">
            <i class="far fa-heart"></i>
            <span>Curtir</span>
          </div>
          <div class="post-action">
            <i class="fas fa-share"></i>
            <span>Compartilhar</span>
          </div>
        </div>
      </div>
      
      <!-- Post 3 -->
      <div class="post">
        <div class="post-header">
          <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar" />
          <div class="post-user">
            <div class="post-name">Eduardo Merli</div>
            <div class="post-username">@eduardomerli · 3d</div>
          </div>
        </div>

        <div class="post-content">
          Compartilhei algumas dicas de acessibilidade digital que podem ajudar tanto jovens quanto idosos a navegar na web. 
          Pequenas mudanças podem fazer uma grande diferença na experiência do usuário!
        </div>

        <div class="post-stats">
          <div class="post-stat"><i class="far fa-comment"></i> 32</div>
          <div class="post-stat"><i class="fas fa-retweet"></i> 12</div>
          <div class="post-stat"><i class="far fa-heart"></i> 187</div>
          <div class="post-stat"><i class="fas fa-chart-bar"></i> 1.5K</div>
        </div>

        <div class="post-actions">
          <div class="post-action">
            <i class="far fa-comment"></i>
            <span>Comentar</span>
          </div>
          <div class="post-action">
            <i class="fas fa-retweet"></i>
            <span>Republicar</span>
          </div>
          <div class="post-action">
            <i class="far fa-heart"></i>
            <span>Curtir</span>
          </div>
          <div class="post-action">
            <i class="fas fa-share"></i>
            <span>Compartilhar</span>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Sidebar de Anúncios -->
    <div class="sidebar">
      <div class="ad">
        <div class="ad-header">Patrocinado</div>
        <div class="ad-content">
          <img src="https://images.unsplash.com/photo-1581093458799-ef0d0c87f1a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Aplicativo">
          <h3>App Conecta Gerações</h3>
          <p>Plataforma para conectar jovens e idosos em atividades de aprendizado mútuo</p>
          <button class="ad-button">Baixe Agora</button>
        </div>
      </div>
      
      <div class="ad">
        <div class="ad-header">Patrocinado</div>
        <div class="ad-content">
          <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Workshop">
          <h3>Workshop de Tecnologia</h3>
          <p>Aprenda a usar smartphones e redes sociais com instrutores especializados</p>
          <button class="ad-button">Inscreva-se</button>
        </div>
      </div>
      
      <div class="ad">
        <div class="ad-header">Patrocinado</div>
        <div class="ad-content">
          <h3>Livro: Tecnologia para Todas as Idades</h3>
          <p>Guia completo para ajudar idosos a navegar no mundo digital</p>
          <button class="ad-button">Compre Agora</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer com anúncios -->
  <div class="footer">
    <div class="footer-ads">
    
    <p>© 2023 RSJNews - Conectando jovens e idosos através da tecnologia</p>
  </div>

  <script>
    // Funções interativas para os posts
    document.querySelectorAll('.post-action').forEach(action => {
      action.addEventListener('click', function() {
        const icon = this.querySelector('i');
        if (icon.classList.contains('far')) {
          icon.classList.replace('far', 'fas');
          icon.style.color = 'var(--roxo-primario)';
        } else {
          icon.classList.replace('fas', 'far');
          icon.style.color = '';
        }
      });
    });
    
    // Botão de curtir nas estatísticas
    document.querySelectorAll('.post-stat .fa-heart').forEach(heart => {
      heart.addEventListener('click', function() {
        if (this.classList.contains('far')) {
          this.classList.replace('far', 'fas');
          this.style.color = 'var(--roxo-primario)';
        } else {
          this.classList.replace('fas', 'far');
          this.style.color = '';
        }
      });
    });
    
    // Efeito de hover nos anúncios
    document.querySelectorAll('.ad-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.05)';
      });
      button.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
      });
    });
  </script>
</body>
</html>