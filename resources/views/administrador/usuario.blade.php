@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.master')

        <div id="page-content-wrapper">
            

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    @include('layouts.items.card-header', ['titulo' => 'Productos vendidos del día'])

                                    <div class="table-responsive">
                                        <table id="ventas_hoy" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre del Producto</th>
                                                    <th>Referencia</th>
                                                    <th>Tienda</th>
                                                    <th>Precio/ud</th>
                                                    <th>Cant. Productos Vendidos</th>
                                                    <th>Total Bs.</th>
                                                    <th>Total $</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- /.card -->
                        </div>
                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection