@extends('admin.masterTemplate.layoutMaster')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<style>

.mt-100 {
    margin-top: 100px
}

body {
    color: #514B64;
    min-height: 100vh
}
</style>

<script>
$(document).ready(function(){

var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
removeItemButton: true,
maxItemCount:35,
searchResultLimit:35,
renderChoiceLimit:35
});


});
    </script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="padding-top:15%;">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Associação</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-secondary btn-circle disabled">3</a>
            <p>Confirmação</p>
        </div>
    </div>
</div>
<form name="edit_role_form" role="form" action="{{ route('admin.updateRoleUser', $user->id) }}" class="form-horizontal" method="POST"
enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Usuário</h3>
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Usuário</label>
                                   
                                    <input id="get_created_role" name="role_description" type="text" placeholder="Sobrenome"
                                    class="form-control {{ $errors->has('edit_last_name') ? ' is-invalid' : '' }}" value="{{ $user->name }} {{ $user->last_name }}">
                                   
                                @if ($errors->has('edit_pass'))
                                    <span class="text-danger">
                                        {{ $errors->first('edit_pass') }}
                                    </span>
                                @endif
                    
                </div>
                
                <div class="form-group">
                    <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Atribuir Perfis*</label>
                                <select id="choices-multiple-remove-button" multiple name="perm[]" id="select"
                                    class="form-control {{ $errors->has('edit_pass') ? ' is-invalid' : '' }}">
                                    
                                    @foreach ($user->roles as $roleOld)
                                    
                                    <option value="{{ $roleOld->id }}" @selected($roleOld->name == $roleOld->name)>{{$roleOld->name}}
                                    </option>
                                    
                                    @endforeach  
                                    
                                    @foreach ($roles as $role)
                                    
                                    <option value="{{ $role->id }}" @disabled($role->id == $user->roles->pluck('id')->contains($role->id))>{{$role->name}}</option>
                                     
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
    <div class="row setup-content" id="step-2">
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