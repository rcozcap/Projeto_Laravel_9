@extends('admin.masterTemplate.layoutMaster')

@section('content')

@if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <p> {{ \session::get('success')}} </p>
                </div>
            @endif

    <div class="container" style="padding-top: 0.5%;">

        <nav style="padding-top: 8%;" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Header" aria-controls="Header"
                aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100 justify-content-center" id="Header">
                <a style="height: 50px; margin:1%;" href="{{ route('admin.listRoles')}}"
                    class="btn btn-block btn btn-success">
                    <i class="fa fa-cog" id="icone_grande"></i>
                    <span class="texto_grande"> Gerenciar Perfis</span></a>

                <a style="height: 50px; margin:1%;" href="{{ route('admin.listRolesPerm') }}"
                    class="btn btn-block btn btn-success">
                    <i class="fa fa-cog" id="icone_grande"></i>
                    <span class="texto_grande"> Gerenciar Permissões</span></a>

            </div>
        </nav>

        <div class="user_container" style="padding-top:2%;">

            <div class="user_container" style="background-color:#fbfcfb; border: solid 2px #d2e4e2;">

                <div class="col-12">
                    <div class="col-12" style="background-color:#1a522e;">
                        <h3 style="color:#fbfcfb; padding: 0.5%;">Perfis de Usuários</h3>
                        <p style="background-color:#d2e4e2; padding: 0.5%;">Aqui é possível editar os perfis atrelados aos
                            usuários</p>
                    </div>

                    <div class="panel panel-primary filterable"
                        style="background-color:#fbfcfb; padding-top: 1%; border-top: solid 1px #1a522e;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Users</h3>
                            <div class="pull-right" style="padding:1%;">
                                <button class="btn btn-site btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                        <table id="user_role" class="table table-striped table-hover">
                            <thead>
                                <tr class="filters">
                                    <th style="width:5%;"><input type="text" class="form-control" placeholder="ID" disabled></th>
                                    <th style="width:25%;"><input type="text" class="form-control" placeholder="Nome" disabled></th>
                                    <th style="width:54%;"><input type="text" class="form-control" placeholder="E-mail" disabled></th>
                                    <th style="width:8%;">Editar</th>
                                </tr>
                        @foreach ($users as $user)  
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}&nbsp;{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <form method="GET" action="{{ route('admin.editRoleUser', $user->id) }}">
                                        <button class="btn btn-primary btn-xs" data-title="Edit"><i
                                        class="fa fa-edit"></i></button></form></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div class="container">
                                            <div class="row">
                                                <div class="well" style="padding: 8px 0;">
                                                    <div style="overflow-y: scroll; overflow-x: hidden; height: 100%;">
                                                        <ul class="nav nav-list">
                                                            <li><label class="tree-toggler nav-header">(+)Perfis:</label>
                                                                <ul class="nav nav-list tree" style="display:none;">
                                                                    @foreach ($user->roles as $role)

                                                                        <li>
                                                                            <div>{{ $loop->first ? '' : ' ,' }}
                                                                                {{ $role->name }}</div>
                                                                        </li>

                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection