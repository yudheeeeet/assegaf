@extends('layouts.master')
@section('title', 'BUTCHER - ASSEGAF')
@section('page-title', 'Butcher Menu')
@section('page-subtitle', 'Butcher Page - Administrator')

@section('dashboard')
<div class="row">

    <div class="col-md-6">
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title"><b>Butcher Detail</b></div>
                            <div class="card-subtitle">Price Details of <b>{{$data->name}}</b></div>
                            <div class="row mt-3">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Grade</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grade as $gd)
                                        <tr class="text-center">
                                            <td>{{$gd->grade}}</td>
                                            <td>Rp. {{number_format($gd->price) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title"><b>Butcher History</b></div>
                                    <div class="card-subtitle">History Details of <b>{{$data->name}}</b></div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="/export-excel-csv-file/xlsx/{{$data->id}}" class="btn btn-success btn-xs btn-rounded"><i class="fas fa-file mr-1"></i> Export Excel</a>
                                    <a href="/export-pdf/{{$data->id}}" class="btn btn-danger btn-xs btn-rounded"><i class="fas fa-book mr-1"></i> Export PDF</a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Sheet</th>
                                                <th>Kilos</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($history as $hst)
                                            <tr>
                                                <td>{{date_format($hst->created_at, 'd M Y')}}</td>
                                                <td>{{$hst->sheet}}</td>
                                                <td>{{$hst->kilos}}</td>
                                                <td>Rp. {{number_format($hst->total_price)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection