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
                <div class="form-group" style="float:right;background-color:#EEEEEE;padding:1em;margin:.5em;border-radius:5px;display:inline-block">
                  <form action="{{ $route }}" method="post" >
                    <label class="control-label col-md-1">Fecha de Creación</label>
                    <div class="col-sm-1">
                      <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd1" placeholder="Desde" name="desde" type="text" value="{{ isset( $filtro['desde'] ) ? $filtro['desde'] : '' }}">
                    </div>
                    <div class="col-sm-1">
                      <input class="form-control" data-date-autoclose="true" data-date-format="dd-mm-yyyy" id="dpd2" placeholder="Hasta" name="hasta" type="text" value="{{ isset( $filtro['hasta'] ) ? $filtro['hasta'] : '' }}">
                    </div>
                    <label class="control-label col-md-1">Municipio</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="municipio">
                          <option value="0"> -- NINGUNO -- </option>
                        @foreach( $municipios as $municipio )
                          @if( $municipio->id == $filtro['municipio'] )
                            <option value="{{ $municipio->id }}" selected>{{ $municipio->nombre }}</option>
                          @else
                            <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <label class="control-label col-md-1">Tipo de Empresa</label>
                    <div class="col-sm-2">
                      <select class="form-control" name="tipo_empresa">
                          <option value="0"> -- NINGUNO -- </option>
                        @foreach( $tipo_empresas as $tipo_empresa )
                          @if( $tipo_empresa->id == $filtro['tipo_empresa'] )
                            <option value="{{ $tipo_empresa->id }}" selected>{{ $tipo_empresa->descripcion }}</option>
                          @else
                            <option value="{{ $tipo_empresa->id }}">{{ $tipo_empresa->descripcion }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-1">
                      <button type="submit" class="btn btn-info"><i class="icon-user"></i>Filtrar</button>
                    </div>
                  </form>
                  <form action="{{ $route }}/reporte" target="_blank" style="display:inline-block" method="post">
                    <div class="col-sm-1">
                      <input type="hidden" name="desde" value="{{ isset( $filtro['desde'] ) ? $filtro['desde'] : '' }}"/>
                      <input type="hidden" name="hasta" value="{{ isset( $filtro['hasta'] ) ? $filtro['hasta'] : '' }}"/>
                      <input type="hidden" name="municipio" value="{{ isset( $filtro['municipio'] ) ? $filtro['municipio'] : '' }}"/>
                      <input type="hidden" name="tipo_empresa" value="{{ isset( $filtro['tipo_empresa'] ) ? $filtro['tipo_empresa'] : '' }}"/>
                      <button type="submit" class="btn btn-info"><i class="icon-cloud-download"></i>Reporte</button>
                    </div>
                  </form>
                </div>
              </div>
                  <!-- <input type="hidden" name="busqueda" value="{{ isset( $busqueda ) ? $busqueda : '' }}"/>
                  <input type="hidden" name="desde" value="{{ isset( $desde ) ? $desde : '' }}"/>
                  <input type="hidden" name="hasta" value="{{ isset( $hasta ) ? $hasta : '' }}"/>
                  <input type="hidden" name="municipio" value="{{ isset( $municipio ) ? $municipio : '' }}"/> -->
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