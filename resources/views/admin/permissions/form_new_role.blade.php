@extends('admin.masterTemplate.layoutMaster')

@section('content')

<!------ Include the above in your HEAD tag ---------->

<div class="container" style="padding-top:15%;">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Criação</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-secondary btn-circle disabled">2</a>
            <p>Associação</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-secondary btn-circle disabled">3</a>
            <p>Confirmação</p>
        </div>
    </div>
</div>
<form role="form" action="{{ route('admin.createRole') }}" class="form-horizontal" method="POST"
enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Criação do Perfil</h3>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247" for="Name (Full name)">Nome*</label>
                                            <input id="roleName" name="role_name" type="text" placeholder="Nível de Acesso" class="form-control {{ $errors->has('edit_level') ? ' is-invalid' : '' }}" value="">
                
                                            @if ($errors->has('edit_level'))
                                                <span class="text-danger">
                                                    {{ $errors->first('edit_level') }}
                                                </span>
                                            @endif
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247" for="Name (Full name)">Nome de Exibição*</label>
                    <input id="Name (Full name)" name="role_display" type="text" placeholder="Nome Completo" class="form-control {{ $errors->has('edit_name') ? ' is-invalid' : '' }}" value="">

                    @if ($errors->has('edit_name'))
                        <span class="text-danger">
                            {{ $errors->first('edit_name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                    for="Name (Full name)">Descrição*</label>
                <input id="create_last_name" name="role_description" type="text" placeholder="Sobrenome"
                    class="form-control {{ $errors->has('edit_last_name') ? ' is-invalid' : '' }}" value="">

                    @if ($errors->has('edit_last_name'))
                        <span class="text-danger">
                            {{ $errors->first('edit_last_name') }}
                        </span>
                    @endif
                </div>
                <script>
                    function getAndSetVal(){
                        var roleTxt = document.getElementById('roleName').value;
                        document.getElementById('get_created_role').value = roleTxt;
                    }

                </script>

                <button onclick="getAndSetVal();" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Avançar</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Associar Permissões</h3>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Novo Perfil</label>
                                    <input id="get_created_role" name="role_description" type="text" placeholder="Sobrenome"
                                    class="form-control {{ $errors->has('edit_last_name') ? ' is-invalid' : '' }}" value="" disabled>

                                @if ($errors->has('edit_pass'))
                                    <span class="text-danger">
                                        {{ $errors->first('edit_pass') }}
                                    </span>
                                @endif
                    
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Atribuir Permissões*</label>
                                <select multiple="multiple" name="perm[]" id="select"
                                    class="form-control {{ $errors->has('edit_pass') ? ' is-invalid' : '' }}">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('edit_pass'))
                                    <span class="text-danger">
                                        {{ $errors->first('edit_pass') }}
                                    </span>
                                @endif
                </div>
                
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Avançar</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Confirmar e Finalizar</h3>
                <button class="btn btn-success btn-lg pull-right" type="submit">Confirmar</button>
            </div>
        </div>
    </div>
</form>
</div>

@endsection