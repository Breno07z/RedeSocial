<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTHCONNECT - Perfil Médico</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="/assets/perfiteste.css">
</head>
<body>
    <!-- Barra de navegação superior -->
    <nav class="health-navbar">
        <button class="back-button" onclick="window.location.href='index.html'">
            <i class="uil uil-arrow-left"></i>
        </button>
        </button>
        <h1>Perfil Profissional</h1>
    </nav>

    <div class="profile-container health-theme">
        <!-- Cabeçalho do perfil -->
        <div class="profile-header">
            <img src="<?=  url("storage/{$user->banner_image}");?>" alt="">
            <div class="profile-picture">
            <img src="<?=  url("storage/{$user->profile_image}");?>" alt="">
                <span class="professional-badge">
                    <i class="uil uil-check-circle"></i> Verificado
                </span>
            </div>
            <div class="profile-actions">
                <button class="health-btn secondary">Enviar Mensagem</button>
                <button class="health-btn primary">Seguir</button>
            </div>
        </div>

        <!-- Informações principais -->
        <div class="profile-info">
            <h1 class="profile-name">{{ $user->name }}<span class="professional-title">Cardiologista</span></h1>
            <p class="profile-username">{{ $user->username }}</p>
            <p class="profile-bio">{{ $user->bio ?? 'Sem descrição' }}
                <span class="medical-data-badge" id="medicalDataTag">
                    <i class="uil uil-file-medical-alt"></i> Dados médicos disponíveis
                </span>

                <button class="health-btn small" id="requestMedicalAccess">Solicitar Acesso</button>
                <button class="health-btn edit-profile" id="editProfileBtn">
                    <i class="uil uil-pen"></i> Editar Perfil
                </button>
            </p>

            <!-- Seção de seguidores/seguindo -->
            <div class="profile-stats">
                <div class="stat">
                    <span class="stat-number">1.234</span>
                    <span class="stat-label">Seguidores</span>
                </div>
                <div class="stat">
                    <span class="stat-number">567</span>
                    <span class="stat-label">Seguindo</span>
                </div>
            </div>

            <!-- Modal de solicitação de acesso -->
            <div id="medicalDataModal" class="health-modal">
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h3><i class="uil uil-lock"></i> Acesso aos Dados Médicos</h3>
                    <p>Para visualizar estas informações protegidas, por favor confirme sua identidade:</p>
                    <input type="password" placeholder="Digite sua senha" id="medicalPassword">
                    <button class="health-btn small" id="confirmMedicalAccess">Confirmar</button>
                </div>
            </div>

            <div class="profile-details">
                <span><i class="uil uil-map-marker"></i> Hospital Albert Einstein, SP</span>
                <span><i class="uil uil-award"></i> CRM-SP 123.456</span>
                <span><i class="uil uil-calendar-alt"></i> Atende desde 2015</span>
            </div>
            
            <!-- PDF Simulado -->
            <div id="medicalPdfViewer" class="pdf-viewer" style="display:none;">
                <iframe src="#" id="medicalPdfFrame"></iframe>
                <p class="access-info">
                    <i class="uil uil-eye-slash"></i> Este documento foi acessado em <span id="accessTime"></span>
                </p>
            </div>
        </div>

        <!-- Abas de navegação -->
        <div class="profile-nav health-tabs">
            <div class="nav-item active"><i class="uil uil-estate"></i> Início</div>
            <div class="nav-item"><i class="uil uil-file-medical-alt"></i> Artigos</div>
            <div class="nav-item"><i class="uil uil-users-alt"></i> Midia</div>
            <div class="nav-item"><i class="uil uil-comment-medical"></i> Respostas</div>
        </div>

        <!-- Conteúdo principal -->
        <div class="health-content">
            <div class="post health-post">
                <div class="post-header">
                    <img src="images/doctor-avatar.jpg" alt="Dra. Kim Nakamura" class="post-avatar">
                    <div class="post-author">
                        <strong>Dra. Kim Nakamura</strong>
                        <span>@nakamura_kim · 2h</span>
                    </div>
                </div>
                <div class="post-content">
                    <p>Novo estudo sobre tratamentos minimamente invasivos para arritmias cardíacas mostra resultados promissores com 92% de eficácia. Artigo completo disponível no meu portfólio.</p>
                    <div class="post-actions">
                        <button><i class="uil uil-comment-medical"></i> 12</button>
                        <button><i class="uil uil-share-alt"></i> Compartilhar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de Edição de Perfil -->
<div id="editProfileModal" class="edit-modal">
    <div class="edit-modal-content">
      <div class="edit-modal-header">
        <h2><i class="uil uil-user-edit"></i> Editar Perfil</h2>
        <button class="close-modal">&times;</button>
      </div>
      
      <form id="profileEditForm" class="edit-form">
        <!-- Seção de Foto -->
        <div class="form-section">
          <label>Foto de Perfil</label>
          <div class="profile-picture-edit">
            <img id="profileImagePreview" src="images/display-image-1.png" alt="Preview">
            <label for="profileImageUpload" class="upload-btn">
              <i class="uil uil-camera"></i> Alterar
            </label>
            <input type="file" id="profileImageUpload" accept="image/*" style="display:none;">
          </div>
        </div>
        
        <!-- Informações Básicas -->
        <div class="form-section">
          <label for="editName">Nome Completo</label>
          <input type="text" id="editName" value="Dra. Kim Nakamura">
          
          <label for="editNickname">Nome de Usuário (@)</label>
          <input type="text" id="editNickname" value="@nakamura_kim">
          
          <label for="editEmail">E-mail</label>
          <input type="email" id="editEmail" value="kim.nakamura@example.com">
          
          <label for="editBio">Biografia</label>
          <textarea id="editBio">Médica cardiologista com especialização em cirurgia cardíaca. Professora na Faculdade de Medicina da USP.</textarea>
        </div>
        
        <!-- Localização -->
        <div class="form-section">
          <label for="editLocation">Localização</label>
          <input type="text" id="editLocation" value="Hospital Albert Einstein, SP">
        </div>
        
        <!-- Trocar Senha -->
        <div class="form-section">
          <label>Alterar Senha</label>
          <input type="password" id="currentPassword" placeholder="Senha atual">
          <input type="password" id="newPassword" placeholder="Nova senha">
          <input type="password" id="confirmPassword" placeholder="Confirmar nova senha">
        </div>
        
        <div class="form-actions">
          <button type="button" class="health-btn secondary" id="cancelEdit">Cancelar</button>
          <button type="submit" class="health-btn primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
    

    <script src="{{ asset('js/perfil.js') }}"></script>
</body>
</html>