@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
             Formulario Empresa
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
			            <label class="control-label col-md-1">Tipo de Empresa</label>
			            <div class="col-md-2">
			              <select class="select2able select2-offscreen" tabindex="-1" name="id_tipo_empresa" id="id_tipo_empresa" required readonly>
			              	@foreach( $tipo_empresas as $tipo_empresa )
			              		@if($empresa->id_tipo_empresa == $tipo_empresa->id)
			              			<option value="{{ $tipo_empresa->id }}" selected>{{ $tipo_empresa->descripcion }}</option>
			              		@else
			              			<option value="{{ $tipo_empresa->id }}">{{ $tipo_empresa->descripcion }}</option>
			              		@endif
			              	@endforeach
			              </select>
			            </div>

			            <label class="control-label col-md-1">Código</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Codigo de la empresa" name="codigo" type="text" id="id_codigo" readonly required value="{{ $empresa->codigo }}"/>
			            </div>

			            <label class="control-label col-md-1">Rif</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el rif" name="rif" type="text" required value="{{ $empresa->rif }}"> 
			            </div>
			            <label class="control-label col-md-1">Nit</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el nit" name="nit" type="text" required value="{{ $empresa->nit }}">
			            </div>
			           </div>

					<div class="form-group">
			            <label class="control-label col-md-1">Nombre de la Empresa</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el nombre de la empresa" name="nombre" type="text" required value="{{ $empresa->nombre }}">
			            </div>
			        
			            <label class="control-label col-md-1">Representante</label>
			            <div class="col-md-2" id="input-representante">
			            	<a href="/empresas/representante" class="fancybox fancybox.ajax" id="add-representante" style="display:none">Ingresar un representante</a>
			            	<input class="form-control" value="{{ $empresa->id_persona }}" type="hidden" name="id_persona" readonly>
			            	<div id="form-display-representante" style="display:block">
			            		<span id="form-display-representante-span">{{ $empresa->representante->cedula }} - {{ $empresa->representante->nombre }}{{ $empresa->representante->apellido }}</span>
			            		<a href="#" id="delete-representante" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>
			            	</div>
			            	<!--
			              	<select class="select2able select2-offscreen" tabindex="-1" name="id_persona" required>
			              		@foreach( $personas as $persona )
			              			<option value="{{ $persona->id }}">{{ $persona->nombre }} - {{ $persona->cedula}}</option>
			              		@endforeach
			              	</select>
			              	-->
			            </div>

			            <label class="control-label col-md-1">Actividad</label>
			            <div class="col-md-2">
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

			            <label class="control-label col-md-1">Fecha de Ingreso</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_ingreso" required value="{{ $empresa->fecha_ingreso }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			          </div>
			 
					<div class="form-group">
			            <label class="control-label col-md-1">Dirección</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba dirección de la empresa" name="direccion" type="text" required value="{{ $empresa->direccion }}">
			            </div>


			             <label class="control-label col-md-1">Municipio</label>
			            <div class="col-md-2">
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
			    
			            <label class="control-label col-md-1">Teléfono</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el telefono de la empresa" name="telefono" type="text" required value="{{ $empresa->telefono }}">
			            </div>

			            <label class="control-label col-md-1">Capital</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="El capital de la empresa" name="capital" type="text" required value="{{ $empresa->capital }}">
			            </div>
			        
			       
			          </div>
			       
			        <div class="form-group">

			            <label class="control-label col-md-1">Número de Registro</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de registro" name="num_registro" type="text" required value="{{ $empresa->registro->numero }}">
			            </div>

			            <label class="control-label col-md-1">Número de SNC</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de snc" name="num_snc" type="text" value="{{ $empresa->snc->numero }}">
			            </div>

			            <label class="control-label col-md-1">Número INCE</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de INCE" name="num_ince" type="text" required value="{{ $empresa->ince->numero }}">
			            </div>
			        
			            <!-- <label class="control-label col-md-1">Número ISLR</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de ISLR " name="num_islr" type="text" required value="{{ $empresa->islr->numero }}">
			            </div> -->

			            <label class="control-label col-md-1"> Solvencia Laboral</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de solvencia laboral " name="num_solvencialaboral" type="text" required value="{{ $empresa->solvencialaboral->numero }}">
			            </div>
		
			        </div>

			        <div class="form-group">

			           <label class="control-label col-md-1">Fecha de Registro</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_registro" required value="{{ date('d-m-Y', strtotime($empresa->registro->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>

			            <label class="control-label col-md-1">Fecha de SNC</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_snc" required value="{{ date('d-m-Y', strtotime($empresa->snc->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			            
			            <label class="control-label col-md-1">Fecha de INCE</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_ince" required value="{{ date('d-m-Y', strtotime($empresa->ince->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			            </div>
			            
			            <!-- <label class="control-label col-md-1">Fecha de ISLR</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_islr" required value="{{ date('d-m-Y', strtotime($empresa->islr->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			              </div>-->

			            <label class="control-label col-md-1">Fecha de Solvencia Laboral</label>
			              <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_solvencialaboral" required value="{{ date('d-m-Y', strtotime($empresa->solvencialaboral->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			           	  </div> 

					</div>

			         <div class="form-group">

						<label class="control-label col-md-1">Número de Patente</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de patente" name="num_patente" type="text" required  value="{{ $empresa->patente->numero }}">
			            </div>
 						

			            <label class="control-label col-md-1">Colegio de Ingenieros</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de licencia" name="num_coling" type="text" required value="{{ $empresa->coling->numero }}">
					    </div>

	            		<label class="control-label col-md-1">Número de Sol. Mun.</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de SOLMUNI" name="num_solmuni" type="text" required value="{{ $empresa->solmuni->licencia }}">
			            </div>

	            		<label class="control-label col-md-1">Número de Seguro</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el numero de Seguro" name="num_seguro" type="text" required value="{{ $empresa->seguro->numero }}">
			            </div>

			        </div>

					<div class="form-group">

						<label class="control-label col-md-1">Fecha de Patente</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_patente" required value="{{ date('d-m-Y', strtotime($empresa->patente->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			          	</div>
			          
			          	<label class="control-label col-md-1">Fecha Col. Ing.</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_coling" required value="{{ date('d-m-Y', strtotime($empresa->coling->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			          	</div>

			          	<label class="control-label col-md-1">Fecha Sol. Mun.</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_solmuni" required value="{{ date('d-m-Y', strtotime($empresa->solmuni->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			          	</div>

						<label class="control-label col-md-1">Fecha de Seguro</label>
			            <div class="col-md-2">
			              <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
			                <input class="form-control" type="text" name="fecha_seguro" required value="{{ date('d-m-Y', strtotime($empresa->seguro->fecha)) }}"><span class="input-group-addon"><i class="fa icon-calendar"></i></span>
			              </div>
			          	</div>

					</div>

					<div class="form-group">

						<label class="control-label col-md-1">Provisional</label>
			            <div class="col-md-4 clearfix">
				            <div class="holder">
				                <input class="check-ios" id="check" name="provisional" type="checkbox" value="true" {{ $empresa->provisional == true ? 'checked' : '' }}><label for="check"></label><span></span>
				            </div>
				              <em>(Chequee el botón si la empresa es provisional)</em>
			            </div>

			            <label class="control-label col-md-1">Dias Provisional</label>
			            <div class="col-md-2">
		              		<input class="form-control" placeholder="Dias provisionales" name="dias_provicional" type="text" value="{{ $empresa->dias_provicional }}">
			           	</div>


			            <div class="col-md-1"></div>

			            <div class="col-md-2">
			            	<a href="/empresas/socios" class="fancybox fancybox.ajax" id="add-representante">Socios</a>
			            	<div id="socios-container">
			            		@foreach($empresa->socios as $socio )
									<input type="hidden" name="socios[]" value="{{ $socio->id }}"/>
			            		@endforeach
			            	</div>
			            	<div id="form-display-representante" style="display:none">
			            		<span id="form-display-representante-span"></span>
			            		<a href="#" id="delete-representante" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>
			            	</div>
			          	</div>
			            <div class="col-md-1">
			              <input class="form-control" placeholder="" style="padding:0px" value="Enviar" type="submit">
			          	</div> 
					</div>
		        </form>
		      </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">

        $(document).on('ready', function(){
        	$("#delete-representante").click(function(e){
    			$('input[name=id_persona]').val('');
				$('#form-display-representante').css({
					'display':'none'
				});
				$('#add-representante').css({
					'display':'block'
				});
        	});
        	$('.fancybox').fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
        	$('#id_tipo_empresa').change(function(e){
        		var elem = $(this);
        		console.log("Cambio a: " + elem.val());
        		var data = {
        			'id' : elem.val(),
        		};
        		$.post('/ajax/codigoempresas', data, function(data){
        			$('#id_codigo').val(data);
        			console.log(data);
        		});
        	})
        });

        </script>
        <!-- end DataTables Example -->
        @stop