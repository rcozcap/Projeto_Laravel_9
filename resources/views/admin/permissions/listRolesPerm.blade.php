@extends('admin.masterTemplate.layoutMaster')

@section('content')

<div class="container">
<div class="container2" style="margin-top:15%;">
  @role(['master', 'admin'])
	<div class="row">
		<a class="btn btn-black" style="margin-top: 2%; width: 20%; margin-left: 80%;" href="{{ route('admin.newUser') }}">+ Nova Permissão</a>
	</div>
  @endrole
</div>

@if ($errors->any())
<div class="alert alert-danger col-sm-6">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <p> {{ \session::get('success')}} </p>
                </div>
            @endif

            <div class="user_container" style="padding-top:2%;">

<div class="user_container" style="padding-bottom:5%; background-color:#fbfcfb; border: solid 2px #d2e4e2;">

    <div class="col-12">
        <div class="col-12" style="background-color:#1a522e;">
            <h3 style="color:#fbfcfb; padding: 0.5%;">Lista de Permissões</h3>
            <p style="background-color:#d2e4e2; padding: 0.5%;">Aqui é possível editar as permissões</p>
        </div>

        <div class="panel panel-primary filterable"
            style="max-height: 550px; overflow-y: scroll; background-color:#fbfcfb; padding-top: 1%; border-top: solid 1px #1a522e;">
            <div class="panel-heading">
                <h3 class="panel-title">Permissões</h3>
                <div class="pull-right" style="padding:1%;">
                    <button class="btn btn-site btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table id="rolPerm" class="table table-striped table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Perfil" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                    @foreach ($permissions as $perm)
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $perm->id }}</td>
                        <td>{{ $perm->name }}</td>
                        <td>{{ $perm->description }}</td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Edit"><button
                                    class="btn btn-primary btn-xs" data-title="Edit"><i
                                        class="fa fa-edit"></i></button></p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button
                                    class="btn btn-danger btn-xs" data-title="Delete"><i
                                        class="fa fa-trash"></i></button></p>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</div>
</div>
</div>
<div class="col-md-12">
                            <div class="md-form" style="margin-top: 3%; margin-left: 8%;">
                              <form method="GET" action="{{ route('admin.listPerm') }}">
                                    <button type="submit" class="btn btn-black">Voltar</button>
                                </form>
                            </div>
                        </div>
  </div>
</div>

@endsection