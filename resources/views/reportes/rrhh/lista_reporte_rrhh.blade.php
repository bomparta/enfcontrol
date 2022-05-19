

@section('content')
@extends('layouts.app')

<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Listado de Reportes Control de Expedientes RRHH</h1>
                    </div>
                    <table width="1023" border="1" cellspacing="1" cellpadding="1" aling="center">
                        <tr>
                        <td width="250">Oficina Recursos Humanos</td>
                        <td width="250">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                        <td><a href="" title="">Total de Trabajadores Activos</a> </td>
                        <td><a href="" title="">Trabajadores Egresados</a> </td>
                        <td><a href="" title="">Ver requisitos por Trabajador</a> </td>
                      </tr>
                      <tr>
                        <td><a href="" title="">Reporte Planificacion</a></td>
                        <td><a href="" title="">Total de Trabajadores Activos</a> </td>
                        <td><a href="" title="">Trabajadores Egresados</a> </td>
                        <td><a href="" title="">Ver requisitos por Trabajador</a> </td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="" title="">Actas </a></td>
                        <td><a href="" title="">Contatos Emitidos Vigentes</a></td>
                        <td>&nbsp;</td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <br>
                    <a class='btn btn-info' href="{{URL::route('rrhh')}}" >Regresar</a>
                </div>
            </div> <!-- card -->
          </div>
          </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

@endsection