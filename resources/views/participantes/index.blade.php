@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appevento')

        <div id="page-content-wrapper">
            <div class="container pb-4">
                <div class="row align-items-stretch">
                    <div class="col-12">
                        <div class="card mb-4">
                                                        
                            <div class="table-responsive">
                                
                                    <div class="card-header">
                                        <h3 class="card-title">Participantes</h3>
                                      
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    <form method="POST" action="participantes/store" id="registrar_participante" >
                                        <input type="hidden" name="id_usuario" value="55346">
                                        <input type="hidden" name="alias_usuario" value="alexis.bompart">
                                        <input type="hidden" name="id_actuacion" value="1">
                                        <input type="hidden" name="ip_user" value="127.0.0.1">
                                        <div class="row">
                                        
                                            <div class="form-group-sm col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for="tipo_identificacion" class="control-label">Documento</label>
                                                <select name="tipo_identificacion" id="tipo_identificacion" class="form-control">
                                                <option value='1'>Cédula</option><option value='2'>Pasaporte</option> 
                                                </select>    
                                            </div>
                                            <div class="form-group-sm col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                                <label for="numero_identificacion" class="control-label">N° Identificación</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-btn">
                                                    <select id="nacionalidad" name="nacionalidad" class="form-control"> 
                                                    <option value='1'>V</option><option value='2'>E</option>                              </select>
                                                    </span>        
                                                    <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" required>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button" id="get_persona" value="Buscar" onclick="buscar_persona()" >
                                                        <img src="/img/icon/zoom.ico" class="icon-lg" alt="Participantes" title="Agregar Facilitador(es)">
                                                        </button>
                                                    </span>
                                                </div> 
                                            </div>
                                        </div>   
                                        <hr>

                                        <div class="row">
                                        
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="nombres" class="control-label">Nombres</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control" required>   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="apellidos" class="control-label">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-control" required>   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="genero" class="control-label">Género</label>
                                            <select name="genero" id="genero" class="form-control" required>
                                                <option value="">Seleccione...</option>
                                                <option value='1'>Femenino</option><option value='2'>Masculino</option>                    </select>
                                        </div>
                                        <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <label for="organismo" class="control-label">Organismo</label>
                                            <select name="organismo" id="organismo" class="form-control" required>
                                                <option value="">Seleccione...</option>
                                                                        <option value="2">Ministerio Público</option>
                                                                        <option value="4">Cuerpos Policiales</option>
                                                                        <option value="7">Instituciones Docentes y Educativas</option>
                                                                        <option value="3">Fuerza Armada Nacional Bolivariana</option>
                                                                        <option value="5">Organismos de Investigación</option>
                                                                        <option value="6">Organismos Públicos</option>
                                                                        <option value="8">Organismos Particulares</option>
                                                
                                            </select> 
                                        </div>  
                                            <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="funcionario" class="control-label">Tipo de Funcionario</label>
                                            <select  name="funcionario" id="funcionario" class="form-control" required>
                                                <option value="">Seleccione...</option>
                                            </select>  
                                        </div> 
                                        </div>
                                        <div class="row">
                                        
                                                <div class="form-group-sm col-lg-5 col-md-5 col-sm-10 col-xs-12">
                                                    <label for="cargo" class="control-label">Cargo</label>
                                                    <input type="text" name="cargo" id="cargo" class="form-control"  /> 
                                                </div> 
                                                <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="pais" class="control-label">País</label>
                                                    <select name="pais" id="pais" class="form-control"  required>
                                                    <option selected value='1'>Venezuela</option><option value='2'>Albania</option><option value='3'>Alemania</option><option value='4'>Andorra</option><option value='5'>Angola</option><option value='6'>Anguilla</option><option value='7'>Antigua/Barbuda</option><option value='8'>Antillas hol.</option><option value='9'>Antartida</option><option value='10'>Arabia Saudm</option><option value='11'>Argelia</option><option value='12'>Argentina</option><option value='13'>Armenia</option><option value='14'>Aruba</option><option value='15'>Australia</option><option value='16'>Austria</option><option value='17'>Azerbaiyan</option><option value='18'>Bahamas</option><option value='19'>Bahrein</option><option value='20'>Bangladesh</option><option value='21'>Barbados</option><option value='22'>Belice</option><option value='23'>Benin</option><option value='24'>Bermudas</option><option value='25'>Bielorrusia</option><option value='26'>Bolivia</option><option value='27'>Bosnia-Herz.</option><option value='28'>Botsuana</option><option value='29'>Brasil</option><option value='30'>Brunei Darussal</option><option value='31'>Bulgaria</option><option value='32'>Burkina Faso</option><option value='33'>Burundi</option><option value='34'>Butan</option><option value='35'>Bélgica</option><option value='36'>Cabo Verde</option><option value='37'>Camboya</option><option value='38'>Camerzn</option><option value='39'>Canada</option><option value='40'>Chad</option><option value='41'>Chile</option><option value='42'>China</option><option value='43'>Chipre</option><option value='44'>Ciudad Vaticano</option><option value='45'>Colombia</option><option value='46'>Comoras</option><option value='47'>Congo</option><option value='48'>Corea del Norte</option><option value='49'>Corea del Sur</option><option value='50'>Costa Rica</option><option value='51'>Costa de Marfil</option><option value='52'>Croacia</option><option value='53'>Cuba</option><option value='54'>Dinamarca</option><option value='55'>Dominica</option><option value='56'>E.A.U.</option><option value='57'>EE.UU.</option><option value='58'>Ecuador</option><option value='59'>Egipto</option><option value='60'>El Salvador</option><option value='61'>Eritrea</option><option value='62'>Eslovaquia</option><option value='63'>Eslovenia</option><option value='64'>Espaqa</option><option value='65'>Estonia</option><option value='66'>Etiopma</option><option value='67'>Federacisn Rusa</option><option value='68'>Fiji</option><option value='69'>Filipinas</option><option value='70'>Finlandia</option><option value='71'>Francia</option><option value='72'>French S.Territ</option><option value='73'>Gabsn</option><option value='74'>Gambia</option><option value='75'>Georgia</option><option value='76'>Ghana</option><option value='77'>Gibraltar</option><option value='78'>Granada</option><option value='79'>Grecia</option><option value='80'>Groenlandia</option><option value='81'>Guadalupe</option><option value='82'>Guam</option><option value='83'>Guatemala</option><option value='84'>Guayana Franc.</option><option value='85'>Guinea</option><option value='86'>Guinea Ecuator.</option><option value='87'>Guinea-Bissau</option><option value='88'>Guyana</option><option value='89'>Haitm</option><option value='90'>Honduras</option><option value='91'>Hong Kong</option><option value='92'>Hungrma</option><option value='93'>India</option><option value='94'>Indonesia</option><option value='95'>Irak</option><option value='96'>Irlanda</option><option value='97'>Iran</option><option value='98'>Is.Vmrgenes USA</option><option value='99'>Isl.S.Sandwich</option><option value='100'>Isl.Turcas y C.</option><option value='101'>Isl.Vmrgenes GB</option><option value='102'>IslMenAlejEEUU</option><option value='103'>Isla N.Mariana</option><option value='104'>Islandia</option><option value='105'>Islas Bouvet</option><option value='106'>Islas Caiman</option><option value='107'>Islas Coco</option><option value='108'>Islas Cook</option><option value='109'>Islas Feroi</option><option value='110'>Islas Maldivas</option><option value='111'>Islas Malvinas</option><option value='112'>Islas Marshall</option><option value='113'>Islas Navidad</option><option value='114'>Islas Niue</option><option value='115'>Islas Norfolk</option><option value='116'>Islas Pitcairn</option><option value='117'>Islas Salomsn</option><option value='118'>Islas Tokelau</option><option value='119'>Israel</option><option value='120'>Italia</option><option value='121'>Jamaica</option><option value='122'>Japsn</option><option value='123'>Jordania</option><option value='124'>Kazajistan</option><option value='125'>Kenia</option><option value='126'>Kirguizistan</option><option value='127'>Kiribati</option><option value='128'>Kuwait</option><option value='129'>Laos</option><option value='130'>Lesotho</option><option value='131'>Letonia</option><option value='132'>Liberia</option><option value='133'>Libia</option><option value='134'>Liechtenstein</option><option value='135'>Lituania</option><option value='136'>Luxemburgo</option><option value='137'>Lmbano</option><option value='138'>Macau</option><option value='139'>Macedonia</option><option value='140'>Madagascar</option><option value='141'>Malasia</option><option value='142'>Malaui</option><option value='143'>Mali</option><option value='144'>Malta</option><option value='145'>Marruecos</option><option value='146'>Martinicas</option><option value='147'>Mauricio (Isl.)</option><option value='148'>Mauritania</option><option value='149'>Mayotte</option><option value='150'>Micronesia</option><option value='151'>Moldavia</option><option value='152'>Mongolia</option><option value='153'>Montserrat</option><option value='154'>Mozambique</option><option value='155'>Myanmar</option><option value='156'>Mixico</option><option value='157'>Msnaco</option><option value='158'>Namibia</option><option value='159'>Nauru</option><option value='160'>Nepal</option><option value='161'>Nicaragua</option><option value='162'>Nigeria</option><option value='163'>Nigeria</option><option value='164'>Noruega</option><option value='165'>Nueva Caledonia</option><option value='166'>Nueva Zelanda</option><option value='167'>Oman</option><option value='168'>Pakistan</option><option value='169'>Palau</option><option value='170'>Panama</option><option value='171'>PapuaNvaGuinea</option><option value='172'>Paraguay</option><option value='173'>Pamses Bajos</option><option value='174'>Perz</option><option value='175'>Polinesia fran.</option><option value='176'>Polonia</option><option value='177'>Portugal</option><option value='178'>Puerto Rico</option><option value='179'>Qatar</option><option value='180'>Reino Unido</option><option value='181'>Rep.Centroafr.</option><option value='182'>Rep.Dominicana</option><option value='183'>Repzblica Checa</option><option value='184'>Repzblica Congo</option><option value='185'>Reunisn</option><option value='186'>Ruanda</option><option value='187'>Rumanma</option><option value='188'>S.Tomi,Prmncipe</option><option value='189'>Samoa Occident.</option><option value='190'>Samoa americana</option><option value='191'>San Marino</option><option value='192'>San Vicente</option><option value='193'>Santa Helena</option><option value='194'>Santa Lucma</option><option value='195'>Senegal</option><option value='196'>Seychelles</option><option value='197'>Sierra Leona</option><option value='198'>Singapur</option><option value='199'>Siria</option><option value='200'>Somalia</option><option value='201'>Sri Lanka</option><option value='202'>St.Chr.,Nevis</option><option value='203'>StPier.,Miquel.</option><option value='204'>Suazilandia</option><option value='205'>Sudafrica</option><option value='206'>Sudan</option><option value='207'>Suecia</option><option value='208'>Suiza</option><option value='209'>Surinam</option><option value='210'>Svalbard</option><option value='211'>Sahara occid.</option><option value='212'>Tadjikistan</option><option value='213'>Tailandia</option><option value='214'>Taiwan</option><option value='215'>Tanzania</option><option value='216'>Terr.br.Oc.Ind.</option><option value='217'>Timor oriental</option><option value='218'>Togo</option><option value='219'>Tonga</option><option value='220'>Trinidad,Tobago</option><option value='221'>Turkmenistan</option><option value='222'>Turquma</option><option value='223'>Tuvalz</option><option value='224'>Tznez</option><option value='225'>Ucrania</option><option value='226'>Uganda</option><option value='227'>Uruguay</option><option value='228'>Uzbekistan</option><option value='229'>Vanuatu</option><option value='230'>Afganistan</option><option value='231'>Vietnam</option><option value='232'>Wallis,Futuna</option><option value='233'>Yemen</option><option value='234'>Yibuti</option><option value='235'>Yugoslavia</option><option value='236'>Zambia</option><option value='237'>Zimbabwe</option>                        </select>
                                                </div> 
                                                <div class="form-group-sm col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                    <label for="entidad" class="control-label">Entidad Federal</label>
                                                    <select name="entidad" id="entidad" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                    <option value='1'>Distrito Capital</option><option value='2'>Amazonas</option><option value='3'>Anzoátegui</option><option value='4'>Apure</option><option value='5'>Aragua</option><option value='6'>Barinas</option><option value='7'>Bolívar</option><option value='8'>Carabobo</option><option value='9'>Cojedes</option><option value='10'>Delta Amacuro</option><option value='11'>Falcón</option><option value='12'>Guárico</option><option value='13'>Lara</option><option value='14'>Mérida</option><option value='15'>Miranda</option><option value='16'>Monagas</option><option value='17'>Nueva Esparta</option><option value='18'>Portuguesa</option><option value='19'>Sucre</option><option value='20'>Táchira</option><option value='21'>Trujillo</option><option value='22'>Vargas</option><option value='23'>Yaracuy</option><option value='24'>Zulia</option><option value='25'>Exterior</option>                        </select>
                                                </div>     
                                        
                                            <div class="row">
                                                <div class="form-group-sm col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label for="correo" class="control-label">Correo Electrónico</label>
                                                    <input type="text" name="correo" id="correo" class="form-control" />
                                                </div> 
                                                <div class="form-group-sm col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <label for="hab" class="control-label">Telf. Habitación</label>
                                                    <input type="text" name="hab" id="hab" class="form-control" />
                                                </div> 
                                                <div class="form-group-sm col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <label for="cel" class="control-label">Telf. Celular</label>
                                                    <input type="text" name="cel" id="cel" class="form-control" />
                                                </div> 
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12" style="margin-top:10px">
                                                
                                                <div class="col-lg-5 col-md-5 col-sm-4 col-sx-12">
                                                    <div id="nota" >
                                                        <div id="txt_registrado" style="display:none;">
                                                            <b>El participante ya esta registrado en esta actuación.</b>
                                                        </div>
                                                        <div id="txt_nuevo" style="display:none;">
                                                            <b>Nuevo participante.</b>
                                                        </div>
                                                    </div>                       
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-sx-12">
                                                <div id="infor">

                                                </div>                       
                                            </div>
                                        </div>
                                            <hr>
                                                        <div align="center">
                                                            
                                                            <input type="submit" value=" Guardar " class="btn btn-primary" />                                   
                                                                                                
                                                            <button type="reset" id="btn_limpiar" class="btn btn-secondary">Limpiar</button>

                                                            <input name="" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" />
                                                        </div>
                                            <hr>
                            
           
            
            </form>   
            <br>    
            <div>    
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th>Correo</th>
                            <th>Organismo</th>
                            <th>Tipo de Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad Federal</th>
                            
                        </tr>
                            </thead>
                            <tbody>
                              @foreach ($participantes as $key=>$item)
                            <tr>
                            <td>{{$key+1}}</td>  
                            <td>{{$item->nacionalidad}}-{{$item->numero_identificacion}}</td> 
                            <td>{{$item->nombre}} {{$item->nombreseg}}</td> 
                            <td>{{$item->apellido}} {{$item->apellidoseg}}</td>                            
                            <td> {{$item->sexo}} </td>                           
                            <td>{{$item->email}}</td> 
                            <td>{{$item->organismo}}</td> 
                            <td>{{$item->tipo_funcionario}}</td> 
                            <td>{{$item->cargo}}</td>
                            <td>{{$item->entidad}}</td> 
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>                           
                            <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th>Correo</th>
                            <th>Organismo</th>
                            <th>Tipo de Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad Federal</th>
                          
                       
                            </tr>
                            </tfoot>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>           
                                          <!-- /.card -->
                                <br>
                            <div>
                                <a class='btn btn-info' href="{{URL::route('actividad')}}">Regresar</a>
                            </div>
            
                            </div> <!-- /.card -->
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->

@endsection

@section('scripts')
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>

    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>



@endsection  