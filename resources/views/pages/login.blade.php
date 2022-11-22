@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
          	<div class="col-lg-4">
            	<div class="card">
              		<div class="card-body p-lg-5">
                		{{ Form::open(['route' => 'login.post']) }}
                            @include('partials.mesage')
                  			<div class="form-floating mb-3">
                    			<input class="form-control" id="floatingInput" type="text" placeholder="Example.com" name="username">
                    			<label for="floatingInput">Usuario</label>
                  			</div>
                  			<div class="form-floating mb-3">
                    			<input class="form-control" id="floatingPassword" type="password" placeholder="Contraseña" name="password">
                    			<label for="floatingPassword">Contraseña</label>
                  			</div>
                  			<button class="btn btn-primary btn-lg" type="submit">Iniciar Sesión</button>
                        {{ Form::close() }}
              		</div>
            	</div>
          	</div>
        </div>
    </div>
@endsection