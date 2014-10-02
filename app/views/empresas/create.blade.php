
@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Creación de formulario Empresa
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
			            <label class="control-label col-md-2">Código</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Codigo de la empresa" name="codigo" type="text"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Nombre de la Empresa</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre del representate" name="nombre" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Representante</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_persona">
			              	@foreach( $personas as $persona )
			              	<option value="{{ $persona->id }}">{{ $persona->nombre }} - {{ $persona->cedula}}</option>
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
			              <input class="form-control" placeholder="Escriba direccion de la empresa" name="direccion" type="text">
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-md-2">Teléfono</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el telefono de la empresa" name="telefono" type="text">
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-md-2">Municipio</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_municipio">
			              	@foreach( $municipios as $municipio )
			              	<option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
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
			                <input class="form-control" type="text" name="fecha_ingreso"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-md-2">Servicio</label>
			            <div class="col-md-7">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_servicio">
			              	@foreach( $servicios as $servicio )
			              	<option value="{{ $municipio->id }}">{{ $servicio->descripcion }}</option>
			              	@endforeach
			              </select>
			            </div>
			          </div>
			        <!--<div class="form-group">
			            <label class="control-label col-md-2">Servicio *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Seleccione el servicio de la empresa" name="id_servicio" type="text">
			            </div>
			        </div>-->
			        
			        <div class="form-group">
			            <label class="control-label col-md-2">Actividad *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Seleccione el servicio de la empresa" name="id_actividad" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Rif</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el fif" name="rif" type="text">
			            </div>
			        </div>

			       <div class="form-group">
			            <label class="control-label col-md-2">Capital</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="El capital de la empresa" name="capital" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Número de Registro</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el numero de registro" name="num_registro" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Fecha de Registro</label>
			            <div class="col-md-3">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_registro"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">SNC</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el numero de snc" name="snc" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Fecha de SNC</label>
			            <div class="col-md-3">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_snc"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Dias Provisional</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Dias provisionales" name="dias_provicional" type="text">
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Provisional</label>
			            <div class="col-md-7 clearfix">
			              <div class="holder">
			                <input class="check-ios" id="check" name="provisional" type="checkbox" value="None"><label for="check"></label><span></span>
			              </div>
			              <em>(Chequee el botón si la empresa es provisional)</em>
			            </div>
			        </div>
			        <div class="form-group">
			            <label class="control-label col-md-2">Tipo de Empresa *</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="seleccione el tipo de empresa" name="id_tipo_empresa" type="text">
			            </div>
			        </div>

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