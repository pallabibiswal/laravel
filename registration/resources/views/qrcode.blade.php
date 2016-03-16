@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate QR Code</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('generate') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                            Product Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                name="product" value="{{ old('product') }}">

                                @if ($errors->has('product'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('product') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                            Product Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" 
                                rows="5" name="description" 
                                value="{{ old('description') }}">
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') 
                            ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">
                            SKU (Stock Keeping Unit)</label>

                            <div class="col-md-6">
                                 <input type="text" class="form-control" 
                                name="sku" value="{{ old('sku') }}">
                                
                                @if ($errors->has('sku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                            Price Of Product</label>

                            <div class="col-md-6">
                                 <input type="text" class="form-control" 
                                name="price" value="{{ old('price') }}">
                                
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                GENERATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

