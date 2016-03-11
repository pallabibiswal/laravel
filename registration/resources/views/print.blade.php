@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                <div id="print-content">
                    <div class="row" >
                        <div class="col-md-12">
                            <div>
                                <label>Product Name: </label>
                                {{ $data['product'] }}
                            </div>
                            <div>
                                <label>Product Description: </label>
                                 <div class="panel-body panel panel-default">
                                {{ $data['description'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Price: </label>
                            {{ $data['price'] }}
                        </div>      
                        <div class="md-col-4">
                            <img src="data:image/png;base64, 
                            {!! base64_encode(QrCode::format('png')
                                ->size(100)
                                ->generate($data['sku'])) !!} ">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"
                    onClick="printDiv('print-content')">Print</button>
                </div>
            </div>  
        </div>
    </div>
</div>
</div>
@endsection

@section('footer')
<script type='text/javascript' src="{{ asset_timed('/js/qrcode.js') }}"></script> 
@endsection
