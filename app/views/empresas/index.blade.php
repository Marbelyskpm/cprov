@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Empresas
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          </div>
          <div class="col-sm-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="{{ $route }}/create"><i class="icon-user"></i>Añadir Nueva Empresa</a>
                <form action="{{ $route }}" target="_blank" method="post" style="float:right;background-color:#EEEEEE;padding:1em;margin:.5em;border-radius:5px;width:100%">
                  <div class="form-group" style="display:block">
                    <label class="control-label col-md-1">Fecha de Creación</label>
                    <div class="col-sm-2">
                      <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd1" placeholder="Desde" type="text" value="{{ isset( $desde ) ? $desde : '' }}">
                    </div>
                    <div class="col-sm-2">
                      <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd2" placeholder="Hasta" type="text" value="{{ isset( $hasta ) ? $hasta : '' }}">
                    </div>
                    <label class="control-label col-md-1">Municipio</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="municipio">
                        @foreach( $municipios as $municipio )
                          <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                    <label class="control-label col-md-1">Tipo de Empresa</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="tipo_empresa">
                        @foreach( $tipo_empresas as $tipo_empresa )
                          <option value="{{ $tipo_empresa->id }}">{{ $tipo_empresa->descripcion }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-1">
                      <button type="submit" class="btn btn-info"><i class="fa fa-cloud-download"></i>Reporte</button>
                    </div>
                  </div>
                  <!-- <input type="hidden" name="busqueda" value="{{ isset( $busqueda ) ? $busqueda : '' }}"/>
                  <input type="hidden" name="desde" value="{{ isset( $desde ) ? $desde : '' }}"/>
                  <input type="hidden" name="hasta" value="{{ isset( $hasta ) ? $hasta : '' }}"/>
                  <input type="hidden" name="municipio" value="{{ isset( $municipio ) ? $municipio : '' }}"/> -->
                </form>
                <!-- <form action="/busqueda">
                  <input type="hidden" name="type" value="intervalo_fecha"/>
                  <div class="form-group">
                  <label class="control-label col-md-2">Rango de Fecha</label>
                  <div class="col-sm-1">
                    <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd1" placeholder="Desde" type="text">
                  </div>
                  <div class="col-sm-1">
                    <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd2" placeholder="Hasta" type="text">
                  </div>
                </div>
                </form> -->
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                    <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                       <th>
                      Codigo
                    </th>
                    </th>
                    <th>
                      Nombre
                    </th>
                     <th>
                      Representante
                    </th>

                     <th>
                      Direccion
                    </th>
                    <th>
                      Rif
                    </th>
                    <th>
                      Telefono
                    </th>
                    <!--
                    <th>
                      Municipio
                    </th>
                    <th>
                      Fecha Ingreso
                    </th>
                    <th>
                      id_servicio
                    </th>
                    <th>
                      rif
                    </th>
                    <th>
                      fecha_registro
                    </th>
                    <th>
                      num_registro
                    </th>
                    <th>
                      capital
                    </th>
                    <th>
                      snc
                    </th>
                    <th>
                      fecha_snc
                    </th>
                    <th>
                      provicional
                    </th>
                    <th>
                      dias_provicional
                    </th>
                    <th>
                      id_tipo_empresa
                    </th>
                    -->
                    <th>
                      Creado el
                    </th>
                    <th>
                      Actualizado el
                    </th>
                    <th class="hidden-xs">
                      Acciones
                    </th>
                  </thead>
                  <tbody>
                  @foreach( $empresas as $empresa )
                    <tr>
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td>
                        <a class="fancybox fancybox.ajax" href="{{ $route }}/show/{{ Crypt::encrypt($empresa->id) }}">{{ $empresa->codigo }}</a>
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->nombre }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->representante->nombre }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->direccion }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->rif }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->telefono }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->created_at }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->updated_at }}
                      </td>
                      <td class="actions">
                        <div class="action-buttons">
                          <a class="table-actions" href="{{ $route }}/edit/{{ Crypt::encrypt($empresa->id) }}"><i class="icon-pencil"></i></a>
                          <a class="table-actions" href="{{ $route }}/delete/{{ Crypt::encrypt($empresa->id) }}"><i class="icon-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                   
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- end DataTables Example -->
        @stop