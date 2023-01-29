@extends('layouts.master')
@section('title', 'BUTCHER - ASSEGAF')
@section('page-title', 'Butcher Menu')
@section('page-subtitle', 'Butcher Page - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Butcher</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/butcher/{{$data->id}}/update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Input Name..." value="{{$data->name}}" name="name">
                    </div>
                    @foreach($grade as $gd)
                    <div id="dynamicTable">
                        <divv class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="hidden" value="{{$gd->butcher_id}}" name="detail[0][butcher_id]">
                                    <input type="text" class="form-control" placeholder="Input Price..." name="detail[0][price]" value="{{$gd->price}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Butcher's Grade</label>
                                    <select class="form-control" name="detail[0][grade_id]" required>
                                        <option selected="true" disabled="disabled" required>---Select Buthcer's Grade---</option>
                                        <option value="1">Baik</option>
                                        <option value="2">Lokal</option>
                                        <option value="3">Afkir</option>
                                        <option value="4">Jantan</option>
                                        <option value="5">Kulit Kepala</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 mt-5">
                                <button class="btn btn-primary btn-sm" type="button" name="add" id="add"><i class="fas fa-plus"></i></button>
                            </div>
                        </divv>
                    </div>
                    @endforeach
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<divv class="row"><div class="col-md-5"><div class="form-group"><label for="">Price</label><input type="hidden" value="{{$gd->butcher_id}}" name="detail[' + i + '][butcher_id]"><input type="text" class="form-control" placeholder="Input Price..." name="detail[' + i + '][price]"></div></div><div class="col-md-6"><div class="form-group"><label for="">Butchers Grade</label><select class="form-control" name="detail[' + i + '][grade_id]"><option selected="true" disabled="disabled">---Select Buthcers Grade---</option><option value="1" >Baik</option><option value="2">Lokal</option><option value="3">Afkir</option><option value="4">Jantan</option><option value="5">Kulit Kepala</option></select></div></div><div class="col-md-1 mt-5"><button type="button" class="btn btn-danger btn-sm remove-divv" ><i class="fas fa-minus"></i></button></div></divv>');
    });
    $(document).on('click', '.remove-divv', function() {
        $(this).parents('divv').remove();
    });
</script>
@endsection