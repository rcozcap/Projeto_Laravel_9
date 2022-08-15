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
<form role="form" action="{{ route('admin.atribPerm') }}" class="form-horizontal" method="POST"
enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Criação do Perfil</h3>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247" for="Name (Full name)">Nome*</label>
                                            <input id="permName" name="perm_name" type="text" placeholder="Nome da Permissão" class="form-control {{ $errors->has('perm_name') ? ' is-invalid' : '' }}" value="">
                
                                            @if ($errors->has('perm_name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('perm_name') }}
                                                </span>
                                            @endif
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247" for="Name (Full name)">Nome de Exibição*</label>
                    <input id="displayPerN" name="perm_display" type="text" placeholder="Nome de Exibição" class="form-control {{ $errors->has('perm_display') ? ' is-invalid' : '' }}" value="">

                    @if ($errors->has('perm_display'))
                        <span class="text-danger">
                            {{ $errors->first('perm_display') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                    for="permDesc">Descrição*</label>
                <input id="permDesc" name="perm_description" type="text" placeholder="Descrição"
                    class="form-control {{ $errors->has('perm_description') ? ' is-invalid' : '' }}" value="">

                    @if ($errors->has('perm_description'))
                        <span class="text-danger">
                            {{ $errors->first('perm_description') }}
                        </span>
                    @endif
                </div>
                <script>
                    function getAndSetVal(){
                        var roleTxt = document.getElementById('permName').value;
                        document.getElementById('get_created_perm').value = roleTxt;
                    }

                </script>

                <button onclick="getAndSetVal();" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Avançar</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Associar Perfis</h3>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="newPerm">Nova Permissão</label>
                                    <input id="get_created_perm" name="perm_description" type="text" placeholder="Sobrenome"
                                    class="form-control {{ $errors->has('perm_description') ? ' is-invalid' : '' }}" value="" disabled>

                                @if ($errors->has('perm_description'))
                                    <span class="text-danger">
                                        {{ $errors->first('perm_description') }}
                                    </span>
                                @endif
                    
                </div>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="attRole">Atribuir Perfis*</label>
                                <select multiple="multiple" name="role[]" id="select"
                                    class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('role'))
                                    <span class="text-danger">
                                        {{ $errors->first('role') }}
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