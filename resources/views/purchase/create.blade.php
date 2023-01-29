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
                <form action="/purchase/post" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{old('detail')}}" name="detail" placeholder="Insert Detail...">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" min="0" class="form-control" name="amount" id="amount" value="{{old('amount')}}" placeholder="Input Amount..."></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" id="price" min="0" name="price" value="{{old('price')}}" placeholder="Input Price...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Purchase</label>
                                <input type="number" class="form-control" id="total_purchase" name="total_purchase" readonly>
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
<script>
    $('#price').on('keyup', function() {
        let price = $('#price').val();
        let amount = $('#amount').val();
        let total = parseInt(price) * parseInt(amount)
        $('#total_purchase').val(total)
    })
</script>
@endsection