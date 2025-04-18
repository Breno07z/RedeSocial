// MAIN CONTROLLER
class App {
  constructor() {
    this.sidebar = new Sidebar();
    this.messages = new Messages();
    this.profile = new Profile();
  }
}

// SIDEBAR CONTROLLER
class Sidebar {
  constructor() {
    this.menuItems = document.querySelectorAll('.menu-item');
    this.init();
  }

  init() {
    this.setupNotifications();
    this.setupMenuItems();
    this.setupClickAway();
  }

  setupNotifications() {
    this.menuItems.forEach(item => {
      const notificationCount = item.querySelector('.notification-count');
      if (notificationCount) {
        const count = this.parseNotificationCount(notificationCount.textContent);
        if (count > 0) {
          item.classList.add('has-notification');
          item.dataset.originalCount = count;
        }
      }
    });
  }

  parseNotificationCount(text) {
    return parseInt(text.replace(/\D/g, '')) || 0;
  }

  setupMenuItems() {
    this.menuItems.forEach(item => {
      item.addEventListener('click', (e) => {
        this.handleMenuItemClick(item, e);
      });
    });
  }

  handleMenuItemClick(item, event) {
    if (event.target.tagName === 'A') return;
    
    this.changeActiveItem();
    item.classList.add('active');
    this.handleNotificationsPopup(item);
  }

  changeActiveItem() {
    this.menuItems.forEach(item => {
      item.classList.remove('active');
    });
  }

  handleNotificationsPopup(clickedItem) {
    const popup = document.querySelector('.notifications-popup');
    
    if (clickedItem.id !== 'notifications') {
      if (popup) popup.style.display = 'none';
    } else {
      const notificationPopup = clickedItem.querySelector('.notifications-popup');
      if (notificationPopup) {
        this.togglePopup(notificationPopup);
        this.markNotificationsAsSeen(clickedItem);
      }
    }
  }

  togglePopup(popup) {
    popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
  }

  markNotificationsAsSeen(item) {
    const countElement = item.querySelector('.notification-count');
    if (countElement) {
      countElement.textContent = '';
      item.classList.remove('has-notification');
    }
  }

  setupClickAway() {
    document.addEventListener('click', (e) => {
      if (!e.target.closest('#notifications') && !e.target.closest('.notifications-popup')) {
        const popup = document.querySelector('.notifications-popup');
        if (popup) popup.style.display = 'none';
      }
    });
  }
}

// MESSAGES CONTROLLER
class Messages {
  constructor() {
    this.messageNotification = document.querySelector("#messages-notifications");
    this.messagesContainer = document.querySelector(".messages");
    this.messageItems = document.querySelectorAll(".message");
    this.messageSearch = document.querySelector("#message-search");
    
    this.init();
  }

  init() {
    if (this.messageSearch) {
      this.messageSearch.addEventListener('input', () => this.searchMessage());
    }
    
    if (this.messageNotification) {
      this.messageNotification.addEventListener('click', () => this.highlightMessages());
    }
  }

  searchMessage() {
    const val = this.messageSearch.value.toLowerCase();
    this.messageItems.forEach(chat => {
      let name = chat.querySelector('h5').textContent.toLowerCase();
      chat.style.display = name.includes(val) ? 'flex' : 'none';
    });
  }

  highlightMessages() {
    this.messagesContainer.style.boxShadow = '0 0 1rem var(--color-primary)';
    const notificationCount = this.messageNotification.querySelector('.notification-count');
    
    if (notificationCount) {
      notificationCount.style.display = 'none';
    }
    
    setTimeout(() => {
      this.messagesContainer.style.boxShadow = 'none';
    }, 2000);
  }
}

// PROFILE CONTROLLER
class Profile {
  constructor() {
    this.profilePhoto = document.getElementById('profilePhoto');
    this.profileDropdown = document.getElementById('profileDropdown');
    
    this.init();
  }

  init() {
    if (this.profilePhoto && this.profileDropdown) {
      this.setupEventListeners();
    }
  }

  setupEventListeners() {
    this.profilePhoto.addEventListener('click', (e) => this.toggleDropdown(e));
    document.addEventListener('click', () => this.closeDropdown());
    this.profileDropdown.addEventListener('click', (e) => e.stopPropagation());
    
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
      item.addEventListener('click', () => this.handleDropdownAction(item));
    });
  }

  toggleDropdown(e) {
    e.stopPropagation();
    this.profileDropdown.classList.toggle('active');
  }

  closeDropdown() {
    this.profileDropdown.classList.remove('active');
  }

  handleDropdownAction(item) {
    const action = item.querySelector('span').textContent.toLowerCase();
    const actions = {
      'perfil': () => console.log('Ir para perfil'),
      'salvos': () => console.log('Abrir salvos'),
      'configurações': () => console.log('Abrir configurações'),
      'trocar de conta': () => console.log('Trocar de conta'),
      'sair': () => this.logout()
    };
    
    if (actions[action]) {
      actions[action]();
    }
    
    this.closeDropdown();
  }

  logout() {
    console.log('Sair da conta');
    // Implementar lógica de logout aqui
  }
}

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new App();
});

// theme/display customization


const theme = document.querySelector('#theme');
const themeModal = document.querySelector('.customize-theme');  
const themeModalContainer = document.querySelector('.customize-theme .card');
const fontSizes = document.querySelectorAll('.choose-size span');
const colors = document.querySelectorAll('.choose-color span');
const bgColors = document.querySelectorAll('.choose-bg span');








//open modal
const openTHemeModal = () => {
  document.querySelector('.customize-theme').style.display = 'grid';
}


//close modal
const closeTHemeModal = (e) => {
  if (e.target.classList.contains('customize-theme')) {
    document.querySelector('.customize-theme').style.display = 'none';
  }
}
theme.addEventListener('click', openTHemeModal);
themeModal.addEventListener('click', closeTHemeModal);


// THEME MUDANÇA DE FONTES
class FontSizeController {
  constructor() {
    this.fontSizes = document.querySelectorAll('.font-size-1, .font-size-2, .font-size-3, .font-size-4');
    this.currentSize = '16px'; // Tamanho padrão
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.loadSavedSize();
  }

  setupEventListeners() {
    this.fontSizes.forEach(size => {
      size.addEventListener('click', () => {
        this.handleSizeSelection(size);
      });
    });
  }

  handleSizeSelection(selectedSize) {
    // Remove a classe 'active' de todos os itens
    this.fontSizes.forEach(size => {
      size.classList.remove('active');
    });

    // Adiciona 'active' apenas no item selecionado
    selectedSize.classList.add('active');

    // Define o tamanho da fonte baseado na classe
    if (selectedSize.classList.contains('font-size-1')) {
      this.currentSize = '10px';
    } else if (selectedSize.classList.contains('font-size-2')) {
      this.currentSize = '13px';
    } else if (selectedSize.classList.contains('font-size-3')) {
      this.currentSize = '16px';
    } else if (selectedSize.classList.contains('font-size-4')) {
      this.currentSize = '19px';
    }

    // Aplica a mudança
    this.applyFontSize();
    this.saveSizeToStorage();
  }

  applyFontSize() {
    document.documentElement.style.fontSize = this.currentSize;
    
    // Opcional: Dispara evento para outros componentes saberem da mudança
    document.dispatchEvent(new CustomEvent('fontSizeChanged', {
      detail: { size: this.currentSize }
    }));
  }

  saveSizeToStorage() {
    // Salva no localStorage para persistência
    if (typeof localStorage !== 'undefined') {
      localStorage.setItem('preferredFontSize', this.currentSize);
    }
  }

  loadSavedSize() {
    // Carrega tamanho salvo se existir
    if (typeof localStorage !== 'undefined') {
      const savedSize = localStorage.getItem('preferredFontSize');
      if (savedSize) {
        this.currentSize = savedSize;
        this.applyFontSize();
        this.highlightCurrentSize();
      }
    }
  }

  highlightCurrentSize() {
    // Encontra e ativa o botão correspondente ao tamanho atual
    this.fontSizes.forEach(size => {
      size.classList.remove('active');
      
      const sizeMap = {
        '10px': 'font-size-1',
        '13px': 'font-size-2',
        '16px': 'font-size-3',
        '19px': 'font-size-4'
      };
      
      if (size.classList.contains(sizeMap[this.currentSize])) {
        size.classList.add('active');
      }
    });
  }
}

// Inicialização quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', () => {
  new FontSizeController();
});
  

