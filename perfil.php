<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eduardo Merli - Perfil</title>
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
      height: 100vh;
    }

    /* Header */
    .header {
      width: 100%;
      max-width: 1000px;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
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

    .nav-icons {
      display: flex;
      gap: 15px;
    }

    .nav-icons a {
      color: var(--cinza-escuro);
      font-size: 22px;
      text-decoration: none;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      transition: all 0.3s;
    }

    .nav-icons a:hover, 
    .nav-icons a.active {
      background: var(--roxo-claro);
      color: var(--roxo-primario);
    }

    /* Layout principal */
    .main-container {
      width: 100%;
      max-width: 1000px;
      display: flex;
      gap: 20px;
      padding: 20px;
      flex: 1;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      padding: 20px;
      align-self: flex-start;
      position: sticky;
      top: 80px;
    }

    .profile-card {
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid var(--cinza-medio);
      margin-bottom: 20px;
    }

    .profile-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 15px;
      border: 3px solid var(--roxo-claro);
    }

    .profile-name {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .profile-username {
      color: var(--cinza-escuro);
      margin-bottom: 15px;
    }

    .profile-stats {
      display: flex;
      justify-content: space-around;
      margin: 15px 0;
    }

    .stat {
      text-align: center;
    }

    .stat-value {
      font-weight: bold;
      font-size: 18px;
      display: block;
    }

    .stat-label {
      color: var(--cinza-escuro);
      font-size: 14px;
    }

    .profile-bio {
      color: var(--cinza-escuro);
      margin: 15px 0;
      line-height: 1.6;
    }

    .profile-info {
      text-align: left;
      margin-top: 15px;
    }

    .info-item {
      display: flex;
      margin-bottom: 12px;
      align-items: flex-start;
    }

    .info-item i {
      width: 24px;
      color: var(--roxo-primario);
      margin-right: 10px;
      margin-top: 3px;
    }

    /* Conteúdo principal */
    .content {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
      min-height: 0;
    }

    /* Feed de posts */
    .feed {
      background: var(--branco);
      border-radius: 10px;
      box-shadow: var(--sombra);
      overflow: hidden;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .feed-header {
      padding: 20px;
      border-bottom: 1px solid var(--cinza-medio);
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: rgba(106, 13, 173, 0.05);
    }

    .feed-header i {
      color: var(--roxo-primario);
      font-size: 20px;
    }

    .feed-header h2 {
      font-size: 20px;
      color: var(--roxo-primario);
    }

    .feed-content {
      flex: 1;
      overflow-y: auto;
    }

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
    }

    .post-time {
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
      max-width: 1000px;
      padding: 20px;
      text-align: center;
      color: var(--cinza-escuro);
      font-size: 14px;
      margin-top: auto;
    }

    /* Barra de pesquisa melhorada */
    .search-bar {
      background: #f0f2f5;
      border-radius: 20px;
      padding: 8px 15px;
      display: flex;
      align-items: center;
      width: 300px;
      transition: all 0.3s ease;
    }

    .search-bar:hover {
      background: #e4e6e9;
    }

    .search-bar:focus-within {
      box-shadow: 0 0 0 2px var(--roxo-claro);
    }

    .search-bar i {
      color: var(--cinza-escuro);
      font-size: 16px;
    }

    .search-bar input {
      background: transparent;
      border: none;
      outline: none;
      margin-left: 10px;
      width: 100%;
      font-size: 15px;
      color: var(--texto-escuro);
    }

    .search-bar input::placeholder {
      color: var(--cinza-escuro);
    }

    /* Botão de adicionar post */
    .add-post-button {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--roxo-primario);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      box-shadow: 0 4px 12px rgba(106, 13, 173, 0.4);
      cursor: pointer;
      transition: all 0.3s ease;
      z-index: 100;
      text-decoration: none;
    }

    .add-post-button:hover {
      background: var(--roxo-secundario);
      transform: scale(1.05);
    }

    .post-button {
      background: var(--roxo-primario);
      color: var(--branco);
      border: none;
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .post-button:hover {
      background: var(--roxo-secundario);
    }

    /* Responsividade */
    @media (max-width: 900px) {
      .main-container {
        flex-direction: column;
      }
      
      .sidebar {
        width: 100%;
        position: static;
      }
      
      .header {
        position: static;
      }
      
      .search-bar {
        width: 100%;
        max-width: 400px;
      }
    }

    @media (max-width: 600px) {
      .header {
        flex-direction: column;
        gap: 15px;
        padding: 15px;
      }
      
      .logo-container {
        width: 100%;
        flex-direction: column;
      }
      
      .search-bar {
        max-width: 100%;
      }
      
      .nav-icons {
        width: 100%;
        justify-content: space-around;
      }
      
      .add-post-button {
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        font-size: 20px;
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
      <a href="feed.php" title="Página inicial"><i class="fas fa-home"></i></a>
      <a href="criar_post.php" title="Criar postagem"><i class="fas fa-plus"></i></a>
      <a href="perfil.php" title="Perfil" class="active"><i class="fas fa-user"></i></a>
    </div>
  </div>

  <!-- Layout principal -->
  <div class="main-container">
    <!-- Sidebar (perfil) -->
    <div class="sidebar">
      <div class="profile-card">
        <img class="profile-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar do Eduardo">
        <div class="profile-name">Eduardo Merli</div>
        <div class="profile-username">@eduardomerli</div>
        
        <div class="profile-stats">
          <div class="stat">
            <span class="stat-value">34</span>
            <span class="stat-label">Posts</span>
          </div>
          <div class="stat">
            <span class="stat-value">1.2k</span>
            <span class="stat-label">Seguidores</span>
          </div>
          <div class="stat">
            <span class="stat-value">210</span>
            <span class="stat-label">Seguindo</span>
          </div>
        </div>
        
        <div class="profile-bio">
          Desenvolvedor Front-End | Apaixonado por animações e tecnologia acessível para todas as idades.
        </div>
        
        <a href="editar_perfil.php" class="post-button" style="width: 100%; margin-top: 15px; text-decoration: none;">
          <i class="fas fa-edit"></i> Editar Perfil
        </a>
      </div>
      
      <div class="profile-info">
        <div class="info-item">
          <i class="fas fa-briefcase"></i>
          <div>
            <div style="font-weight: 500;">Trabalho</div>
            <div>Desenvolvedor Front-End na ShrekTech</div>
          </div>
        </div>
        
        <div class="info-item">
          <i class="fas fa-graduation-cap"></i>
          <div>
            <div style="font-weight: 500;">Formação</div>
            <div>Universidade do Pântano - Ciências da Computação</div>
          </div>
        </div>
        
        <div class="info-item">
          <i class="fas fa-map-marker-alt"></i>
          <div>
            <div style="font-weight: 500;">Localização</div>
            <div>Pântano Distante, Far Far Away</div>
          </div>
        </div>
        
        <div class="info-item">
          <i class="fas fa-link"></i>
          <div>
            <div style="font-weight: 500;">Website</div>
            <div>www.eduardomerli.dev</div>
          </div>
        </div>
        
        <div class="info-item">
          <i class="fas fa-calendar-alt"></i>
          <div>
            <div style="font-weight: 500;">Entrou em</div>
            <div>Janeiro de 2020</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Conteúdo principal (apenas feed de posts) -->
    <div class="content">
      <!-- Feed de posts -->
      <div class="feed">
        <!-- Cabeçalho do feed - Especifica que é o perfil do usuário -->
        <div class="feed-header">
          <i class="fas fa-user-circle"></i>
          <h2>Meu Perfil</h2>
        </div>
        
        <div class="feed-content">
          <!-- Post 1 -->
          <div class="post">
            <div class="post-header">
              <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar">
              <div class="post-user">
                <div class="post-name">Eduardo Merli</div>
                <div class="post-username">@eduardomerli · 2h</div>
              </div>
            </div>
            
            <div class="post-content">
              Acabei de lançar meu novo projeto de interface para idosos. Focado em acessibilidade e usabilidade. 
              É incrível ver como a tecnologia pode conectar gerações! #Acessibilidade #DesignUniversal
            </div>
            
            <img class="post-image" src="https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Projeto 1">
            
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
              <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar">
              <div class="post-user">
                <div class="post-name">Eduardo Merli</div>
                <div class="post-username">@eduardomerli · 1d</div>
              </div>
            </div>
            
            <div class="post-content">
              Ministrei um workshop sobre desenvolvimento web para iniciantes. Foi incrível ver o interesse dos participantes! 
              Aprendemos HTML, CSS e JavaScript básico. Quem sabe não estamos formando futuros desenvolvedores?
            </div>
            
            <img class="post-image" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Projeto 2">
            
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
              <img class="post-avatar" src="https://m.media-amazon.com/images/M/MV5BZDE2ZjIxYzUtZTJjYS00OWQ0LTk2NGEtMDliYmI3MzMwYjhkXkEyXkFqcGdeQWFsZWxvZw@@._V1_.jpg" alt="Avatar">
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
      </div>
    </div>
  </div>

  <!-- Botão flutuante para adicionar post -->
  <a href="criar_post.php" class="add-post-button" title="Criar postagem">
    <i class="fas fa-plus"></i>
  </a>

  <div class="footer">
    <p>© 2023 RSJNews - Conectando jovens e idosos através da tecnologia</p>
  </div>

  <script>
    // Funções interativas do perfil
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
    
    // Botão de curtir
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
  </script>
</body>
</html>