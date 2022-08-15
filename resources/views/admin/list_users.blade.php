@extends('admin.masterTemplate.layoutMaster')

@section('content')

<div class="container">
<div class="container2" style="margin-top:15%;">
  @role(['master', 'admin'])
	<div class="row">
		<a class="btn btn-black" style="margin-top: 2%; width: 20%; margin-left: 80%;" href="{{ route('admin.newUser') }}">+ Novo Usuário</a>
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

  <div class="row">

    @foreach ($users as $user)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          {{-- @role(['master' && 'admin']) --}}
          <a href="{{ route('admin.editUser', $user->id) }}">
          {{-- @endrole --}}
            {{-- <img class="img-fluid" style="width:165px; height:132px;" src="{{ env('APP_URL')}}/storage/{{ $user->photo }}"> --}}
          </a>
        </div>
        <div class="team-content">
          <h3 class="name">{{ $user->name}}</h3>
          <h4 class="title">{{ $user->job }}</h4>

          <h4 class="title">Idade: {{ \Carbon\Carbon::parse($user->birth)->diffInYears().' anos' }}</h4>
        </div>
        <ul class="social">
          <li><a href="{{ route('admin.editUser', $user->id) }}" class="fa fa-facebook-square" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-google-plus" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin"
           aria-hidden="true"></a></li>
          <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          @role(['master' && 'admin'])
          <li><a href="{{ route('admin.destroyUser', ['user' => $user->id]) }}" class="fa fa-trash" aria-hidden="true" title="Deletar usuário" onclick="return confirm('Tem certeza que deseja deletar esse usuário?');"></a></li>
          @endrole
        </ul>
      </div>
    </div>
    @endforeach

<div class="col-md-12">
                            <div class="md-form" style="margin-top: 3%;">
                              <form method="GET" action="{{ route('admin') }}">
                                    <button type="submit" class="btn btn-black">Voltar</button>
                                </form>
                            </div>
                        </div>
  </div>
</div>

@endsection