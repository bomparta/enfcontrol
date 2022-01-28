@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex flex-row bd-highlight mb-2" id="wrapper">
        @include('layouts.appevento')

        <div id="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                                
                            <div class="table-responsive">
                                
                                    <div class="card-header">
                                        <h3 class="card-title">Nueva Actividades</h3>
                                      </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputcodigo" class="p-2 bd-highlight">Codigo</label>
                                            <div class="p-2 bd-highlight">
                                              <input type="codigo" class="form-control" id="codigo" placeholder="Email">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Tipo de Estudio</label>
                                            <div class="p-2 bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <SELECT name='hora'id='hora' SIZE=1 onChange="sacarHora()"> 
                                                        <OPTION VALUE="8:00">Seleccione...</OPTION>
                                                        <OPTION VALUE="9:00">9:00</OPTION>
                                                        
                                                    </SELECT> 
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Nombre de la Actividad</label>
                                            <div class="p-2 bd-highlight">
                                              <input type="inputtipoestudio" class="form-control" id="inputtipoestudio" placeholder="Password">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Clasificacion</label>
                                            <div class="p-2 bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <SELECT name='hora'id='hora' SIZE=1 onChange="sacarHora()"> 
                                                        <OPTION VALUE="8:00">Seleccione...</OPTION>
                                                        <OPTION VALUE="9:00">9:00</OPTION>
                                                        
                                                    </SELECT> 
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Tematica</label>
                                            <div class="p-2 bd-highlight">
                                                <SELECT name='hora'id='hora' SIZE=1 onChange="sacarHora()"> 
                                                    <OPTION VALUE="8:00">Seleccione...</OPTION>
                                                    <OPTION VALUE="9:00">9:00</OPTION>
                                                    
                                                </SELECT> 
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Alcance</label>
                                            <div class="p-2 bd-highlight">
                                                <SELECT name='hora'id='hora' SIZE=1 onChange="sacarHora()"> 
                                                    <OPTION VALUE="8:00">Seleccione...</OPTION>
                                                    <OPTION VALUE="9:00">9:00</OPTION>
                                                    
                                                </SELECT> 
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="inputtipoestudio" class="p-2 bd-highlight">Tipo de Actividad</label>
                                            <div class="p-2 bd-highlight">
                                                <SELECT name='hora'id='hora' SIZE=1 onChange="sacarHora()"> 
                                                    <OPTION VALUE="8:00">Seleccione...</OPTION>
                                                    <OPTION VALUE="9:00">9:00</OPTION>
                                                    
                                                </SELECT> 
                                            </div>
                                          </div>
                                          
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                          <a type="submit" class="btn btn-info">Crear</a>
                                          <a type="submit" href="{{URL::route('actividad')}}" class="btn btn-default float-right">Cancel</a>
                                        

                                    </div>
                        
                            </div>
            
                            </div> <!-- /.card -->
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->


@endsection