@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Edición de Actividad
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
			            <label class="control-label col-md-2">Descripción</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la Actividad" name="descripcion" type="text" value="{{ $actividad->descripcion }}"/>
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