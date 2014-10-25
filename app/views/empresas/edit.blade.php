@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Edición Formulario Empresas
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
		        <div class="heading">
		            <a href="{{ $route }}"><i class="icon-user"></i>Ir Atrás</a>
		        </div>
               
 				<div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">
			  		<div class="form-group">
			            <label class="control-label col-md-2">Tipo de Empresa</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_tipo_empresa" id="id_tipo_empresa" required>
			              	@foreach( $tipo_empresas as $tipo_empresa )
			              		@if($empresa->id_tipo_empresa == $tipo_empresa->id)
			              			<option value="{{ $tipo_empresa->id }}" selected>{{ $tipo_empresa->descripcion }}</option>
			              		@else
			              			<option value="{{ $tipo_empresa->id }}">{{ $tipo_empresa->descripcion }}</option>
			              		@endif
			              	@endforeach
			              </select>
			            </div>
			          </div>

		          	<div class="form-group">
			            <label class="control-label col-md-2">Código</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Codigo de la empresa" name="codigo" type="text" id="id_codigo" readonly required value="{{ $empresa->codigo }}"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Nombre de la Empresa</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre del representate" name="nombre" type="text" required value="{{ $empresa->nombre }}">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Representante</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_persona" required>
			              	@foreach( $personas as $persona )
			              		@if($empresa->id_persona)
			              			<option value="{{ $persona->id }}" selected>{{ $persona->nombre }} - {{ $persona->cedula}}</option>
			              		@else
			              			<option value="{{ $persona->id }}">{{ $persona->nombre }} - {{ $persona->cedula}}</option>
			              		@endif
			              	@endforeach
			              </select>
			            </div>
			          </div>
			        <!--
					<div class="form-group">
			            <label class="control-label col-md-2">Representante *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre del representate" name="id_persona" type="text">
			            </div>
			        </div>-->
					<div class="form-group">
			            <label class="control-label col-md-2">Dirección</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba direccion de la empresa" name="direccion" type="text" required value="{{$empresa->direccion}}">
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-md-2">Teléfono</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el telefono de la empresa" name="telefono" type="text" required value="{{$empresa->telefono}}">
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-md-2">Municipio</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_municipio" required>
			              	@foreach( $municipios as $municipio )
			              		@if($empresa->id_municipio == $municipio->id)
			              			<option value="{{ $municipio->id }}" selected>{{ $municipio->nombre }}</option>
			              		@else
			              			<option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
			              		@endif
			              	@endforeach
			              </select>
			            </div>
			          </div>
			        <!--
			        <div class="form-group">
			            <label class="control-label col-md-2">Municipio *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Seleccione el municipio de la empresa" name="id_municipio" type="text">
			            </div>
			        </div>-->
			        <div class="form-group">
			            <label class="control-label col-md-2">Fecha de Ingreso</label>
			            <div class="col-md-3">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_ingreso" required value="{{ $empresa->fecha_ingreso}}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>
			        <!--<div class="form-group">
			            <label class="control-label col-md-2">Servicio *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Seleccione el servicio de la empresa" name="id_servicio" type="text">
			            </div>
			        </div>-->
			        
			        <!--<div class="form-group">
			            <label class="control-label col-md-2">Actividad *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Seleccione el servicio de la empresa" name="id_actividad" type="text">
			            </div>
			        </div>-->

			        <div class="form-group">
			            <label class="control-label col-md-2">Actividad</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_actividad" required>
			              	@foreach( $actividades as $actividad )
			              		@if($empresa->id_actividad == $actividad->id)
			              			<option value="{{ $actividad->id }}" selected>{{ $actividad->descripcion }}</option>
			              		@else
			              			<option value="{{ $actividad->id }}">{{ $actividad->descripcion }}</option>
			              		@endif
			              	@endforeach
			              </select>
			            </div>
			          </div>


			        <div class="form-group">
			            <label class="control-label col-md-2">Rif</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el fif" name="rif" type="text" required value="{{$empresa->rif}}">
			            </div>
			        </div>

			       <div class="form-group">
			            <label class="control-label col-md-2">Capital</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="El capital de la empresa" name="capital" type="text" required value="{{$empresa->capital}}">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Número de Registro</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el numero de registro" name="num_registro" type="text" required value="{{$empresa->num_registro}}">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Fecha de Registro</label>
			            <div class="col-md-3">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_registro" required value="{{$empresa->fecha_registro}}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">SNC</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el numero de snc" name="snc" type="text" value="{{$empresa->snc}}">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Fecha de SNC</label>
			            <div class="col-md-3">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_snc" required value="{{$empresa->fecha_snc}}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Dias Provisional</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Dias provisionales" name="dias_provicional" type="text" value="{{$empresa->dias_provicional}}">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Provisional</label>
			            <div class="col-md-7 clearfix">
			              <div class="holder">
			                <input class="check-ios" id="check" name="provisional" type="checkbox" value="None" {{ $empresa->provisional ? 'checked' : '' }} ><label for="check"></label><span></span>
			              </div>
			              <em>(Chequee el botón si la empresa es provisional)</em>
			            </div>
			        </div>
			        




			        <!--<div class="form-group">
			            <label class="control-label col-md-2">Tipo de Empresa *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="seleccione el tipo de empresa" name="id_tipo_empresa" type="text">
			            </div>
			        </div>-->

					<div class="form-group">
			            <label class="control-label col-md-2"></label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="" value="Enviar" type="submit">
			            </div>
			        </div>
		        </form>
		      </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
        @stop