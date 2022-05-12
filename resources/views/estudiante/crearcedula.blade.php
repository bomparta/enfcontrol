@extends('layouts.app')
@section('title', 'Cantidades')
@section ('content')
<div class="d-flex" id="wrapper">
    @include('layouts.appcontrol')

    <div id="page-content-wrapper">
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Adjuntar Cedula del Estudiante</h1>
                    </div>

                    <form method="POST" action="{{route('subircedula')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="archivo"><b>Archivo: </b></label><br>
                        <input type="file" name="archivo" required>
                        <input class="btn btn-success" type="submit" value="Enviar" >
                      </form>


                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection