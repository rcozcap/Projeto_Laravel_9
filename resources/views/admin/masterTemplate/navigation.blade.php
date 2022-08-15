<nav style="padding:1% 5% 1% 5%; height: auto; background-color:#1a522e"
    class="navbar fixed-top navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="{{ env('APP_URL')}}/storage/images/seg2.png" width="60" height="60" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#HeaderNavbar"
        aria-controls="HeaderNavbar" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 justify-content-center" id="HeaderNavbar">
        <ul class="navbar-nav">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}" title="main_adm"><i class="fa fa-user">&nbsp;</i><span
                        class="ttip">Menu de Administrador</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" title="posts"> <i class="fa fa-clipboard">&nbsp;</i><span
                        class="ttip">Postagens</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{-- route('event.index') --}}" title="events"> <i class="fa fa-calendar">&nbsp;</i><span
                        class="ttip">Eventos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index.main') }}" title="menu"> <i class="fa fa-home">&nbsp;</i><span
                        class="ttip">Menu Inicial</span></a>
            </li>
        </ul>
    </div>
        <div class="navbar-collapse collapse justify-content-end" id="HeaderNavbar">
        <ul class="navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown" data-toggle="dropdown">
                    <span class = "badge" id = "number">
                        <i class="fa fa-bell-o fa-lg">
                            
                        {{-- @if(Auth::user()->messages()->where("sender_id", "=", Auth::user()->id)) --}}
                        
                        {{-- Auth::user()->messages()->where("recipient", Auth::user()->name)->where("unread",true)->count() --}}
                           
                        {{-- @endif --}}
                        
                        </i>
                    </span>
                </a>
                <ul style="width:300px; max-height:500px; overflow-y: scroll; overflow-x: hidden; transform: translate3d(-250px, 5px, 0px); color:#E3DFD2;"
                    class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a style="background-color: #e7f7ef; color:#1a522e;" class="dropdown-item" href="#">Mensagens <span
                    class="fa fa-envelope"></span></a></li>
                <li><a style="background-color: #e7f7ef; color:#e7f7ef; background-color:#012925" class="dropdown-item" href="{{-- route('admin.clearMsg') --}}">Marcar todas como lidas</a></li>
                <li class="divider"></li>
                   {{-- @foreach (Auth::user()->messages as $message) --}}
                <li><a style="color:#1a522e" class="dropdown-item" href="#">Enviada por: {{-- $message->sender --}} <br>Assunto: {{-- $message->subject --}} <br>Mensagem: {{-- $message->text --}}&nbsp;</a></li>
                <li class="divider" style="border-bottom: 1px solid #1a522e"></li>
                {{-- @endforeach --}}
                </ul>
        <li class="divider"></li>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown" data-toggle="dropdown"><img class="img-fluid"
                        style="width:65px; height:50px; border-radius: 50%;"
                        {{-- src="{{ env('APP_URL') }}/storage/{{ Auth::user()->photo }}" --}}></a>
                <ul style="width:auto; transform: translate3d(-160px, 5px, 0px); color:#E3DFD2;"
                    class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a style="color:#1a522e" class="dropdown-item" href="#">Conta &nbsp;<span
                                class="fa fa-user"></span></a></li>
                    <li class="divider"></li>
                    <li><a style="color:#1a522e" class="dropdown-item" href="#">Status do Usuário &nbsp;<span
                                class="fa fa-line-chart"></span></a></li>
                    <li class="divider"></li>
                    <li><a style="color:#1a522e" class="dropdown-item" href="#">Mensagens privadas <span
                                class="fa fa-envelope"> 42 </span></a></li>
                    <li class="divider"></li>
                    <li><a style="color:#1a522e" class="dropdown-item" href="{{-- route('event.index') --}}">Eventos <span
                                class="fa fa-calendar"></span></a></li>
                    <li class="divider"></li>
                    <li><a style="color:#1a522e" class="dropdown-item" href="#">Postagens <span
                                class="fa fa-clipboard"></span></a></li>
                    <li class="divider"></li>
                    <li><a style="color:#1a522e" class="dropdown-item" href="{{ route('admin.logout') }}">Sair <span
                                class="fa fa-sign-out"></span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>