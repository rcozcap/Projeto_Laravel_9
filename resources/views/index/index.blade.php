<link href="{{ asset('css/style.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<link href="{{ asset('css/menu_index.css') }}" rel="stylesheet">

<body style="background-color:#ebf8f7;">
<nav id="hexNav">
    <div id="menuBtn">
      <svg viewbox="0 0 100 100">
        <polygon points="50 2 7 26 7 74 50 98 93 74 93 26" fill="transparent" stroke-width="4" stroke="#585247" stroke-dasharray="0,0,300"/>
      </svg>
      <span></span>
    </div>
    <ul id="hex">
    <li class="tr"><div class="clip"><a href="{{ route('admin.login') }}" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/login_img.jpg" alt="" />
        <h2 class="title">Login</h2><p id="menu_desc">Área de Administrador</p>
      </a></div></li>
      <li class="tr"><div class="clip"><a href="events_page.php" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/img2_calendar.jpg" alt="" />
        <h2 class="title">Eventos</h2><p id="menu_desc">Calendário de Eventos</p>
      </a></div></li>
      <li class="tr"><div class="clip"><a href="documents_list_menu.php" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/posts_menu.jpg" alt="" />
        <h2 class="title">Postagem</h2><p id="menu_desc">Tudo sobre segurança</p>
      </a></div></li>
      <li class="tr"><div class="clip"><a href="{{ route('index.epis') }}" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/EPIs_img_menu.jpg" alt="" />
        <h2 class="title">EPIs</h2><p id="menu_desc">Conheça os principais EPIs</p>
      </a></div></li>
      <li class="tr"><div class="clip"><a href="#" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/maintenance.png" alt="" />
        <h2 class="title">Aguarde</h2><p>Novidades em breve!</p>
      </a></div></li>
      <li class="tr"><div class="clip"><a href="" class="content">
        <img src="{{ env('APP_URL')}}/storage/images/contact.jpg" alt="" />
        <h2 class="title">Contato</h2><p>Fale conosco</p>
      </a></div></li>
    </ul>
  </nav>
</body>
  <script>
      var hexNav = document.getElementById('hexNav');
  
  document.getElementById('menuBtn').onclick = function() {
      var className = ' ' + hexNav.className + ' ';
      if ( ~className.indexOf(' active ') ) {
          hexNav.className = className.replace(' active ', ' ');
      } else {
          hexNav.className += ' active';
      }              
  }
  </script>