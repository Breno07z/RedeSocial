<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/explore.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Document</title>
</head>
<body>
    <!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="logo">HealthConnect</div>
      
      <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Pesquisar">
      </div>
      
      <div class="nav-icons">
        <i class="uil uil-compass"></i>
        <i class="uil uil-heart"></i>
        <i class="uil uil-user"></i>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="main-container">
    <div class="explore-grid">
      <!-- Linha 1 -->
      <div class="explore-item">
        <img src="images/feed-3.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 1.2k</span>
          <span><i class="uil uil-comment"></i> 245</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-5.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 3.4k</span>
          <span><i class="uil uil-comment"></i> 512</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-6.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 876</span>
          <span><i class="uil uil-comment"></i> 132</span>
        </div>
      </div>
      
      <!-- Linha 2 -->
      <div class="explore-item">
        <img src="images/feed-7.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 2.1k</span>
          <span><i class="uil uil-comment"></i> 321</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-1.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 4.5k</span>
          <span><i class="uil uil-comment"></i> 689</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-2.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 1.7k</span>
          <span><i class="uil uil-comment"></i> 278</span>
        </div>
      </div>
      
      <!-- Linha 3 -->
      <div class="explore-item">
        <img src="images/feed-4.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 5.2k</span>
          <span><i class="uil uil-comment"></i> 743</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-2.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 2.8k</span>
          <span><i class="uil uil-comment"></i> 421</span>
        </div>
      </div>
      <div class="explore-item">
        <img src="images/feed-3.jpg" alt="Explore">
        <div class="hover-info">
          <span><i class="uil uil-heart"></i> 3.9k</span>
          <span><i class="uil uil-comment"></i> 587</span>
        </div>
      </div>

      
    </div>
  </main>

  <!-- BOTTOM NAV (MOBILE) -->
  <nav class="bottom-nav">
    <div class="bottom-nav-icons">
      <i class="fas fa-home"></i>
      <i class="far fa-search"></i>
      <i class="far fa-plus-square"></i>
      <i class="far fa-heart"></i>
      <i class="far fa-user"></i>
    </div>
  </nav>

  <script>
    // Efeito de carregamento das imagens
    document.addEventListener('DOMContentLoaded', function() {
      const images = document.querySelectorAll('.explore-item img');
      
      images.forEach(img => {
        // Simular carregamento
        img.style.opacity = '0';
        setTimeout(() => {
          img.style.transition = 'opacity 0.5s ease';
          img.style.opacity = '1';
        }, Math.random() * 500);
      });

      // Adicionar evento de clique para os itens (pode ser usado para abrir um modal)
      const exploreItems = document.querySelectorAll('.explore-item');
      exploreItems.forEach(item => {
        item.addEventListener('click', function() {
          console.log('Post clicked - would open modal in real app');
        });
      });
    });
  </script>


</body>
</html>