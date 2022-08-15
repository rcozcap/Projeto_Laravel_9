<link href="{{ asset('css/style.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<link href="{{ asset('css/personalized/format.css') }}" rel="stylesheet">

<body style="background-color: #E3DFD2">

    <div class="container" id="adm_my_profile" style="margin: 7% 20%; background-color: #E3DFD2">
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <form action="{{ route('user.store') }}" class="form-horizontal" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Form Name -->
                    <legend>Dados do Novo Usuário</legend>

                    <div class="row">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Text input-->

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Name (Full name)">Nível de Acesso*</label>
                                <input id="Name (Full name)" name="create_level" type="text" placeholder="Nível de Acesso"
                                    class="form-control {{ $errors->has('create_level') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('create_level'))
                                        <span class="text-danger">
                                            {{ $errors->first('create_level') }}
                                        </span>
                                    @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="md-form">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Name (Full name)">Nome*</label>
                                <input id="create_name" name="create_name" type="text" placeholder="Nome"
                                    class="form-control {{ $errors->has('create_name') ? ' is-invalid' : '' }}">

                                @if ($errors->has('create_name'))
                                    <span class="text-danger">
                                        {{ $errors->first('create_name') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Name (Full name)">Sobrenome*</label>
                                <input id="create_last_name" name="create_last_name" type="text" placeholder="Sobrenome"
                                    class="form-control {{ $errors->has('create_last_name') ? ' is-invalid' : '' }}">

                                @if ($errors->has('create_last_name'))
                                    <span class="text-danger">
                                        {{ $errors->first('create_last_name') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- File Button -->
                        <div class="col-md-12">
                            <label class="col-md-12" style="margin-top: 1%; color:#585247"
                                for="Upload photo">Upload de Foto</label>
                            <div class="md-form">
                                <input id="Upload photo" name="create_photo" type="file" class="input-file {{ $errors->has('create_photo') ? ' is-invalid' : '' }}">

                                @if ($errors->has('create_photo'))
                                    <span class="text-danger">
                                        {{ $errors->first('create_photo') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Senha*</label>
                                <input id="pass" name="create_pass" type="password" placeholder="Senha"
                                    class="form-control {{ $errors->has('create_pass') ? ' is-invalid' : '' }}">

                                @if ($errors->has('create_pass'))
                                    <span class="text-danger">
                                        {{ $errors->first('create_pass') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Confirmação de Senha*</label>
                                <input id="pass_confirmation" name="create_pass_confirmation" type="password"
                                    style="float:left;" placeholder="Confirme sua Senha"
                                    class="form-control {{ $errors->has('create_pass') ? ' is-invalid' : '' }}">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-12">
                            <div class="md-form">
                                <label class="col-md-12" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Lembrete de Senha*</label>
                                <input id="Date Of Birth" name="create_pass_rem" type="text" placeholder="Lembrete"
                                    class="form-control {{ $errors->has('create_pass_rem') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('create_pass_rem'))
                                        <span class="text-danger">
                                            {{ $errors->first('create_pass_rem') }}
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Date Of Birth">Data de Nascimento*</label>
                                <input id="Date Of Birth" name="create_age" type="date" placeholder="Data de Nascimento"
                                    class="form-control {{ $errors->has('create_age') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('create_age'))
                                        <span class="text-danger">
                                            {{ $errors->first('create_age') }}
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-12">
                            <div class="md-form">
                                <label class="col-md-12" style="margin-top: 1%; color:#585247"
                                    for="Primary Occupation">Profissão</label>
                                <input id="Primary Occupation" name="create_job" type="text" placeholder="Profissão"
                                    class="form-control input-md">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Secondary Occupation (if any)">Especialização</label>
                                <input id="Secondary Occupation (if any)" name="create_specialization" type="text"
                                    placeholder="Especialização" class="form-control input-md">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247" for="Skills">Nível
                                    de Escolaridade</label>
                                <input id="Skills" name="create_educ_lvl" type="text"
                                    placeholder="Graduação/Pós/Mestrado..." class="form-control input-md">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Phone number ">Telefone para Contato</label>
                                <input id="Phone number " name="create_phone" type="text" placeholder="Digite apenas os números"
                                    class="form-control {{ $errors->has('create_phone') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('create_phone'))
                                        <span class="text-danger">
                                            {{ $errors->first('create_phone') }}
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Email Address">Endereço de E-mail*</label>
                                <input id="Email Address" name="create_email" type="email"
                                    placeholder="Endereço de E-mail" class="form-control {{ $errors->has('create_email') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('create_email'))
                                        <span class="text-danger">
                                            {{ $errors->first('create_email') }}
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Multiple Checkboxes -->
                        <div class="col-md-12">
                            <div class="md-form">
                                <div class="checkbox">
                                    <label class="col-md-12" style="margin-top: 1%; color:#585247"
                                        for="Languages Known">Idiomas</label>
                                    <label for="Languages Known-0">
                                        <input type='checkbox' name='create_lang_1' id='Languages Known-0'>
                                        Inglês
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="Languages Known-1">
                                        <input type='checkbox' name='create_lang_2' id='Languages Known-1'>
                                        Espanhol
                                    </label>
                                </div>

                                <div class="othertop">
                                    <label for="Languages Known-4">

                                    </label>

                                    <input type="input" name="create_lang_3" id="Languages Known-4" placeholder="Outro">
                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="col-md-12">
                            <div class="md-form">
                                <label class="col-md-6" style="margin-top: 1%; color:#585247"
                                    for="Working Experience (time period)">Tempo Exercendo a Profissão</label><br>
                                <input class="col-md-1" id="Working Experience (time period)" name="create_occup_time" type="text" class="form-control {{ $errors->has('create_occup_time') ? ' is-invalid' : '' }}">
                                <label class="col-md-2" style="margin-top: 1%; color:#585247"
                                    for="Working Experience (time period)">Anos</label><br>

                                @if ($errors->has('create_occup_time'))
                                    <span class="text-danger">
                                        {{ $errors->first('create_occup_time') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="col-md-12">
                            <div class="md-form">
                                <label class="col-md-12" style="margin-top: 1%; color:#585247"
                                    for="Overview (max 200 words)">Apresentação (max 500 caracteres)</label>
                                <textarea class="form-control" rows="10" id="Overview (max 200 words)"
                                    name="create_overview" placeholder="Digite aqui o texto..."></textarea>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="md-form" style="margin-top: 1%;">
                                <button type='submit' class="btn btn-black">Cadastrar Novo Usuário</button>
                                <button type='reset' class="btn btn-black">Limpar Campos</button>

                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <div class="col-md-12">
                <div class="md-form" style="margin-top: 3%;">
                    <form method="GET" action="{{ route('admin.listUser') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-black">Voltar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <body>
