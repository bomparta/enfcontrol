@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
          
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                        <tr>
                            <td colspan="4">
                                <div align="center" id="divTituloIndex2" class="text-primary">
                                       <b> DATOS PERSONALES</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos, haga clic en "Guardar" par registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="4">
                            <nav class="navbar bg-light">
                            <div class="container-fluid">
                            <form class="d-flex" role="search">
                            @csrf
                            &nbsp;Cedula&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                            <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                            <input class="form-control me-2" type="search" name="cedula"placeholder="Sólo números Ej. 123456789" aria-label="Search" require>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                           
                           </form>
                            </div>
                            </nav>
                            </td>
                        </tr>
                       
                   
          
          <form id="formulario" name="formulario" method="POST" action="{{route('funcionariostore')}}">       
   
               
                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >        
                @foreach ($datos_funcionario as $key=>$item)
                <tr> 
                    <td>
                        &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                        <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}"  require>
                        @error('primernombre')
                            <div class="invalid-feedback">
                            <strong><span>{{ $message }}</span></strong>
                            </div>
                        @enderror
                    </td>
                </tr>
                @endforeach
                    </table>
                    <div class="table-responsive mt-3">
                        <table class="table datatable" >
                            <thead>
                                <tr>
                                    <th>nombre</th>                                    
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach ($datos_funcionario as $key=>$item)
                                <tr>
                                    <td>{{$item->nombre}}</td>                                                     
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar y Continuar" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection