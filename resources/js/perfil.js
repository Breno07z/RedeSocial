// Simulação dos dados médicos do usuário (normalmente viriam de uma API)
const medicalData = {
    bloodType: "A+",
    allergies: ["Penicilina", "Amendoim"],
    medications: [
      {
        name: "Losartana 50mg",
        dosage: "1x ao dia",
        reminders: ["08:00"]
      }
    ],
    conditions: ["Hipertensão"],
    lastCheckup: "15/05/2023",
    emergencyContact: "Maria Nakamura (11) 98765-4321"
  };
  
  // Elementos da UI
  const medicalDataTag = document.getElementById('medicalDataTag');
  const medicalDataModal = document.getElementById('medicalDataModal');
  const medicalPdfViewer = document.getElementById('medicalPdfViewer');
  const closeModal = document.querySelector('.close-modal');
  const confirmAccessBtn = document.getElementById('confirmMedicalAccess');
  const medicalPassword = document.getElementById('medicalPassword');
  
  // Gerar PDF médico dinâmico
  function generateMedicalPdf() {
    const pdfContent = `
      <html>
        <head>
          <title>Dados Médicos - HEALTHCONNECT</title>
          <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            h1 { color: #1a6b9e; text-align: center; }
            .section { margin-bottom: 20px; }
            table { width: 100%; border-collapse: collapse; }
            th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
          </style>
        </head>
        <body>
          <h1>Dados Médicos</h1>
          
          <div class="section">
            <h2>Informações Básicas</h2>
            <p><strong>Nome:</strong> Kim Nakamura</p>
            <p><strong>Tipo Sanguíneo:</strong> ${medicalData.bloodType}</p>
          </div>
          
          <div class="section">
            <h2>Alergias</h2>
            <ul>
              ${medicalData.allergies.map(allergy => `<li>${allergy}</li>`).join('')}
            </ul>
          </div>
          
          <div class="section">
            <h2>Medicação</h2>
            <table>
              <tr>
                <th>Medicamento</th>
                <th>Dosagem</th>
                <th>Horários</th>
              </tr>
              ${medicalData.medications.map(med => `
                <tr>
                  <td>${med.name}</td>
                  <td>${med.dosage}</td>
                  <td>${med.reminders.join(', ')}</td>
                </tr>
              `).join('')}
            </table>
          </div>
          
          <div class="section">
            <h2>Contato de Emergência</h2>
            <p>${medicalData.emergencyContact}</p>
          </div>
          
          <div class="footer">
            <p>Documento gerado em: ${new Date().toLocaleDateString()}</p>
          </div>
        </body>
      </html>
    `;
    
    return pdfContent;
  }
  
  // Mostrar modal de solicitação
  medicalDataTag.addEventListener('click', () => {
    medicalDataModal.style.display = 'flex';
  });
  
  // Fechar modal
  closeModal.addEventListener('click', () => {
    medicalDataModal.style.display = 'none';
  });
  
  // Confirmar acesso
  confirmAccessBtn.addEventListener('click', () => {
    // Simulação de verificação de senha
    if(medicalPassword.value === "senha123") { // Na prática, verificar com backend
      grantMedicalAccess();
    } else {
      alert("Senha incorreta. Tente novamente.");
    }
  });
  
  // Conceder acesso aos dados
  function grantMedicalAccess() {
    // 1. Esconder modal
    medicalDataModal.style.display = 'none';
    
    // 2. Mostrar visualizador de PDF
    medicalPdfViewer.style.display = 'block';
    
    // 3. Gerar e carregar PDF
    const pdfContent = generateMedicalPdf();
    const pdfFrame = document.getElementById('medicalPdfFrame');
    pdfFrame.srcdoc = pdfContent;
    
    // 4. Registrar acesso
    const now = new Date();
    document.getElementById('accessTime').textContent = 
      `${now.toLocaleDateString()} às ${now.toLocaleTimeString()}`;
    
    // 5. Atualizar UI
    medicalDataTag.innerHTML = `
      <i class="uil uil-file-medical-alt"></i> Dados médicos - Último acesso: ${now.toLocaleTimeString()}
    `;
    medicalDataTag.style.backgroundColor = 'rgba(23, 162, 184, 0.1)';
  }

  // Simulação de dados do usuário (normalmente viriam de uma API)
document.addEventListener('DOMContentLoaded', function() {
    // 1. Obter dados do localStorage (simulando dados do registro)
    const userData = JSON.parse(localStorage.getItem('healthConnectUser')) || {
      fullName: "Kim Nakamura",
      email: "kim.nakamura@example.com",
      medicalInfo: null
    };
  
    // 2. Carregar dados básicos do perfil
    document.querySelector('.profile-name').textContent = userData.fullName;
    document.querySelector('.profile-username').textContent = `@${userData.email.split('@')[0]}`;
  
    // 3. Se houver dados médicos no registro, carregá-los
    if(userData.medicalInfo) {
      // Atualizar badge de dados médicos
      const medicalDataTag = document.getElementById('medicalDataTag');
      medicalDataTag.style.display = 'inline-flex';
      
      // Atualizar objeto medicalData com os dados do registro
      Object.assign(medicalData, userData.medicalInfo);
    }
  
    // 4. Sistema de Follow
    const followBtn = document.querySelector('.health-btn.primary');
    followBtn.addEventListener('click', function() {
      const isFollowing = this.textContent === 'Seguindo';
      this.textContent = isFollowing ? 'Seguir' : 'Seguindo';
      this.classList.toggle('active');
      
      // Atualizar contador de seguidores (simulação)
      if(!isFollowing) {
        const followerCount = document.querySelector('.stat:nth-child(2) .stat-number');
        followerCount.textContent = parseInt(followerCount.textContent) + 1;
      }
    });
  
    // 5. Integração com posts (simulação)
    renderHealthPosts();
  });
  
  // Simulação de feed de posts
  function renderHealthPosts() {
    const posts = [
      {
        content: "Novo estudo sobre tratamentos minimamente invasivos para arritmias cardíacas mostra resultados promissores com 92% de eficácia.",
        time: "2h",
        comments: 12,
        shares: 5
      },
      {
        content: "Palestra hoje às 19h no auditório principal sobre avanços no tratamento da hipertensão arterial.",
        time: "5h",
        comments: 8,
        shares: 3
      }
    ];
  
    const postsContainer = document.querySelector('.health-content');
    postsContainer.innerHTML = '';
  
    posts.forEach(post => {
      const postElement = document.createElement('div');
      postElement.className = 'post health-post';
      postElement.innerHTML = `
        <div class="post-header">
          <img src="images/doctor-avatar.jpg" alt="Avatar" class="post-avatar">
          <div class="post-author">
            <strong>${document.querySelector('.profile-name').textContent}</strong>
            <span>@${document.querySelector('.profile-username').textContent.replace('@', '')} · ${post.time}</span>
          </div>
        </div>
        <div class="post-content">
          <p>${post.content}</p>
          <div class="post-actions">
            <button><i class="uil uil-comment-medical"></i> ${post.comments}</button>
            <button><i class="uil uil-share-alt"></i> Compartilhar</button>
          </div>
        </div>
      `;
      postsContainer.appendChild(postElement);
    });
  }
  
  // 6. Simulação de integração com formulário de registro
  function simulateRegistrationIntegration() {
    // Isso normalmente seria feito no processo de registro
    const registrationData = {
      fullName: "Kim Nakamura",
      email: "kim.nakamura@example.com",
      medicalInfo: {
        bloodType: "A+",
        allergies: ["Penicilina"],
        medications: [
          {
            name: "Losartana 50mg",
            dosage: "1x ao dia",
            reminders: ["08:00"]
          }
        ],
        conditions: ["Hipertensão"],
        emergencyContact: "Maria Nakamura (11) 98765-4321"
      }
    };
  
    localStorage.setItem('healthConnectUser', JSON.stringify(registrationData));
  }
  
  // Chamada inicial para simular dados (remover em produção)
  simulateRegistrationIntegration();// Simulação de dados do usuário (normalmente viriam de uma API)
document.addEventListener('DOMContentLoaded', function() {
  // 1. Obter dados do localStorage (simulando dados do registro)
  const userData = JSON.parse(localStorage.getItem('healthConnectUser')) || {
    fullName: "Kim Nakamura",
    email: "kim.nakamura@example.com",
    medicalInfo: null
  };

  // 2. Carregar dados básicos do perfil
  document.querySelector('.profile-name').textContent = userData.fullName;
  document.querySelector('.profile-username').textContent = `@${userData.email.split('@')[0]}`;

  // 3. Se houver dados médicos no registro, carregá-los
  if(userData.medicalInfo) {
    // Atualizar badge de dados médicos
    const medicalDataTag = document.getElementById('medicalDataTag');
    medicalDataTag.style.display = 'inline-flex';
    
    // Atualizar objeto medicalData com os dados do registro
    Object.assign(medicalData, userData.medicalInfo);
  }

  // 4. Sistema de Follow
  const followBtn = document.querySelector('.health-btn.primary');
  followBtn.addEventListener('click', function() {
    const isFollowing = this.textContent === 'Seguindo';
    this.textContent = isFollowing ? 'Seguir' : 'Seguindo';
    this.classList.toggle('active');
    
    // Atualizar contador de seguidores (simulação)
    if(!isFollowing) {
      const followerCount = document.querySelector('.stat:nth-child(2) .stat-number');
      followerCount.textContent = parseInt(followerCount.textContent) + 1;
    }
  });

  // 5. Integração com posts (simulação)
  renderHealthPosts();
});

// Simulação de feed de posts
function renderHealthPosts() {
  const posts = [
    {
      content: "Novo estudo sobre tratamentos minimamente invasivos para arritmias cardíacas mostra resultados promissores com 92% de eficácia.",
      time: "2h",
      comments: 12,
      shares: 5
    },
    {
      content: "Palestra hoje às 19h no auditório principal sobre avanços no tratamento da hipertensão arterial.",
      time: "5h",
      comments: 8,
      shares: 3
    }
  ];

  const postsContainer = document.querySelector('.health-content');
  postsContainer.innerHTML = '';

  posts.forEach(post => {
    const postElement = document.createElement('div');
    postElement.className = 'post health-post';
    postElement.innerHTML = `
      <div class="post-header">
        <img src="images/doctor-avatar.jpg" alt="Avatar" class="post-avatar">
        <div class="post-author">
          <strong>${document.querySelector('.profile-name').textContent}</strong>
          <span>@${document.querySelector('.profile-username').textContent.replace('@', '')} · ${post.time}</span>
        </div>
      </div>
      <div class="post-content">
        <p>${post.content}</p>
        <div class="post-actions">
          <button><i class="uil uil-comment-medical"></i> ${post.comments}</button>
          <button><i class="uil uil-share-alt"></i> Compartilhar</button>
        </div>
      </div>
    `;
    postsContainer.appendChild(postElement);
  });
}

// 6. Simulação de integração com formulário de registro
function simulateRegistrationIntegration() {
  // Isso normalmente seria feito no processo de registro
  const registrationData = {
    fullName: "Kim Nakamura",
    email: "kim.nakamura@example.com",
    medicalInfo: {
      bloodType: "A+",
      allergies: ["Penicilina"],
      medications: [
        {
          name: "Losartana 50mg",
          dosage: "1x ao dia",
          reminders: ["08:00"]
        }
      ],
      conditions: ["Hipertensão"],
      emergencyContact: "Maria Nakamura (11) 98765-4321"
    }
  };

  localStorage.setItem('healthConnectUser', JSON.stringify(registrationData));
}

// Chamada inicial para simular dados (remover em produção)
simulateRegistrationIntegration();

// animação dos numeros
document.addEventListener('DOMContentLoaded', function() {
  const animationDuration = 2000;
  const stats = [
      { element: document.querySelector('.stat:nth-child(1) .stat-number'), finalValue: 1234 },
      { element: document.querySelector('.stat:nth-child(2) .stat-number'), finalValue: 567 }
  ];

  function animateNumbers() {
      const startTime = performance.now();
      
      function updateNumbers(currentTime) {
          const elapsedTime = currentTime - startTime;
          const progress = Math.min(elapsedTime / animationDuration, 1);
          
          stats.forEach(stat => {
              const currentValue = Math.floor(progress * stat.finalValue);
              const formattedValue = formatNumber(currentValue);
              
              // Adiciona classe de animação apenas se o número mudou
              if (stat.element.textContent !== formattedValue) {
                  stat.element.classList.add('changing');
                  stat.element.textContent = formattedValue;
                  
                  // Remove a classe após a animação
                  setTimeout(() => {
                      stat.element.classList.remove('changing');
                  }, 300);
              }
          });
          
          if (progress < 1) {
              requestAnimationFrame(updateNumbers);
          }
      }
      
      requestAnimationFrame(updateNumbers);
  }

  function formatNumber(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  // Inicia a animação
  animateNumbers();

  // Observador para reiniciar animação quando o elemento entrar na viewport
  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              animateNumbers();
          }
      });
  }, { threshold: 0.1 });

  const statsSection = document.querySelector('.profile-stats');
  if(statsSection) {
      observer.observe(statsSection);
  }
});

// edição

document.addEventListener('DOMContentLoaded', function() {
  // Elementos do DOM
  const editProfileBtn = document.getElementById('editProfileBtn');
  const editModal = document.getElementById('editProfileModal');
  const closeModalBtn = document.querySelector('.close-modal');
  const cancelEditBtn = document.getElementById('cancelEdit');
  const profileForm = document.getElementById('profileEditForm');
  const profileUpload = document.getElementById('profileImageUpload');
  const profilePreview = document.getElementById('profileImagePreview');
  const profileImage = document.querySelector('.profile-picture img');
  
  // Elementos do perfil que serão atualizados
  const profileName = document.querySelector('.profile-name');
  const profileUsername = document.querySelector('.profile-username');
  const profileBio = document.querySelector('.profile-bio');
  const profileLocation = document.querySelector('.profile-details span:first-child');
  
  // Abrir modal de edição
  editProfileBtn.addEventListener('click', function() {
    // Preencher formulário com valores atuais
    document.getElementById('editName').value = profileName.textContent.split(' ')[0];
    document.getElementById('editNickname').value = profileUsername.textContent;
    document.getElementById('editBio').value = profileBio.textContent.split('\n')[0];
    document.getElementById('editLocation').value = profileLocation.textContent.replace('📍', '').trim();
    
    // Mostrar modal
    editModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });
  
  // Fechar modal
  function closeModal() {
    editModal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
  
  closeModalBtn.addEventListener('click', closeModal);
  cancelEditBtn.addEventListener('click', closeModal);
  
  // Preview da nova imagem de perfil
  profileUpload.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        profilePreview.src = event.target.result;
        // Atualizar em tempo real
        profileImage.src = event.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
  
  // Atualizações em tempo real
  document.getElementById('editName').addEventListener('input', function(e) {
    const specialty = document.querySelector('.professional-title').textContent;
    profileName.textContent = `${e.target.value} ${specialty}`;
  });
  
  document.getElementById('editNickname').addEventListener('input', function(e) {
    profileUsername.textContent = e.target.value;
  });
  
  document.getElementById('editBio').addEventListener('input', function(e) {
    profileBio.innerHTML = e.target.value;
  });
  
  document.getElementById('editLocation').addEventListener('input', function(e) {
    profileLocation.innerHTML = `<i class="uil uil-map-marker"></i> ${e.target.value}`;
  });
  
  // Envio do formulário
  profileForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validar senha se foi alterada
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (newPassword && newPassword !== confirmPassword) {
      alert('As senhas não coincidem!');
      return;
    }
    
    // Coletar dados do formulário
    const formData = {
      name: document.getElementById('editName').value,
      nickname: document.getElementById('editNickname').value,
      email: document.getElementById('editEmail').value,
      bio: document.getElementById('editBio').value,
      location: document.getElementById('editLocation').value,
      currentPassword: document.getElementById('currentPassword').value,
      newPassword: newPassword
      // Adicionar a imagem se foi alterada
    };
    
    // Aqui você enviaria os dados para o servidor
    console.log('Dados atualizados:', formData);
    
    // Fechar modal
    closeModal();
    
    // Feedback visual
    showToast('Perfil atualizado com sucesso!');
  });
  
  // Função para mostrar notificação
  function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
      toast.classList.add('show');
    }, 10);
    
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => {
        document.body.removeChild(toast);
      }, 300);
    }, 3000);
  }
});


