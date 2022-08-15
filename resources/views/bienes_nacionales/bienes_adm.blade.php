@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.appbienes')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>Inventario de Bienes Nacionales por Ubicación Administrativa</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b>Seleccione de la lista la  <span style="color:gray; ">Ubicación Administrativa</span> a consultar, haga clic en "Buscar" para realizar su consulta. <b>
                                    <hr>   
                                    @include('bienes_nacionales.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
        <table>
          <form id="formulario" name="formulario" role="search" action="{{url('/bienes/searchredirect')}}">     
              

          @csrf
                        
                        <tr>
                                <td>
                                    &nbsp;Ubicación Administrativa&nbsp;<span style="color:red;">*</span>&nbsp;
                                   
                                    <select name="search"  class="form-control" required >
                                        <option value="0">Seleccione...</option>                                 
                                        @foreach($lista_adm as $lista_adm )
                                                <option value="{{$lista_adm->id}}"  > {{$lista_adm->descripcion}}</option>
                                        @endforeach       
                                </select>
                              
                                </td>
                             
                        </tr>
                                          
                                                
                      </table>
                   
                      <div class="frameContenedor" style="margin:5px;" align="right">
                      <input class='btn btn-info' type="submit" value="Buscar" >
                      <a class='btn btn-secondary' href="{{URL::route('bienes')}}">Regresar</a> 
                        </div>
                   
                         
                    </form>

            </div>
            
        </div>
        
    </div>
</div>



@endsection

