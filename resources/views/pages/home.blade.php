<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <title>HealthConnect</title>
</head>
<body>

  <!-------------- NAVBAR -------------->
  <nav>
    <div class="container">
      <h2 class="logo">
        HealthConnect
      </h2>

      <div class="search-bar" id="search">
        <i class="uil uil-search"></i>
        <input type="search" placeholder="Pesquisar">
      </div>

      <div class="create">
        <label class="btn btn-primary" for="create-post">Create</label>
        <div class="profile-container">
          <div class="profile-photo" id="profilePhoto">
          <a href="{{ route('usuario.perfil') }}" class="profile">
            <img src="{{ url('storage/' . auth()->user()->profile_image) }}" alt="Profile Photo"></a>
          </div>
          
          <div class="profile-dropdown" id="profileDropdown">
            <div class="dropdown-item">
              <i class="far fa-user"></i>
              <span>Perfil</span>
            </div>
            <div class="dropdown-item">
              <i class="far fa-bookmark"></i>
              <span>Salvos</span>
            </div>
            <div class="dropdown-item">
              <i class="fas fa-cog"></i>
              <span>Configurações</span>
            </div>
            <div class="dropdown-item">
              <i class="fas fa-exchange-alt"></i>
              <span>Trocar de conta</span>
            </div>
            
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-item logout">
              <i class="fas fa-sign-out-alt"></i>
              <span>Sair</span>
            </div>
          </div>
        </div>
      
      </div> 
    </div>
  </nav>
  <!-------------- END OF NAVBAR -------------->

  <!-------------- MAIN -------------->
  <main>
    <div class="container">
      <!-- left side -->
      <div class="left">

      <a href="{{ route('usuario.perfil') }}" class="profile">
        
        <div class="profile-photo">
          <img src="{{ url('storage/' . auth()->user()->profile_image) }}" alt="Profile Photo">
        </div>
        <div class="handle">
          <h4>{{ auth()->user()->name }}</h4>
          <p class="text-muted">
          {{ auth()->user()->username}}
          </p>
        </div>
      </a>

        <!-- sidebar -->
        <div class="sidebar">
          <a class="menu-item active">
            <span><i class="uil uil-home"></i></span>
            <h3>Home</h3>
          </a>
          <a href="{{ route('pages.explore') }}" class="menu-item">
            <span><i class="uil uil-compass"></i></span>
            <h3>Explore</h3>
          </a>
      

          <a class="menu-item" id="notifications">
            <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
            <h3>Notifications</h3>

            <!-- notifications popup -->
            <div class="notifications-popup">
              <div>
                <div class="profile-photo">
                  <img src="images/profile-2.jpg" alt="Profile Photo">
                </div>
                <div class="notification-body">
                  <b>Michael Doe</b> accepted your friend request
                  <small class="text-muted">1 min ago</small>
                </div>
              </div>
            </div>
          </a>

          <a class="menu-item" id="messages-notifications">
            <span><i class="uil uil-envelope-alt"><small class="notification-count">9+</small></i></span>
            <h3>Messages</h3> 
          </a>

          <a class="menu-item">
            <span><i class="uil uil-bookmark"></i></span>
            <h3>Bookmarks</h3>
          </a>

          <a class="menu-item">
            <span><i class="uil uil-chart-line"></i></span>
            <h3>NetWorking</h3>
          </a>

          <a class="menu-item" id="theme">
            <span><i class="uil uil-palette"></i></span>
            <h3>Theme</h3>
          </a>

          <a class="menu-item">
            <span><i class="uil uil-setting"></i></span>
            <h3>Settings</h3>
          </a>
        </div>
        <!-- end of sidebar --> 
        <label for="create-post" class="btn btn-primary" id="create-post">Create Post</label>  
      </div>

      <!-- middle - story content -->
      <div class="middle">
        <!-- story -->
        <div class="stories">
          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-1.jpg" alt="Profile Photo">
            </div>
            <p class="name">your stpry</p>
          </div>

          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-2.jpg" alt="Profile Photo">
            </div>
            <p class="name">John Doe</p>
          </div>

          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-3.jpg" alt="Profile Photo">
            </div>
            <p class="name">John Doe</p>
          </div>

          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-4.jpg" alt="Profile Photo">
            </div>
            <p class="name">John Doe</p>
          </div>

          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-5.jpg" alt="Profile Photo">
            </div>
            <p class="name">John Doe</p>
          </div>

          <div class="story">
            <div class="profile-photo">
              <img src="images/profile-6.jpg" alt="Profile Photo">
            </div>
            <p class="name">John Doe</p>
          </div>
        </div>
        <!--end of story-->

        <!-- create post -->
        <form action="{{ route('posts.store') }}" method="POST" class="create-post" enctype="multipart/form-data">
          @csrf
          <div class="profile-photo">
          <img src="{{ auth()->user()->profile_image ? url('storage/' . auth()->user()->profile_image) : asset('public/images/profile-example.jpg') }}" alt="Profile Photo">
          </div>
          <input type="text" name="content" placeholder="What's on your mind, {{ auth()->user()->name }}?" id="create-post-input">
          <input type="submit" value="Post" class="btn btn-primary">
          </form>
        <!-- end of create post -->

        <!-- feeds -->
        <div class="feeds">
        @foreach ($posts as $post)
          <div class="feed">
            <div class="head">
              <div class="user">
              <div class="profile-photo">
                        <img src="{{ url('storage/' . $post->user->profile_image) }}" alt="Foto de perfil">
                    </div>
                <div class="info">
                  <h3>{{ $post->user->name }}</h3>
                  <small>New York</small>
                </div>
              </div>
              <span class="edit">
                <i class="uil uil-ellipsis-h"></i>
              </span>
            </div>
            @if ($post->image)
                <div class="photo">
                    <img src="{{ url('storage/' . $post->image) }}" alt="Imagem do post">
                </div>
            @endif
            <div class="action-buttons">
              <div class="interaction-buttons">
                <span><i class="uil uil-heart"></i></span>
                <span><i class="uil uil-comment-dots"></i></span>
                <span><i class="uil uil-share-alt"></i></span>
              </div>
              <div class="bookmark">
                <span><i class="uil uil-bookmark-full"></i></span>
              </div>
            </div>
            <div class="liked-by">
              <span><img src="images/profile-10.jpg" alt="Profile Photo"></span>
              <span><img src="images/profile-4.jpg" alt="Profile Photo"></span>
              <span><img src="images/profile-5.jpg" alt="Profile Photo"></span>
              <p>liked by <strong>John Doe</strong> and <strong>2,453 others</strong></p>
            </div>
            <div class="caption"> 
              <p><strong>{{ $post->user->name }}</strong> {{ $post->content }}<span class="hashtag">#lifestyle</span></p>
            </div>
            <div class="comments text-muted">
              View all 277 comments
            </div>
          </div>
          @endforeach
        </div>
      </div>  
      <!-- end of middle -->

      <!-- right side -->
      <div class="right">
        <div class="messages">
          <div class="heading">
            <h4>Messages</h4>
            <span><i class="uil uil-edit"></i></span>     
          </div>
          <!-- search bar -->
          <div class="search-bar">
            <i class="uil uil-search"></i>  
            <input type="search" placeholder="Search messages" id="message-search">
          </div>
          <!--message category -->
          <div class="category">
            <h6 class="active">Primary</h6>
            <h6>General</h6>  
            <h6 class="message-requests">Requests(7)</h6>
          </div>
          <!-- messages -->
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-1.jpg" alt="Profile Photo">
              <div class="active"></div>
            </div>
            <div class="message-body">
              <h5>Clara Smith</h5>
              <p class="text-muted">tudo bem?</p>
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-2.jpg" alt="Profile Photo">
            </div>
            <div class="message-body">
              <h5>Bruce</h5>       
              <p class="text-muted">ok</p>  
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-3.jpg" alt="Profile Photo">
              <div class="active"></div>
            </div>
            <div class="message-body">
              <h5>lara cofther</h5>
              <p class="text-muted">Recife é massa boy</p>
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-4.jpg" alt="Profile Photo">
            </div>
            <div class="message-body">
              <h5>Milena Santos</h5>       
              <p class="text-muted">Unibra a melhor</p>  
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">          
              <img src="images/profile-5.jpg" alt="Profile Photo">  
            </div>
            <div class="message-body">
              <h5>carla dias</h5>       
              <p class="text-muted">sport melhor que santa? tas doido </p>  
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-6.jpg" alt="Profile Photo">
              <div class="active"></div>
            </div>
            <div class="message-body">
              <h5>Isa</h5>
              <p class="text-muted">Olha o video dos Tabacudo no recife ordinario</p>
            </div>
          </div>
          <div class="message">
            <div class="profile-photo">
              <img src="images/profile-7.jpg" alt="Profile Photo">
            </div>
            <div class="message-body">
              <h5>Latrel</h5>       
              <p class="text-muted">Isso é ideia nao boy</p>  
            </div>
          </div>
        </div>

        <!-- Friend Requests -->
        <div class="friend-requests"> 
          <h4>Requests</h4>
          <div class="request">
            <div class="info">
              <div class="profile-photo">
                <img src="images/profile-1.jpg" alt="Profile Photo">
              </div>
              <div>
                <h5>John Doe</h5>
                <p class="text-muted">4 mutual friends</p>
              </div>
            </div>
            <div class="action">
              <button class="btn btn-primary">Accept</button>
              <button class="btn btn-secondary">Decline</button>
            </div>
          </div>
          <div class="request"> 
            <div class="info">
              <div class="profile-photo">
                <img src="images/profile-2.jpg" alt="Profile Photo">
              </div>
              <div>
                <h5>John Doe</h5>
                <p class="text-muted">4 mutual friends</p>
              </div>
            </div>
            <div class="action">
              <button class="btn btn-primary">Accept</button>
              <button class="btn btn-secondary">Decline</button>
            </div>
          </div>
        </div>
      </div>
      <!=== end of right ===>
    </div>
  </main>

  <!--theme customizer-->
  <div class="customize-theme">
    <div class="card">
      <h2>Customize your view</h2>
      <p>Manage your font size, color, and background here.</p>

      <div class="font-size">
        <h4>Font Size</h4>
        <div>
          <h6>Aa</h6>
          <div class="choose-size">
            <span class="font-size-1"></span>
            <span class="font-size-2"></span>
            <span class="font-size-3"></span>
            <span class="font-size-4"></span>
            <span class="font-size-5"></span>
          </div>
          <h3>Aa</h3>
        </div>
      </div>

      <!--Primary Colors-->
      <div class="color-palette">
        <h4>Choose Color</h4>
        <div class="choose-color">
          <span class="color-1"></span>
          <span class="color-2"></span>
          <span class="color-3"></span>
          <span class="color-4"></span>
          <span class="color-5"></span>
        </div>
      </div>

      <!--background colors-->
      <div class="background">
        <h4>Choose Background</h4>
        <div class="choose-bg">
          <div class="bg-1">
            <span></span>
            <h5>Light</h5>
          </div>
          <div class="bg-2">
            <span></span>
            <h5>Dim</h5>
          </div>
          <div class="bg-3">
            <span></span>
            <h5>Dark</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>