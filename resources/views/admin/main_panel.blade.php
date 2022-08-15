@extends('admin.masterTemplate.layoutMaster')

@section('content')

<div class="container" style="margin-top:3%; padding-top: 5%;">
   <!--  <div class="accordian">
        <ul>
            <li>
                <div class="image_title">
                    <a href="{{ route('admin.listUser') }}">Gestão de Usuários</a>
                </div>
                <a href="{{ route('admin.listUser') }}">
                    <img src="{{ URL('\storage\images\img1_user_edit.jpg') }}" />
                </a>
            </li>
            <li>
                <div class="image_title">
                    <a href="{{-- route('event.index') --}}">Calendário de Eventos</a>
                </div>
                <a href="{{-- route('event.index') --}}">
                    <img src="{{ URL('\storage\images\img2_calendar.jpg') }}" />
                </a>
            </li>
            <li>
                <div class="image_title">
                    <a href="upload_menu.php">Postagens</a>
                </div>
                <a href="upload_menu.php">
                    <img src="{{ URL('\storage\images\img3_posts.jpg') }}" />
                </a>
            </li>
            <li>
                <div class="image_title">
                    <a href="control_panel_messages.php">Mensagens</a>
                </div>
                <a href="control_panel_messages.php">
                    <img src="http://thecodeplayer.com/uploads/media/2rT2vdx.jpg" />
                </a>
            </li>
            @role('master')
            <li>
                <div class="image_title">
                    <a href="{{-- route('admin.listPerm') --}}">Permissões</a>
                </div>
                <a href="{{-- route('admin.listPerm') --}}">
                    <img src="http://thecodeplayer.com/uploads/media/8k3N3EL.jpg" />
                </a>
            </li>
            @endrole
        </ul>
    </div>
    <div class="col-md-12">
        <div class="md-form" style="margin-top: 3%;">
            <form method="POST" action="{{-- route('admin.logout') --}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-black">Sair</button>
            </form>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-success" style="border:1px solid #d2e4e2;">
            <div class="panel-heading" style="background-color: #ebf8f7; border-top-style: groove; border-top-width: 6px; border-top-color:#017e73; height:100px; padding-top:2%; text-align: center;"><i class="fa fa-user fa-3x"></i>
                <h3 class="panel-title">
                    Usuários</h3>
            </div>
            <ul class="list-group">
                <a href="#" class="list-group-item">Minha Conta</a>
                <a href="{{ route('admin.listUser') }}" class="list-group-item">Listagem de Usuários</a>
                <a href="#" class="list-group-item">Atividades de Usuários</a>
                {{-- @role('master') --}}
                <a href="{{ route('admin.listPerm') }}" class="list-group-item">Perfis e Permissões</a>
                {{-- @endrole --}}
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success" style="border:1px solid #d2e4e2;">
            <div class="panel-heading" style="background-color: #ebf8f7; border-top-style: groove; border-top-width: 6px; border-top-color:#017e73; height:100px; padding-top:2%; text-align: center;"><i class="fa fa-tasks fa-3x"></i>
                <h3 class="panel-title">
                    Atividades</h3>
            </div>
            <ul class="list-group">
                <a href="{{-- route('event.index') --}}" class="list-group-item">Calendário de Eventos</a>
                <a href="#" class="list-group-item">Listagem de Eventos</a>
                <a href="#" class="list-group-item" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">Postagens&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                   
                        <a href="{{-- route('admin.mainPost') --}}" class="list-group-item">Menu Geral de Postagens</a>
                        <a href="#" class="list-group-item">Estatísticas de Postagens</a>
                 
                  </div>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success" style="border:1px solid #d2e4e2;">
            <div class="panel-heading" style="background-color: #ebf8f7; border-top-style: groove; border-top-width: 6px; border-top-color:#017e73; height:100px; padding-top:2%; text-align: center;"><i class="fa fa-envelope fa-3x"></i>
                <h3 class="panel-title">
                    Mensagens</h3>
            </div>
            <ul class="list-group">
                <a href="{{-- route('admin.newMsg') --}}" class="list-group-item">Enviar Mensagem</a>
                <a href="{{-- route('admin.mainMsg') --}}" class="list-group-item">Gerenciar Mensagens</a>
                <a href="#" class="list-group-item" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Contato dos Visitantes&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                   
                        <a href="#" class="list-group-item">Todos</a>
                        <a href="#" class="list-group-item">Problemas</a>
                        <a href="#" class="list-group-item">Dúvidas</a>
                        <a href="#" class="list-group-item">Sugestões</a>
                 
                  </div>
            </ul>
        </div>
    </div>
</div> 

@endsection