@extends('layouts.app')

@section('content')

<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Listado de Reportes</h1>
                    </div>
                    <table width="1023" border="1" cellspacing="1" cellpadding="1">
                        <tr>
                        <td width="250">Reporte Eventos</td>
                        <td width="250">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                        <td width="250">&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                        <td><a href="" title="Capacitados 2019">Capacitados 2019</a> </td>
                        <td><a href="" title="Estadistica Semanal 2019">Estadistica Semanal</a> </td>
                        <td><a href="" title="Reportes Actuacion 2019">Reportes Actuacion 2019</a> </td>
                      </tr>
                      <tr>
                        <td><a href="" title="Reporte Planificacion">Reporte Planificacion</a></td>
                        <td>&nbsp;</td>
                        <td><a href="" title="Reporte Actividades 2019">Reporte Actividades 2019</a></td>
                        <td><a href="" title="Reporte Detallado por Actividad 2019">Reporte Detallado por Actividad 2019</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="" title="Derechos Humanos 2019">Derechos Humanos</a></td>
                        <td><a href="" title="Derechos Humanos Organismos tipos Funcionarios 2019">DDHH Organismos</a></td>
                        <td><a href="" title="Reporte Seguimiento">Reporte Seguimiento</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="" title="Derechos Humanos 2019 NEW">Derechos Humanos New</a></td>
                        <td>&nbsp;</td>
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
                        <td><a href="" title="Derechos Humanos 2019 NEW">Actas Policiales</a></td>
                        <td><a href="" title="Derechos Humanos 2095 NEW">Actas Policiales - Organismos</a></td>
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
                        <td><a href="" title="Derechos Humanos 2019 NEW">Sitio del Suceso</a></td>
                        <td><a href="" title="Derechos Humanos 2019 NEW">Sitio del Suceso - Organismos</a></td>
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
                        <td><a href="" title="Derechos Humanos 2019 NEW">Criminalistica</a></td>
                        <td><a href="" title="Derechos Humanos 2019 NEW">Criminalistica - Organismos</a></td>
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
                        <td><a href="" title="Derechos Humanos 2019 NEW">Corrupci??n</a></td>
                        <td><a href="" title="Derechos Humanos 2019 NEW">Corrupci??n - Organismos</a></td>
                        <td>&nbsp;</td>
                      </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr>
                        <td><a href="" title="Actividades de capacitacion desarrolladas por la Fundaci??n Escuela Nacional de Fiscales, segun materia. Enero 2019">Cuadro FENFMP-01</a></td>
                        <td><a href="" title="Cantidad de participantes en actividades de capacitaci??n realizados por la Escuela Nacional de Fiscales, seg??n tipo de funcionario. Enero, 2019">Cuadro FENFMP-02</a></td>
                        <td><a href="" title="Personas capacitadas por la Escuela Nacional de Fiscales, seg??n tipo de funcionario. Enero, 2019">Cuadro FENFMP-03</a></td>
                        <td><a href="" title="Diplomados dictados por la Escuela Nacional de Fiscales. Enero, 2019">Cuadro FENFMP-04</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <br>
                    <a class='btn btn-info' href="{{URL::route('actividad')}}" >Regresar</a>
                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

@endsection