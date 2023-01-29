@extends('layouts.master')
@section('title', 'STORAGE - ASSEGAF')
@section('page-title', 'Storage Menu')
@section('page-subtitle', 'Total Storage Data - Stuff')

@section('konten')
<div class="card-body">
    <div class="card-title">Storage</div>
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="fas fa-spa"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category"><b>Leather</b> <span class="ml-3" style="font-size: 20px;">{{$baik->grade}}</span></p>
                                <h4 class="card-title">{{$baik->sheet}} sheets</h4>
                                <h4 class="card-title">{{$baik->kilos}} kilos</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category"><b>Leather</b> <span class="ml-3" style="font-size: 20px;">{{$lokal->grade}}</span></p>
                                <h4 class="card-title">{{$lokal->sheet}} sheets</h4>
                                <h4 class="card-title">{{$lokal->kilos}} kilo</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="fas fa-spa"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category"><b>Leather</b> <span class="ml-3" style="font-size: 20px;">{{$afkir->grade}}</span></p>
                                <h4 class="card-title">{{$afkir->sheet}} sheets</h4>
                                <h4 class="card-title">{{$afkir->kilos}} kilo</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category"><b>Leather</b> <span class="ml-3" style="font-size: 20px;">{{$jantan->grade}}</span></p>
                                <h4 class="card-title">{{$jantan->sheet}} sheets</h4>
                                <h4 class="card-title">{{$jantan->kilos}} kilo</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection