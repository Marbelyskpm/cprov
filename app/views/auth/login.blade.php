@extends('auth.layout')

@section('content')
    <!-- Login Screen -->
    <div class="login-wrapper">
      <div class="login-container" style="height:250px">
        <a href="/index.html"><img width="130" height="50" src="/images/gba.jpg" /></a>
        	@if(isset($error))
				<div style="color:#A33;">
					Error: {{ $error }}
				</div>
        	@endif
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" placeholder="Usuario" type="text" name="username">
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Contraseña" type="password" name="password"><input type="submit" value="&#xf054;">
          </div>
        </form>
      </div>
    </div>
    <!-- End Login Screen -->

@stop