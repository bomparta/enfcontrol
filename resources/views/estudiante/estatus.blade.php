@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">
            

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    @include('layouts.items.card-header', ['titulo' => 'Estatus del Proceso de Incripcion ENFMP'])
                                    
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                          <th>Nombre del Paso</th>
                                          <th align="center"> Estado </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php //if(!empty($listado)):?>
                                            <?php //foreach($listado as $listado):?>
                                        <tr>
                                          <td>Actualización de Datos</td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @elseif (empty($adjuntoscarta[0]->ruta))
                                              <img width='25px' height='25px'src='/img/icon/button_blue.jpg'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_green.png'>
                                              @endif
                                            </td>
                                        </tr>
                                        <tr>
                                          <td>Preinscripción de Unidades Curriculares</td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @endif
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Registro de Pago</td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @endif
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Aprobación de Pago</td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @endif
                                            <?php 
                                        //if ($pago == true) {
                                          //  if ($result_conciliado->conciliado == 1) {
                                          //    echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                                          //  }
                                          //  if ($result_conciliado->conciliado == 2) {
                                           //   echo "<img width='25px' height='25px'src='../assets/img/button_red.jpeg'> " ."(Llamar o Enviar correo: errorpagoenf@gmail.com)" ;
                                          //  }if ($result_conciliado->conciliado == 0){
                                          //  echo "<img width='25px' height='25px'src='../assets/img/button_blue.jpg'> "; 
                                          //  }
                                       // }else{
                                        //  echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                                       // }
                      
                                          ?></td>
                                        </tr>
                                        <tr>
                                          <td>Revision Academica</td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @endif
                                            <?php 
                                          // if ($estadoconciliacion==true) {
                                          //  if ($revicion_academica->rev_academica== 1) {
                                          ///    echo "<img width='25px' height='25px'src='../assets/img/button_green.png'> ";
                                          //  }
                                          //  if ($revicion_academica->rev_academica== 2) {
                                          //    echo "<img width='25px' height='25px'src='../assets/img/button_red.jpeg'> " ."(Llamar o Enviar correo: errorpagoenf@gmail.com)" ;
                                          //  }if ($revicion_academica->rev_academica== 0){
                                          //  echo "<img width='25px' height='25px'src='../assets/img/button_blue.jpg'> "; 
                                          //  }
                                        //}else{
                                        //  echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                                        //}
                                          ?></td>
                                        </tr>
                                        <tr>
                                          <td> Unidades Curriculares </td>
                                          <td align="left">
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @else
                                              <img width='25px' height='25px'src='/img/icon/button_gray.png'>
                                            @endif
                                            <?php
                                         // if ($revicion_academica==true) {
                      
                                            //    if ($revicion_academica->rev_academica== 1) {
                                           //        echo "<img width='25px' height='25px'src='../assets/img/positivo.jpeg' >"."<strong> APROBADAS </strong>";
                                            //    }
                                            //    if ($revicion_academica->rev_academica== 2) {
                                            //       echo "<img width='25px' height='25px'src='../assets/img/negativo.jpeg' >"."<strong> RECHAZADA </strong>";
                                            //    }
                                            //    else{
                                             //   echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> "; 
                                            //      }
                                           // }else{
                                           //   echo "<img width='25px' height='25px'src='../assets/img/button_gray.png'> ";
                                              
                                           // }
                      
                                              ?>
                                            </td>
                                        </tr>
                                              <?php //endforeach;?>
                                        <?php //endif;?>        
                                        </tbody>
                                      </table>
                      <br>             
                      <div><strong>Leyenda</strong></div>
                      <br>
                      <div><img width='25px' height='25px'src="/img/icon/button_gray.png"> Sin Realizar <img width='25px' height='25px' src="/img/icon/button_blue.jpg"> En Proceso<img width='25px' height='25px' src="/img/icon/button_green.png">Procesado <img width='25px' height='25px' src="/img/icon/button_red.jpeg"> Error</div>
                                

                                </div>
                            </div> <!-- /.card -->
                        </div>
                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection