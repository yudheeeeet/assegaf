@extends('layouts.master')
@section('title', 'SKIN - ASSEGAF')
@section('page-title', 'Skin Menu')
@section('page-subtitle', 'Create Skin Data - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Skin</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/leather/post" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="butcher_id">Butcher</label>
                        <select class="form-control" name="butcher_id" id="butcher_id">
                            <option selected="true" disabled="disabled">---Select Buthcer---</option>
                            @foreach($butcher as $btc)
                            <option value="{{$btc->id}}" @if (old('butcher_id')=='{{$btc->id}}' ) selected="selected" @endif>{{$btc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <select class="form-control" name="grade" id="grade"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" id="price" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sheet</label>
                                <input type="number" class="form-control" placeholder="Input Sheet..." value="{{old('sheet')}}" min="0" id="sheet" name="sheet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kilos</label>
                                <input type="number" class="form-control" placeholder="Input Kilos..." value="{{old('kilos')}}" min="0" id="kilos" name="kilos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Total Price</label>
                        <input type="number" id="total_price" class="form-control" name="total_price" readonly>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#butcher_id').on('change', function() {
            var butcherID = $(this).val();
            if (butcherID) {
                $.ajax({
                    url: '/getButcher/' + butcherID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#grade').empty();
                            $('#grade').append('<option hidden>Choose Grade</option>');
                            $.each(data, function(key, grade) {
                                $('select[name="grade"]').append('<option value="' + grade.id + '">' + grade.grade + '</option>');
                            });
                        } else {
                            $('#grade').empty();
                        }
                    }
                });
            } else {
                $('#grade').empty();
            }
        });
    });
</script>
<script>
    $('#grade').change(function() {
        var id = $(this).val();
        var url = '{{ route("getButcherDetails", ":id") }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    console.log(response);
                    $('#price').val(response.price);
                }
            }
        });
    });
    $('#kilos').on('keyup', function() {
        let price = $('#price').val();
        let kilos = $('#kilos').val();
        let total = parseInt(price) * parseInt(kilos)
        $('#total_price').val(total)
    })
</script>
@endsection