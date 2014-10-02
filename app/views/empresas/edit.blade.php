edit.blade.php
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
			            <label class="control-label col-md-2">codigo</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la persona" name="codigo" type="text" value="{{ $empresa->codigo }}"/>
			            </div>
			        </div>

              <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">
		          <div class="form-group">
			            <label class="control-label col-md-2">Nombre</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la persona" name="nombre" type="text" value="{{ $empresa->nombre }}"/>
			            </div>
			        </div>


					<div class="form-group">
			            <label class="control-label col-md-2">id_persona</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="id de la persona" name="id_persona" type="text" value="{{ $empresa->id_persona }}">
			            </div>
			        </div>

			         <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">
		          <div class="form-group">
			            <label class="control-label col-md-2">Dirección</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la persona" name="Dirección" type="text" value="{{ $empresa->direccion }}"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Rif</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el rif de la empresa" name="rif" type="text" value="{{ $empresa->rif }}">
			            </div>
			        </div>
			         <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">
		          <div class="form-group">
			            <label class="control-label col-md-2">tlf</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el tlf de la empresa" name="tlf" type="text" value="{{ $empresa->tlf }}"/>
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