@extends('layouts.app')
@section ('content')
<div class="container">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-tools"></i> Dashboard ENFMP
                    </h1>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                    <div class="inner">
                    <h3>150</h3>
                    <p>Materias Inscritas</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                    <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection