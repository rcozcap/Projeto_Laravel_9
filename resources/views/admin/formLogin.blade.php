<link href="{{ asset('css/style.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<link href="{{ asset('css/personalized/format.css') }}" rel="stylesheet">
<meta charset="utf-8">
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
    <div class="login-main-text">
        <h2 id="login_side_text">Área de Administrador<br> Página de Login</h2>
        <p id="login_side_text">É preciso de login e senha para acessar a aplicação.</p>
    </div>
</div>

<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.do') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label style="margin-bottom:1%;">E-mail cadastrado</label>
                    <input style="margin-bottom:2%;" type="text" name="log_email" placeholder="User Name"
                        class="form-control {{ $errors->has('log_email') ? ' is-invalid' : '' }}">

                    @if ($errors->has('log_email'))
                        <span class="text-danger">
                            {{ $errors->first('log_email') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label style="margin-bottom:1%;">Senha</label>
                    <input style="margin-bottom:5%;" type="password" name="log_pass" placeholder="Password"
                        class="form-control {{ $errors->has('log_pass') ? ' is-invalid' : '' }}">

                    @if ($errors->has('log_pass'))
                        <span class="text-danger">
                            {{ $errors->first('log_pass') }}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-black">Login</button>
                <button type='reset' class="btn btn-dark">Limpar Campos</button>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="md-form" style="margin-top: 10%;">
            <form method="GET" action="{{ route('index.main') }}">
                <button type="submit" style="width: 24%;" class="btn btn-black">Voltar</button>
            </form>
        </div>
    </div>
</div>