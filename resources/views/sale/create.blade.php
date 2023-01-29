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
                <form action="/leather_sale/post" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Item</label>
                                <select class="form-control" name="item" id="item" required>
                                    <option selected="true" disabled="disabled" required>---Select Item---</option>
                                    <option value="Leather" @if (old('item') == 'Leather') selected="selected" @endif>Leather</option>
                                    <option value="Meat" @if(old('item') == 'Meat') selected="selected" @endif>Meat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Grade</label>
                                <select class="form-control" name="sale_grade" id="sale_grade" required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <select class="form-control" name="customer">
                                    <option selected="true" disabled="disabled">---Select Customer---</option>
                                    <option value="General" @if(old('customer') == 'General') selected="selected" @endif>General</option>
                                    <option value="Company" @if (old('customer') == 'Company') selected="selected" @endif>Company</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sheet</label>
                                <input type="number" class="form-control" min="0" value="{{old('sheet')}}" placeholder="Input Sheet..." name="sheet">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kilos</label>
                                <input id="kilos" type="number" class="form-control" min="0" value="{{old('kilos')}}" placeholder="Input Kilos..." name="kilos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input id="price" type="number" class="form-control" min="0" value="{{old('price')}}" placeholder="Input Price..." name="price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Price</label>
                                <input id="total_price" type="number" class="form-control" min="0" value="{{old('total_price')}}" placeholder="Total Price..." name="total_price" readonly>
                            </div>
                        </div>
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
        $('#item').on('change', function() {
            var itemID = $(this).val();
            if (itemID) {
                $.ajax({
                    url: '/getItem/' + itemID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#sale_grade').empty();
                            $('#sale_grade').append('<option hidden>Choose Grade</option>');
                            $.each(data, function(key, data) {
                                $('select[name="sale_grade"]').append('<option value="' + data + '">' + data + '</option>');
                            });
                        } else {
                            $('#sale_grade').empty();
                        }
                    }
                });
            } else {
                $('#sale_grade').empty();
            }
        });
    });
</script>
<script>
    $('#price').on('keyup', function() {
        let price = $('#price').val();
        let kilos = $('#kilos').val();
        let total = parseInt(price) * parseInt(kilos)
        $('#total_price').val(total)
    })
</script>
@endsection