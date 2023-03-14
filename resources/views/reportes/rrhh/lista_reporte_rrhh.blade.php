@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')      
        <div id="page-content-wrapper">
            <div class="sidebar-heading text-center">
                <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>    
                <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
            </div> 


            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">

                            <div class="card mb-4">
                              <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>LISTADO DE REPORTES</b>
                              </div>
                    <table width="1023" border="1" cellspacing="1" cellpadding="1" aling="center">
                        <tr>
                        <td width="300">Control de Expedientes de Recursos Humanos</td>
                        <td width="200">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                      </tr>
                      <tr>
                      
                        <td><a href="" title="">Total de Funcionarios Activos</a> </td>
                        <td><a href="" title="">Trabajadores Egresados</a> </td>
                        <td><a href="" title="">Ver requisitos por Trabajador</a> </td>
                      </tr>
                      <tr>
                       
                        <td><a href="" title="">Trabajadores Contratados Activos </a></td>
                        <td><a href="" title="">Trabajadores Obreros Activos</a> </td>
                        <td><a href="" title="">Ver Antecendentes de Servicio Trabajador</a> </td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="" title="">Actas </a></td>
                        <td><a href="" title="">Contatos Emitidos Vigentes</a></td>
                        <td>&nbsp;</td>
                        </tr>
                      <tr>
                        <td>Vacaciones</td>
                        <td></td>
                        <td></td>
                        <td>&nbsp;</td>
                      </tr>  
                      <tr>
                        <td><a href="" title="">Listado de Vacaciones Pendientes</a></td>
                        <td><a href="" title="">Listado de Vacaciones Disfrutadas</a></td>
                        <td><a href="" title="">Vacaciones Colectivas</a></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a class='btn btn-info' href="{{URL::route('rrhh')}}" >Regresar</a></td>
                      </tr>
                    </table>
                    <br>
                    
               
            </div> <!-- card -->
          </div>
          </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

@endsection