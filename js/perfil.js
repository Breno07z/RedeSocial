// INTERAÇÕES
document.addEventListener('DOMContentLoaded', function() {
    // Botão Seguir
    const followButton = document.getElementById('followButton');
    followButton.addEventListener('click', function() {
      if (this.classList.contains('following')) {
        this.classList.remove('following');
        this.textContent = 'Seguir';
      } else {
        this.classList.add('following');
        this.textContent = 'Seguindo';
      }
    });

    // Navegação
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
      item.addEventListener('click', function() {
        navItems.forEach(nav => nav.classList.remove('active'));
        this.classList.add('active');
      });
    });

    // Interação com tweets
    const tweetActions = document.querySelectorAll('.tweet-action');
    tweetActions.forEach(action => {
      action.addEventListener('click', function() {
        const icon = this.querySelector('i');
        const countSpan = this.querySelector('span');
        
        if (icon.classList.contains('uil-heart')) {
          icon.classList.toggle('liked');
          if (icon.classList.contains('liked')) {
            icon.style.color = 'red';
            if (countSpan) {
              countSpan.textContent = parseInt(countSpan.textContent) + 1;
            }
          } else {
            icon.style.color = '';
            if (countSpan) {
              countSpan.textContent = parseInt(countSpan.textContent) - 1;
            }
          }
        }
      });
    });
  });